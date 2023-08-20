<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("629780034773-13ossrlm0ao2mi0o0uhq9eplkhple93s.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Nukz QR");
$gClient->setRedirectUri("https://nukreationzdigital.com/qr/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// login URL
$login_url = $gClient->createAuthUrl();
?>