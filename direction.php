
<?php
function loop()
{
$key='AIzaSyBLJsZCnI4g9OPBFzgAtO2w3ppBNlgsJk4';
$address="https://maps.googleapis.com/maps/api/directions/json?origin=28.649208,77.268710&destination=28.621588,77.277761&key=".$key;
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSLVERSION,3);
curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => $address,
CURLOPT_USERAGENT => 'PRASHANT VERMA' 
));
$resp = curl_exec($curl);
if(!curl_exec($curl)){ 
die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
curl_close($curl);
$data = json_decode($resp, true);
echo $data["routes"][0]["legs"][0]["duration"]["value"].'<br>';
}
for($i=0;$i<10;$i++)
{
  loop();
  if($i==5):
  {
    $key='AIzaSyCNSints8lLF9SoyeYO8TnmyTweuGIK9q8';
  }
  endif;
}
?>
