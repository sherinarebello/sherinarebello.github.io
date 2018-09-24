<?php
/*Plugin Name: Form Mail Custom
Version: 1.0
Author: Matt
Description: A custom plugin featuring a contact form with jQuery form validation and Ajax send mail functionality. The form requires styling using .contact-form. To display form use displayContactForm(). To apply formvalidation and ajax sendmail functionality include hook cfm_footer() before the closeing body tag. To edit the email recipient open formmail_custom.php and define the RECIPIENT.
*/
//define the recipient
define('RECIPIENT', 'matsteve16@gmail.com');
define("FORM_PLUGIN_URL", plugin_dir_url(__FILE__));
//var_dump(FORM_PLUGIN_URL);
function cfm_footer(){
	do_action('cfm_footer');
}
add_action('cfm_footer', 'addFormScripts');

add_action('wp_ajax_sendMail', 'sendMail');
add_action('wp_ajax_nopriv_sendMail', 'sendMail');

function displayContactForm(){?>
<form class="contact-form" id="contact-form" method="post">
    <p id="status"></p>
              	<div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" />
              	</div>
              	<div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" />
              	</div>
              	<div>
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" />
              	</div>
              	<div>
                <label for="message">Message:</label>
                <textarea name="message" id="message"></textarea>
             	</div>
              	<div>
                <label>&nbsp;</label>
                <input class="button" type="submit" value="Send" />
                <input id="reset" class="button" type="reset" value="Reset" />
              	</div>
              	<input id="spam" class="hidden" name="spam" type="text" value="" />
            	</form>
<?php }

function addFormScripts(){
?>
<script>var adminAjax = {"ajaxurl":"<?php echo admin_url('admin-ajax.php');?>", "ajaxaction":"sendMail"}</script>
<script src="<?php echo FORM_PLUGIN_URL.'js/jquery.formvalidation.js'?>"></script>
<script src="<?php echo FORM_PLUGIN_URL.'js/contact.js'?>"></script>
<?php }

function sendMail(){
	
	//catch the Post vars
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	//set the email body and headers
	$body = $message."\n\n";
	$body .= $name."<$email>";
	$headers = "From: $name<$email>";
	
	//send email
	if(mail(RECIPIENT, $subject, $body, $headers)){
		
		echo "success";
		
	}else{
		
		echo "error";
		
	};
	
	exit;
}

?>