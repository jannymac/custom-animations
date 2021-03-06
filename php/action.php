<?php
	header("Content-Type: text/html; charset=utf-8");

	if (!$_POST) exit;

	require dirname(__FILE__)."/validation.php";
	require dirname(__FILE__)."/csrf.php";

/************************************************/
/* Your data */
/************************************************/
	/* Your email goes here */
	$your_email = "";

	/* Your name or your company name goes here */
	$your_name = "Custom Animations";

	/* Message subject */
	$your_subject = "Quotation Request";

/************************************************/
/* Settings */
/************************************************/
	/* Select validation for fields */
	/* If you want to validate field - true, if you don't - false */
	$validate_name				= true;
	$validate_email				= true;
	$validate_phonenumber		= true;
	$validate_vidtype			= false;
	$validate_length			= true;
	$validate_addinfo			= true;
	$validate_discovery			= false;

	/* Select the action */
	/* If you want to do the action - true, if you don't - false */
	$send_letter = true;

/************************************************/
/* Variables */
/************************************************/
	/* Error variables */
	$error_text		= array();
	$error_message	= '';

	/* POST data */
	$name			= (isset($_POST["name"]))			? strip_tags(trim($_POST["name"]))			: false;
	$email			= (isset($_POST["email"]))			? strip_tags(trim($_POST["email"]))			: false;
	$phonenumber	= (isset($_POST["phonenumber"]))	? strip_tags(trim($_POST["phonenumber"]))	: false;
	$vidtype		= (isset($_POST["vidtype"]))		? strip_tags(trim($_POST["vidtype"]))		: false;
	$length			= (isset($_POST["length"]))			? strip_tags(trim($_POST["length"]))		: false;
	$addinfo		= (isset($_POST["addinfo"]))		? strip_tags(trim($_POST["addinfo"]))		: false;
	$discovery		= (isset($_POST["discovery"]))		? strip_tags(trim($_POST["discovery"]))		: false;
	$token			= (isset($_POST["token_booking"])) 	? strip_tags(trim($_POST["token_booking"])) : false;
	
	$name			= htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
	$email			= htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	$phonenumber	= htmlspecialchars($phonenumber, ENT_QUOTES, 'UTF-8');
	$vidtype		= htmlspecialchars($vidtype, ENT_QUOTES, 'UTF-8');
	$length			= htmlspecialchars($length, ENT_QUOTES, 'UTF-8');
	$addinfo		= htmlspecialchars($addinfo, ENT_QUOTES, 'UTF-8');
	$discovery		= htmlspecialchars($discovery, ENT_QUOTES, 'UTF-8');
	$token			= htmlspecialchars($token, ENT_QUOTES, 'UTF-8');

	/*$name			= substr($name, 0, 30);
	$email			= substr($email, 0, 30);
	$phonenumber	= substr($phonenumber, 0, 30);
	$length			= substr($length, 0, 20);
	$addinfo		= substr($addinfo, 0, 20);

/************************************************/
/* CSRF protection */
/************************************************/
	$new_token = new CSRF('booking');
	if (!$new_token->check_token($token)) {
		echo '<div class="error-message unit"><i class="fa fa-close"></i>Incorrect token. Please reload this webpage.</div>';
		exit;
	}


/************************************************/
/* Validation */
/************************************************/
	/* Name */
	if ($validate_name){
		$result = validateName($name, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Email */
	if ($validate_email){
		$result = validateEmail($email);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Phone Number */
	if ($validate_phonenumber){
		$result = validatePhonenumber($phonenumber);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}
	
	/* Video Type */
	if ($validate_vidtype){
		$result = validateVidtype($vidtype);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}
	
		/* Video Length */
	if ($validate_length){
		$result = validateVidlength($length);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}
	
			/* Additional Info */
	if ($validate_addinfo){
		$result = validateAddinfo($addinfo);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}
	
			/* Discovery */
	if ($validate_discovery){
		$result = validateDiscovery($discovery);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* If validation error occurs */
	if ($error_text) {
		foreach ($error_text as $val) {
			$error_message .= '<li>' . $val . '</li>';
		}
		echo '<div class="error-message unit"><i class="fa fa-close"></i>Oops! The following errors occurred:<ul>' . $error_message . '</ul></div>';
		exit;
	}

/************************************************/
/* Sending email */
/************************************************/
	if ($send_letter) {

		/* Send email using sendmail function */
		/* If you want to use sendmail - true, if you don't - false */
		/* If you will use sendmail function - do not forget to set '$smtp' variable to 'false' */
		$sendmail = true;
		if ($sendmail) {
			require dirname(__FILE__)."/phpmailer/PHPMailerAutoload.php";
			require dirname(__FILE__)."/message.php";
			$mail = new PHPMailer;
			$mail->isSendmail();
			$mail->IsHTML(true);
			$mail->From = $email;
			$mail->CharSet = "UTF-8";
			$mail->FromName = "Custom Animations";
			$mail->Encoding = "base64";
			$mail->ContentType = "text/html";
			$mail->addAddress($your_email, $your_name);
			$mail->Subject = $your_subject;
			$mail->Body = $letter;
			$mail->AltBody = "Use an HTML compatible email client";
		}

		/* Send email using smtp function */
		/* If you want to use smtp - true, if you don't - false */
		/* If you will use smtp function - do not forget to set '$sendmail' variable to 'false' */
		$smtp = false;
		if ($smtp) {
			require dirname(__FILE__)."/phpmailer/PHPMailerAutoload.php";
			require dirname(__FILE__)."/message.php";
			$mail = new PHPMailer;
			$mail->isSMTP();											// Set mailer to use SMTP
			$mail->Host = "smtp.gmail.com";								// Specify main and backup server
			$mail->SMTPAuth = true;										// Enable SMTP authentication
			$mail->Username = "";				// SMTP username
			$mail->Password = "";						// SMTP password
			$mail->SMTPSecure = "tls";									// Enable encryption, 'ssl' also accepted
			$mail->Port = 465;											// SMTP Port number e.g. smtp.gmail.com uses port 465
			$mail->IsHTML(true);
			$mail->From = $email;
			$mail->CharSet = "UTF-8";
			$mail->FromName = "Custom Animations";
			$mail->Encoding = "base64";
			$mail->Timeout = 200;
			$mail->SMTPDebug = 0;
			$mail->ContentType = "text/html";
			$mail->addAddress($your_email, $your_name);
			$mail->Subject = $your_subject;
			$mail->Body = $letter;
			$mail->AltBody = "Use an HTML compatible email client";
		}

		/* Multiple email recepients */
		/* If you want to add multiple email recepients - true, if you don't - false */
		/* Enter email and name of the recipients */
		$recipients = false;
		if ($recipients) {
			$recipients = array("email@domain.com" => "name of recipient",
								"email@domain.com" => "name of recipient",
								"email@domain.com" => "name of recipient"
								);
			foreach ($recipients as $email => $name) {
				$mail->AddBCC($email, $name);
			}
		}

		/* if error occurs while email sending */
		if(!$mail->send()) {
			echo '<div class="error-message unit"><i class="fa fa-close"></i>Mailer Error: ' . $mail->ErrorInfo . '</div>';
			exit;
		}
	}

/************************************************/
/* Success message */
/************************************************/
	echo '<div class="success-message unit"><i class="fa fa-check"></i>Your quotation request has been sent successfully.</div>';
?>