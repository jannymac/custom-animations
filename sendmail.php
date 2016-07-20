<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "janessa.mckell@gmail.com";
 
    $email_subject = "Quotation Request - Custom Animations";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found in the form data you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please fix these errors and re-submit.<br /><br />";
 
        die();
 
    }

 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone-number']) ||
 
        !isset($_POST['vidtype']) ||

        !isset($_POST['length']) ||

        !isset($_POST['add-info']) ||

        !isset($_POST['discovery']) ||
 
        !isset($_POST['human'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $email = $_POST['email']; // required
 
    $phone-number = $_POST['phone-number']; // required
 
    $vidtype = $_POST['vidtype']; // not required
 
    $length = $_POST['length']; // required

    $add-info = $_POST['add-info']; // required

    $discovery = $_POST['discovery']; // required

    $human = $_POST['human']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$length)) {
 
    $error_message .= 'The Length you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($add-info) < 2) {
 
    $error_message .= 'The Additional Info you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Telephone Number: ".clean_string($phone-number)."\n";
 
    $email_message .= "Video Type: ".clean_string($vidtype)."\n";
 
    $email_message .= "Video Length: ".clean_string($length)."\n";

    $email_message .= "Additional Info: ".clean_string($add-info)."\n";

    $email_message .= "Heard About Us: ".clean_string($discovery)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>