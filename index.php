<?php

require_once '/vendor/autoload.php';
use OAuth_io\OAuth;

$oauth = new OAuth();
$oauth->initialize('S3HRKiyOpoKAyCHNB8RCZqRoV1w', 'qKVuYvpguf2nC_HdHsGK4');

// Exemple with Google (using ZendFramwork, Controller /oauth)
// Action /signin (url: /oauth/authorize)
public function signinAction() {
    try {
        $this->oauth->redirect('spotify', 'index.php');
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

// Action /redirect (url: /oauth/redirect)
public function redirectAction() {
    try {
        $request_object = $this->oauth->auth('spotify', array(
            'redirect' => true
        ));
    } catch (\Exception $e) {
        die($e->getMessage());
    }
    //Your user is authorized by Google
    //You can use $request_object to make API calls on behalf of your user
}

$request_object = $oauth->auth('spotify', array(
    'credentials' => $credentials,
    'force_refresh' => true
));

$result = $request_object->me(array('firstname', 'lastname', 'email'));

dump($result);

?>
