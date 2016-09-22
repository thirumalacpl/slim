<?php
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');

$collectionArray=array();
$claimant_details_array=array();
$details_injured_array=array();

$details_deceased_array=array();
$driver_details_d_array=array();

$driver_details_o_array=array();
$fir_details_array=array();
$accident_details_array=array();
$vehicle_details_array=array();
$insured_per_details_array=array();
$verification_master_arra=array();
$policy_details_array=array();

/*$region = mysql_real_escape_string($_REQUEST['region']);
$user_id = mysql_real_escape_string($_REQUEST['user_id']);
$state = mysql_real_escape_string($_REQUEST['state']);	*/


$claimant_details = mysql_query("select * ,ct.city_name,st.state from claimant_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($claimant_details)== 0){
 	$claimant_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7212 = mysql_fetch_array($claimant_details)) {
	array_push($claimant_details_array,$r7212);
}
}


$details_injured = mysql_query("select *  from details_injured "); 
if(mysql_num_rows($details_injured)== 0){
 	$details_injured_array['data new veri'][] =  0;
	}
	else{
	 while($r722 = mysql_fetch_array($details_injured)) {
	array_push($details_injured_array,$r722);
}
}

$details_deceased = mysql_query("select * from details_deceased "); 
if(mysql_num_rows($details_deceased)== 0){
 	$details_deceased_array['data new veri'][] =  0;
	}
	else{
	 while($r723 = mysql_fetch_array($details_deceased)) {
	array_push($details_deceased_array,$r723);
}
}


$driver_details_d = mysql_query("select * ,ct.city_name,st.state from driver_details_d wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($driver_details_d)== 0){
 	$driver_details_d_array['data new veri'][] =  0;
	}
	else{
	 while($r7256 = mysql_fetch_array($driver_details_d)) {
	array_push($driver_details_d_array,$r7256);
}
}


$driver_details_o = mysql_query("select * ,ct.city_name,st.state from driver_details_o wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($driver_details_o)== 0){
 	$driver_details_o_array['data new veri'][] =  0;
	}
	else{
	 while($r7289 = mysql_fetch_array($driver_details_o)) {
	array_push($driver_details_o_array,$r7289);
}
}

$fir_details = mysql_query("select * ,ct.city_name,st.state from fir_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($fir_details)== 0){
 	$fir_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7200 = mysql_fetch_array($fir_details)) {
	array_push($fir_details_array,$r7200);
}
}


$accident_details = mysql_query("select * ,ct.city_name,st.state from accident_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($accident_details)== 0){
 	$accident_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7209 = mysql_fetch_array($accident_details)) {
	array_push($accident_details_array,$r7209);
}
}

$vehicle_details = mysql_query("select * ,ct.city_name,st.state from vehicle_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($vehicle_details)== 0){
 	$vehicle_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72009 = mysql_fetch_array($vehicle_details)) {
	array_push($vehicle_details_array,$r72009);
}
}

$insured_per_details = mysql_query("select * ,ct.city_name,st.state from insured_per_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($insured_per_details)== 0){
 	$insured_per_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72009 = mysql_fetch_array($insured_per_details)) {
	array_push($insured_per_details_array,$r72009);
}
}
$verification_master = mysql_query("select * ,ct.city_name,st.state from verification_master wv Inner join cities ct on wv.Current_City=ct.city_id Inner join states st on st.id=wv.Current_State"); 
if(mysql_num_rows($verification_master)== 0){
 	$verification_master_arra['data new veri'][] =  0;
	}
	else{
	 while($r72009123 = mysql_fetch_array($verification_master)) {

	array_push($verification_master_arra,$r72009123);
}
}

$policy_details = mysql_query("select * ,ct.city_name,st.state from policy_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($policy_details)== 0){
 	$policy_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72009123123 = mysql_fetch_array($policy_details)) {
	array_push($policy_details_array,$r72009123123);
}
}


array_push($collectionArray,$claimant_details_array); //15    // db error  //45
array_push($collectionArray,$details_injured_array); //42                  //46
array_push($collectionArray,$details_deceased_array); //43          //47
array_push($collectionArray,$driver_details_d_array); //15    // db error  //48
array_push($collectionArray,$driver_details_o_array); //42                  //49
array_push($collectionArray,$fir_details_array); //43          //50
array_push($collectionArray,$accident_details_array); //43          //51
array_push($collectionArray,$vehicle_details_array); //43          //52
array_push($collectionArray,$insured_per_details_array); //43          //53
array_push($collectionArray,$verification_master_arra); //43          //54
array_push($collectionArray,$policy_details_array); //43          //55

print json_encode($collectionArray, JSON_NUMERIC_CHECK);
	
?>
