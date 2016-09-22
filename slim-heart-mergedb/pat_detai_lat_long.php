<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();




$pat_id_last=$_REQUEST['pat_id_last'];

$lat_hosp=$_REQUEST['lat_hosp'];

$long_hosp=$_REQUEST['long_hosp'];





$insertdetlatlong = "INSERT INTO patient_observation_condition (patient_id,patdate,pattime,lat,longitude) VALUES ('$pat_id_last',now(),now(),'$lat_hosp','$long_hosp')";

$run=mysql_query($insertdetlatlong);


$sellatlng = mysql_query("SELECT * from patient_observation_condition order by patient_obs_id DESC");
$fetchlatlng = mysql_fetch_array($sellatlng);
$lat = $fetchlatlng['lat'];
$long = $fetchlatlng['longitude'];
$selobsdet = "SELECT * , (6371 * 2 * ASIN(SQRT( POWER(SIN(( $lat - latitude) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(latitude * pi()/180) * POWER(SIN(( $long - longitude) * pi()/180 / 2), 2) ))) as distance from hospitals having  distance <= 2 order by distance";
$runobsdet = mysql_query($selobsdet);
//$num_rows = mysql_num_rows($runobsdet);
while($fetchobs = mysql_fetch_array($runobsdet)) {

array_push($collectionArray,$fetchobs);

}






print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>
