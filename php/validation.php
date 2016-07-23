<?php

/******************************************************/
/* Validation methods */
/******************************************************/
	/* Name */
	function validateName($name, $min_length) {
		$error_text = "Enter your name";
		$len = mb_strlen($name, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Email */
	function validateEmail($email){
		$error_text = "Incorrect email format";
		$email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
		return (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
	}	

	/* Video Length */
	function validateVidlength($length){
		$error_text = "Incorrect video length format (Example: 5 mins)";
		$length_template = "/^[_a-z0-9-]/";
		return (preg_match($length_template, $length) !== 1) ? $error_text : "valid";
	}

	/* Additional Info */
	function validateAddinfo($addinfo, $min_length) {
		$error_text = "Additional Info:";
		$len = mb_strlen($addinfo, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}
	
	/* Discovery */
	function validateDiscovery($discovery){
		$discovery = Array('Online Ad', 'Word of Mouth', 'Youtube', 'Other'); 
		if (in_array( $_POST['discovery'], $discovery)) {
			echo 'Valid Field - "How Did You Hear About Us?"'; 
			}
		else {
			echo 'An option for "How Did You Hear About Us?" is not selected.';
		}

	/* Video Type */
	function validateVidtype($vidtype){
	$vidtype = Array('Advertisement','Tutorial','Training' ,' Public Service Announcement','Catalogue','Other');
	if (in_array( $_POST['vidtype'], $vidtype)) {
	echo 'Valid Video Type';      
	}
	else {
		echo 'Video Type is not selected';
	}


?>