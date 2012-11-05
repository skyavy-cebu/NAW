<?php

function email_resetpassword($to_email, $rcode = '', $URL = 'localhost') {
	$subject = '';
	$from_name = '';
	$from_email = '';

	$body = $URL . 'resetpassword?rcode=' . $rcode;

	mb_language("uni");
	ini_set("mbstring.internal_encoding", "UTF-8");
	mb_internal_encoding("UTF-8");
	$headers = "From: =?UTF-8?B?" . base64_encode($from_name) . "?= <" . $from_email . ">";
	mb_send_mail($to_email, $subject, $body, $headers);
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

function email_contactus($param) {
	$postmaster = $param['system_senderemail'];
	$postmaster_name = $param['system_sendername'];
	$subject = '';
	$from_name = $param['person_name'];
	$from_email = $param['person_email'];
	$body = "";

	mb_language("uni");
	ini_set("mbstring.internal_encoding", "UTF-8");
	mb_internal_encoding("UTF-8");
	$headers = "From: =?UTF-8?B?" . base64_encode($from_name) . "?= <" . $from_email . ">";
	mb_send_mail($param['system_receiveemail'], $subject, $body, $headers);

	$headers = "From: =?UTF-8?B?" . base64_encode($from_name) . "?= <" . $from_email . ">";
	mb_send_mail($param['person_email'], $subject, $body, $headers);
}