<?php
/*
Plugin Name: Custom Pods Cart
Version: 2.0
Author: Mason Herber, updated to Pods 2 by Matt Stevens Nov 2012. Divified / Stripped down by Kasper Lewau - Nov 2012.
Description: A plugin to demonstrate the basic shopping cart functionality. This also includes a quantity field for the product
*/

// --------------- DEFINE CONSTANTS ---------------------

define("CART_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("CART_PAGE", get_bloginfo('url')."/shopping-cart");
define("REMOVE_IMG", CART_PLUGIN_URL."/remove-item.png");
define("CART_TRIGGERS", CART_PLUGIN_URL."js/triggers.js");
define("ADMIN_AJAX_URL",admin_url( 'admin-ajax.php' ));
define('RECIPIENT','matsteve16@gmail.com');

// --------------- AJAX ADD ACTIONS ---------------------

//called from jquery. The jQuery action uses 'wp_ajax_' as a suffix. so 'load-cart' is the action.
//once the action is called from js, this will load the function as if it was an external file:
//IMPORTANT: The actions need to be created for both hooks. This is for loggin or non logged in users:
add_action( 'wp_ajax_cartManager', 'cartManager' );
add_action( 'wp_ajax_nopriv_cartManager', 'cartManager' );
add_action( 'wp_ajax_loadCart', 'loadCart' );
add_action( 'wp_ajax_nopriv_loadCart', 'loadCart' );
add_action( 'wp_ajax_sendOrder', 'sendOrder' );
add_action( 'wp_ajax_nopriv_sendOrder', 'sendOrder' );

// --------------- ADD SCRIPTS ---------------------

//create custom hook (to use instead of wp_footer())
function sc_footer(){
    do_action('sc_footer');
}

//add function addSearchScripts to custom hook
add_action('sc_footer', 'addCartScripts');

function addCartScripts(){ ?>
	<script type="text/javascript">var cartObj = {"ajaxURL":"<?php echo ADMIN_AJAX_URL;?>", "cartAction": "loadCart", "miniCartAction": "loadMiniCart"}</script>
	<script type="text/javascript" src="<?php echo CART_TRIGGERS ?>"></script>
<?php 
}

// --------------- DISPLAY FUNCTIONS ---------------------

function displayCart(){
	?>
    <div id="display-cart" class="clearfix">
    </div>
    <?php
}

//displays add
function displayAddToCart($id, $type){?>
    <form class="add-to-cart-form" data-type="<?php echo $type; ?>" data-id="<?php echo $id; ?>" method="POST">
      <label class="quantity" for="qty">Quantity:</label>
      <input class="qty" id="qty" name="qty" value = "1" />
      <input class="submit-btn" type="submit" value="add to cart" name="addtocart" />
     </form>
<?php }


// --------------- AJAX FUNCTIONS ---------------------

function loadCart2(){
	echo "<div class='hidden-message' data-type='activity'>Item added to cart</div>";	
	echo"Hello";
	exit;
}


//The cart is loaded when the cart page loads and also whenever an item is added, updated or deleted from cart session.
function loadCart(){
	
	//this processes the add, update, delete, delete all functions and returns the modified array
	$productsArray = cartManager();
	$productsCount = count($productsArray);
	
	//if there are items in the array, display it in a table:
	if($productsCount > 0): 

	?>

	 <form method="post" id="cart-form" class="default-form">
		<div class="cart clearfix">
			<div class="itinerary">
	<?php
	foreach($productsArray as $productArray):
		//loop thru each item in the array and get the array within it:
		//pull out the seperate variables from the inner array:
		$id = $productArray['id'];
		$qty = $productArray['qty'];
		$type = $productArray['type'];
	//	$from = $productArray['from'];
	//	$to = $productArray['to'];
		//get the image
		$pod = pods($type, $id);
	    $image = $pod->field('image_1');
	    $image = wp_get_attachment_image_src($image['ID'], 'full');
		if(!empty($pod->data)):
			$totalPrice = $pod->field('price')*$qty;
	?>	

				<div class="item-container clearfix">
					<div class="description">
						<img src="<?php echo $image[0]; ?>" />
						<h5><a href="<?php bloginfo('url');?>/<?php echo $type;?>/<?php echo $pod->field('permalink');?>"> <?php echo $pod->field('name');?></a></h5>

						<h6><?php echo $type; ?> in <?php echo $pod->display('area'); ?></h6>
						<p><?php echo $pod->field('blurb'); ?></p>

					</div>

					<div class="pricing clearfix">

						<p class="label">Unit price:</p>
						<p><?php echo price_format($pod->field('price'));?></p>

						<p class="label">Quantity:</p>
						<input type="text" name="qty" value="<?php echo $qty;?>" class="qty-input" data-id ="<?php echo $id;?>" data-type="<?php echo $type;?>" />			

				        <p class="label">Total:</p>
						<p><?php echo price_format($totalPrice);  ?></p>


						<p class="remove-label">Remove from cart:</p>
                        <div class="delete-icon" data-id ="<?php echo $id;?>" data-type="<?php echo $type;?>" alt="delete icon" /></div>
					</div>

				</div>
	<?php
		//each time loops add cost of product to total var:
		$totalCost += $totalPrice;
		$numItems += $qty;
		endif;
	endforeach;
	?>

			<div class="total-row clearfix">
			  	<p class="label">Total Cost:</p>
			  	<p><?php echo price_format($totalCost); ?></p>
       		 	<p class="remove-label">Remove all:</p>

                <div class="delete-all"></div>
       		 	<p class="hidden-qty"><?php echo $numItems; ?></p>
			</div>
		</div><!-- close itinerary -->			
	</div><!-- close cart -->
	
	<!-- book button -->
	<a href="#" class="clearfix" id="book"><h4>Make Booking</h4></a>				

		<!-- booking form -->
		<div class="clearfix" id="details">
    
            <h3>Please enter your details below:</h3> 
            <p id="email-status"></p>      
            <div class="clearfix">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="clearfix">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="clearfix">
                <label for="credit-type">Credit Card Type:</label>
                <select id="credit-type" name="credit-type">
                	<option selected value="visa">Visa</option>
                    <option value="master">Master Card</option>
                    <option value="ammex">Ammex</option>
                </select>
            </div>
             <div class="clearfix">
                <label for="credit-num">Credit Card Number:</label>
                <input type="text" id="credit-num" name="credit-num">
            </div>
            <div class="clearfix">
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
            </div>
        <div class="clearfix">
            <label>&nbsp;</label>
            <input type="submit" value="BUY NOW" class="cart-btn">
            <input type="hidden" value="sendOrder" name="action" id="action"> 
            <input type="text" value="" name="spam" class="hidden" id="spam"> 
        </div>
 	 	</div>
             

		</form>	<!-- end form -->
	<?php
	else:
	?>
        <p class="hidden-qty">0</p>
		<p id="emptyCart">Your Cart is Empty</p> 
	<?php
	endif;
	exit;	
}//end loadCart()

//This is used to loop thru a 2 dimensional array, check if an item is in there and return the index for the item:
function checkProductInArray($id, $type, $productsArray){

	$key = false;
	$i = 0;
	$arrayCount = count($productsArray);

	if($arrayCount == 0){
		return false;
	}
	for($i = 0; $i < $arrayCount; $i++):
		//check that the id and type of the item is the same as what is in the array:
		if($productsArray[$i]['id'] == $id && $productsArray[$i]['type'] == $type):
			//if it is put the index($i) into var $key:
			$key = $i;
			//break;
		endif; 
	endfor;

	return $key;
}//end checkProductInArray()

//manages adding, removing and updating the cart session
//returns the updated shopping cart array once it has been modified
function cartManager(){
	
	//catch the POST variables sent to the Ajax script:
	$id = isset($_POST['id'])? $_POST['id'] : 0;
	$mode = isset($_POST['mode'])? $_POST['mode'] : "";
	$type = isset($_POST['type'])? $_POST['type'] : "";
	$qty = isset($_POST['qty'])? $_POST['qty'] : "";
	$from = isset($_POST['from'])? $_POST['from'] : "";
	$to = isset($_POST['to'])? $_POST['to'] : "";

	
	//if the session array doesn't exist then create it
	if(!isset($_SESSION['productsArray'])):
		$_SESSION['productsArray'] = array();
	endif; 
	
	//set local var $productsArray
	$productsArray = $_SESSION['productsArray'];
	
	//If the item already exists in the cart, then set it's index. if it doesn't exist (or not set) it will be set to false
	$index = isset($_POST['id'])? checkProductInArray($id, $type, $productsArray) : false;
	
	//switch based on the mode
	switch($mode):
		
		case "add":
			//if the item hasn't already been add it to the array, then add it:
			if($index===false):
				
				//create an array and add the values:
				$singleProductArray = array();
				$singleProductArray['id']= $id;
				$singleProductArray['qty']= $qty;
				$singleProductArray['type']= $type;
				//push the single array into the $productsArray
				$productsArray[] = $singleProductArray;
				echo "<div id='hidden-message' class='hidden-message'>Item added to cart</div>";	
			else:
				//if the item has already been added to the array
				//add the $qty to the existing quantity for that item
				$productsArray[$index]['qty'] += $qty;
				echo "<div id='hidden-message' class='hidden-message'>Item has been updated</div>";

			//	print_r($_POST);
			//	print($_SERVER['REQUEST_METHOD']);
			endif;
			
			break;
		
		case "delete":
			//if the item exists	
			if($index !== false):
			
				//unset the array item and resort the array to reset the indexes
				unset($productsArray[$index]);
				$productsArray = array_values($productsArray);
				echo "<div id='hidden-message' class='hidden-message'>Item removed from cart</div>";	
				
			endif;
			
			break;
			
		case "update":
		
			if($index !== false):	
				//update the qty for that item
				$productsArray[$index]['qty'] = $qty;
				echo "<div id='hidden-message' class='hidden-message'>Item has been updated</div>";	
			endif;
			
			break;
	
		case "delete-all":
			//clear all session arrays:
			$productsArray  = array();
			echo "<div id='hidden-message' class='hidden-message'>All items removed from cart</div>";
			
			break;
				
	endswitch;	
	
	//return modified products array
	$_SESSION['productsArray'] = $productsArray;
	return $productsArray;
	
}//end cartManager()

function price_format($price){
	return "$".number_format($price, 2, '.', ',');
}

//once jquery has validated the form, this function puts together email of the items in the cart and emails them
function sendOrder(){
	//catch post vars
	$subject = "website order";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$cctype = $_POST['credit-type'];
	$ccnum = $_POST['credit-num'];
	$message = $_POST['message'];
	
	//set email body and headers
	$body = "
	Website Order:\n\n
	name: $name\n
	email: $email\n
	credit card: $cctype\n
	number: $ccnum\n
	message: $message\n
	-------------\n
	Order:\n\n
	";
	
	$productsArray = $_SESSION['productsArray'];
	
	$totalCost = 0;
	$productsCount = count($productsArray);
	
	if($productsCount > 0){
		
		foreach($productsArray as $productArray):
			//test_dump($productArray);
			$id = $productArray['id'];
			$qty = $productArray['qty'];
			$type = $productArray['type'];
			
			$pod = pods($type,$id);
			//for each item. create an array of data from query result:
			if(!empty($pod->data)):
				$price = $pod->field('price');
				$product = $pod->field('name');
				$totalPrice = $price*$qty;
				$body .= "
				Product = $product \n
				Type = $type \n
				Qty = $qty \n
				Price = $price \n
				Sub Total = $totalPrice \n
				-----------------
				\n\n" ;
				
				$totalCost += $totalPrice;
			endif;
		endforeach;
	}//end if
	$body .= "Total = $totalCost\n";
	$headers = 'From: '.$_POST['name'].'<'.$_POST['email'].'>'."\r\n";
	
	//send email
	if(mail(RECIPIENT, $subject , $body, $headers)){	
		echo "success";
	} else {
		echo "error";
	}//end if mail
	
	exit;
	
}//function

?>