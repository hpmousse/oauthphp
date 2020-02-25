<?php

require_once 'vendor/autoload.php';
use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize('S3HRKiyOpoKAyCHNB8RCZqRoV1w', 'qKVuYvpguf2nC_HdHsGK4');


$oauth->redirect('spotify', 'index.php');

if($request_object){
	$request_object = $oauth->auth('spotify', array(
    	'credentials' => $credentials,
    	'force_refresh' => true
	));
	$result = $request_object->me(array('firstname', 'lastname', 'email'));
	dump($result);
}else{
	signinAction('spotify');
}


?>
