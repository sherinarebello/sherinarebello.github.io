<?php 
define('RECIPIENT', 'sherina_mendes@hotmail.com');
	
	//echo "success";

	
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
	
?>