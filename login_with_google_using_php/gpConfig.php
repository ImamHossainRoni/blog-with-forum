<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '177951633837-kmklmvveo5i5qrfvfiktq00drtmt8mu1.apps.googleusercontent.com'; 
$clientSecret = 'IcFea0c5wQ9I5X8taOaRtio5'; 
$redirectURL = 'https://localhost/login_with_google_using_php'; 


//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>