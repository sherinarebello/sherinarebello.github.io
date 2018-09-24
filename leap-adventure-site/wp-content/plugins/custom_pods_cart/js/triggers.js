jQuery(document).ready(function($) {
	
	var $cartBtn = $("#cart-btn")
		$displayCart = $("#display-cart"),
		$content = $(".feature"),
		$status = $("#status"),
		$counter = $("#counter"),
		$qtyInput = $(".qty-input"),
		scrollSpeed = 400,
		animSpeed = 250;

	//declare functions
	function setStatus(){ //function handles the popup message & counter
		$status.html($(".hidden-message").html()).stop(true, false).fadeIn(animSpeed).delay(500).fadeOut(animSpeed);
		$counter.html($(".hidden-qty").html());
	}
	function initStatus(){
		$counter.html($(".hidden-qty").html());
	}

	//intitialise cart
	$displayCart.load(cartObj.ajaxURL, {"action": cartObj.cartAction}, initStatus);
	
	//on submit of the add-to-cart-form, retrieve the data and load the php function "loadCart"
	$content.on("submit",".add-to-cart-form",function(e){
		e.preventDefault();
		var qty = $(this).find(".qty").val(),
			id = $(this).data('id'),
			type = $(this).data('type'),
			from = $(this).find(".from").val(),
			to = $(this).find(".to").val();
		
		//reload cart
		$displayCart.load(cartObj.ajaxURL, { "action": cartObj.cartAction, "mode" : "add", "id" : id, "qty" : qty, "type" : type, "from": from, "to": to }, setStatus);
	});

	// on click, slide toggle the booking form
	$displayCart.on("click","#book",function(e){
		e.preventDefault();
		var $bookContainer = $("#details"); // set the local bookContainer variable
		$bookContainer.slideToggle(scrollSpeed); // slideToggle the bookContainer
	});	

	$displayCart.on("change",".qty-input", function(){
		var id = $(this).data("id"),
			type = $(this).data("type"),
			qty = $(this).val();
		$displayCart.load(cartObj.ajaxURL, { "action": cartObj.cartAction, "mode" : "update", "id" : id, "type" : type, "qty" : qty }, setStatus);				
	});


	
	//on click of the delete image, run delete function and re-load cart functions:
	$displayCart.on("click","div.delete-icon", function() {
		var id = $(this).data("id"),
			type = $(this).data("type");

		$displayCart.load(cartObj.ajaxURL, { "action": cartObj.cartAction, "mode" : "delete", "id" : id, "type" : type }, setStatus);
	});
	
	//on click of the remove all link, run function to remove all items then re-load cart:
	$displayCart.on("click",".delete-all", function() {
		$displayCart.load(cartObj.ajaxURL, {"action": cartObj.cartAction, "mode" : "delete-all" }, setStatus);
		return false;
	});
	 
	//on submit of the order form, run form validation, then send order ajax:
	$displayCart.on("submit","#cart-form", function(e) {
		
		e.preventDefault();
		
		var $form = $(this),	
		name = $form.find("#name"),
		email = $form.find("#email"),
		credit = $form.find("#credit-num"),
		message = $form.find("#message"),
		spam = $form.find("#spam"),
		formFields = $form.find("input:text, textarea"),
		status = $form.find("#email-status");
		
		formFields.removeClass("error-focus");
		
		//check required fields are not empty and that the email address is valid
		if(name.val()==""){
			
			errorMessage("Please Enter Your Name");
			name.focus().addClass("error-focus");
			
		}else if(email.val()==""){
			
			errorMessage("Please Enter Your Email Address");
			email.focus().addClass("error-focus");
			
		}else if(!isValidEmail(email.val())){
			
			errorMessage("Please Enter a Correct Email Address");
			email.focus().addClass("error-focus");
			
		}else if(!isValidCrediCardNum(credit.val())){
			
			errorMessage("Please Enter Your Credit Card Number");
			credit.focus().addClass("error-focus");
			
		}else if(message.val()==""){
			
			errorMessage("Please Enter Your Message");
			message.focus().addClass("error-focus");
			
		}else if(!spam.val()==""){
			
			errorMessage("Spam Attack!!");

		}else{
			
			//if all fields are valid then send data to the server for processing
			successMessage("Booking being processed... please wait");				
	
			var formData = $form.serialize();
			
			$.post(cartObj.ajaxURL, formData, function(sent) {

				 if(sent=="success"){ 
				 	
					successMessage("Thanks "+name.val()+", your booking has been successfully processed, you will receive a confirmation email shortly");
					  
				} else if(sent=="error"){
					
					 errorMessage("Opps, something went wrong - your booking was not successfully processed");	
					
					//clear form fields
					formFields.val("");	
					
				}else{
					alert("else: "+ sent);
				}
				
			  });
			  
		}//end else
		
		function errorMessage(message){
			status.html(message).attr("class", "error").slideDown("fast");
		}
		
		function successMessage(message){
			status.html(message).attr("class", "success").slideDown("fast");
		}
		
		function isValidEmail(email) {
			var emailRx = /^[\w\.-]+@[\w\.-]+\.\w+$/;
			return  emailRx.test(email);
		}
		
		function isValidCrediCardNum(ccnum) {
			var ccNumRx = /^\d{16}$/;
			return  ccNumRx.test(ccnum);
		}
	});
	
	
});//ready