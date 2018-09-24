<?php
/*Plugin Name: Form Mail Custom
Version: 1.0
Author: Suzannah Howard
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
<form id="contact-form" class="contact-form clearfix" action="" method="post">
              <img src="<?php bloginfo('template_url'); ?>/images/LEAPspeechbubbleicon.png" alt="speech bubble">
                  <h2>GET IN TOUCH!</h2>
                  <p>Ask us a question, let us know your thoughts or simply say hello! All messages below go direct to our inbox. One of the team will get back to you within 48 hours, if not sooner! Please give us as much detail as you can in order to help you with your enquiry.</p>
                  <p id="contact-status"></p>
                  <div class="contact-form-details">
                    <div>
                      <label for="contact-name">full name</label>
                      <input type="text" id="contact-name" name="contact-name" />
                    </div>
                    <div>
                      <label for="contact-email">email address</label>
                      <input type="text" id="contact-email" name="contact-email" />
                    </div>
                    <div>
                      <label for="contact-subject">subject</label>
                      <input type="text" id="contact-subject" name="contact-subject" />
                    </div>
                  </div>
                  <div class="contact-form-message">
                    <div>
                      <label for="contact-message">message</label>
                      <textarea name="contact-message" id="contact-message"></textarea>
                    </div>
                  </div>
                  <div>
                  	<input id="reset" class="button" type="reset" value="Reset" />
                    <input class="button" type="submit" value="Send" />
                  </div>
                  <input id="contact-spam" class="hidden" name="spam" type="text" value="" />
              </form>
<?php }

function addFormScripts(){
?>
<script>var adminAjax = {"ajaxurl":"<?php echo admin_url('admin-ajax.php');?>", "ajaxaction":"sendMail"}</script>
<script src="<?php echo FORM_PLUGIN_URL.'js/jquery.formvalidation.min.js'?>"></script>
<?php }

function sendMail(){
	
	//catch the Post vars
	$name = $_POST['contact-name'];
	$email = $_POST['contact-email'];
	$subject = $_POST['contact-subject'];
	$message = $_POST['contact-message'];
	
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