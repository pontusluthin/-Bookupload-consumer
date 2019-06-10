<pre>

<?php

include_once 'includes/api.inc.php';


//retrieve the api class from api.inc.php
$api = new getAPi(); 

$getApi = $api->getApi(); 
//$data = file_get_contents($getApi);
//$json_decode = json_decode($data, true);

print_r($getApi); 
