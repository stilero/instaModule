<?php
    require_once '../instaClass.php';
    $clientId = $_POST['client_id'];
    $clientSecret = $_POST['client_secret'];
    $authCode = $_POST['code'];
    $redirectURI = $_POST['redirect_uri'];
    $config = array(
        'redirectURI'   =>  $redirectURI
    );
    $instagram = new instaClass($clientId, $clientSecret, $authCode,'', $config);
    $token  = $instagram->requestAccessToken($authCode);
    print $token;
?>
