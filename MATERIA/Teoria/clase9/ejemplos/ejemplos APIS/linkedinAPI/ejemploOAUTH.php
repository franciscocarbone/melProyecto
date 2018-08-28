<?php
// Fill the keys and secrets you retrieved after registering your app
$oauth = new OAuth("tienen que armar su propia", "app en ");
$oauth->setToken("linkedin", "devoloper");


$params = array();
$headers = array();
$method = OAUTH_HTTP_METHOD_GET;
// Specify LinkedIn API endpoint to retrieve your own profile Ver: https://developer.linkedin.com/apis
$url="http://api.linkedin.com/v1/people/~?";
//$url= "http://api.linkedin.com/v1/people/:(first-name,last-name,headline,picture-url)"; 

//$url= "http://api.linkedin.com/v1/people/~/network/updates/~?format=json";

// By default, the LinkedIn API responses are in XML format. If you prefer JSON, simply specify the format in your call
// $url = "http://api.linkedin.com/v1/people/~?format=json";
// Make call to LinkedIn to retrieve your own profile
$oauth->fetch($url, $params, $method, $headers);
print_r ($oauth->getLastResponse());
?>
