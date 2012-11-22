<?php
function email_forgot($to_email,$to_name,$code){
  $from_email = 'a.richmond@skyavy.com';
  $email_subject = "Network After Work - Retrieve Password";
  $email_body = $message = "Hello ".$to_name.",<br />
  <br />
  You can reset your password by clicking the link below:<br />
  ".base_url()."forgot/".$code."<br />
  <br />
If you didn't request to reset your password, just ignore this email";
  $headers = "From: $from_email\n";
  $headers .= "Reply-To: $from_email";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  mail($to_email,$email_subject,$email_body,$headers);
}

function email_registeractivation($to_email, $rcode = '', $URL = 'localhost') {
	$envi = sfConfig::get('app_envi');

	$subject = 'Thank you for joining Network After Work.';
	$from_name = 'Yongbo';
	$from_email = 'jmaniquez@gmail.com';
	$body = $URL . 'register/activate?acode=' . $rcode;

	mb_language("uni");
	ini_set("mbstring.internal_encoding", "UTF-8");
	mb_internal_encoding("UTF-8");
	$headers = "From: =?UTF-8?B?" . base64_encode($from_name) . "?= <" . $from_email . ">";
	mb_send_mail($to_email, $subject, $body, $headers);
}