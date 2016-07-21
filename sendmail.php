<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$vidtype = $_POST['vidtype'];
		$length = $_POST['length'];
		$addinfo = $_POST['addinfo'];
		$discovery = $_POST['discovery'];
		$human = intval($_POST['human']);
		$from = 'Custom Animations'; 
		$to = 'janessa.mckell@gmail.com'; 
		$subject = 'Custom Animations - Quotation Request ';
		
		$body = "From: $name\n E-Mail: $email\n Phone:\n $phonenumber Video Type:\n $vidtype Length:\n $length Addditional Info:\n $addinfo Discovery:\n $discovery";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>