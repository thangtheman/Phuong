<?php

require 'fb/facebook.php';

$facebook = new Facebook(array(
    'appId'  => '680602478761002',
    'secret' => 'b877b073f9c2fa99175cceead50bcee6',
));

// See if there is a user from a cookie
$user = $facebook->getUser();

if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
        $logoutUrl = $facebook->getLogoutUrl();
    } catch (FacebookApiException $e) {
        $user = null;
    }
} else {
    $loginUrl = $facebook->getLoginUrl();
}

?>
