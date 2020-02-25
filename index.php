<?php

require_once 'vendor/autoload.php';
use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize('S3HRKiyOpoKAyCHNB8RCZqRoV1w', 'qKVuYvpguf2nC_HdHsGK4');

// Exemple with Google (using ZendFramwork, Controller /oauth)
// Action /signin (url: /oauth/authorize)
function signinAction(provider) {
    try {
        $this->oauth->redirect(provider, 'index.php');
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

// Action /redirect (url: /oauth/redirect)
function redirectAction(provider) {
    try {
        $request_object = $this->oauth->auth(provider, array(
            'redirect' => true
        ));
    } catch (\Exception $e) {
        die($e->getMessage());
    }
    //Your user is authorized by Google
    //You can use $request_object to make API calls on behalf of your user
}

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
