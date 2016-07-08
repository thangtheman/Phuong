$facebook = new Facebook(array('appId'  => YOUR_FACEBOOK_APP_ID,'secret' => YOUR_FACEBOOK_SECRET_KEY,'cookie' => true,'domain' => YOUR_APPLICATION_HOST_DOMAIN));

$session = $facebook->getSession();
if (!$session)
{
$wanted_permissions='email';
$url = $facebook->getLoginUrl(array('canvas' => 1,'fbconnect' => 0,'req_perms'=>$wanted_permissions));
echo "<script type='text/javascript'>top.location.href = '$url';</script>";
}
else
{
try
{
$fbID = $facebook->getUser();
$me = $facebook->api('/me');
$email=$me['email'];
}
catch (Exception $e)
{
echo $e->getMessage();
}
}
