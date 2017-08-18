<?php
	if(!isset($_POST['submit']))
	{
		echo "error; you need to submit the form";
	}

	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];

	//Validate
	if(empty($name) || empty($visitor_email))
	{
		echo "Name and email are mandatory!";
		exit;
	}

	if(IsInjected($visitor_email))
	{
		echo "Bad email value!";
		exit;
	}

	$email_from = 'contact@smefon.com';
	$email_subject = " New Message from your website's contact us page";
	$email_body = "You have received a new message from \n$name. \n$email \n\nMessage: \n $message";

	$to = "contact@smefon.com, femibamgbose@smefon.com";
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $visitor_email \r\n";
	mail($to,$email_subject,$email_body,$headers);


	function IsInjected($str)
	{
	    $injections = array('(\n+)',
	           '(\r+)',
	           '(\t+)',
	           '(%0A+)',
	           '(%0D+)',
	           '(%08+)',
	           '(%09+)'
	           );               

	    $inject = join('|', $injections);
	    $inject = "/$inject/i"; 

	    if(preg_match($inject,$str))
	    {
	    	return true;
	    }
	   	else
	    {
	      return false;
	    }
	} 

?>
