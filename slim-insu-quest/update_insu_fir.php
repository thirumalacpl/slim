<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$insu_user_id_fir = $_REQUEST['insu_user_id_fir'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$name_of_ps = $_REQUEST['name_of_ps'];
	$address_of_ps = $_REQUEST['address_of_ps'];
	$dist_bet_acc_ps = $_REQUEST['dist_bet_acc_ps'];
	$fir_no = $_REQUEST['fir_no'];
	$fir_date = $_REQUEST['fir_date'];
	$delay_in_fir = $_REQUEST['delay_in_fir'];
	$firsum = $_REQUEST['firsum'];
	$fircoy = $_REQUEST['fircoy'];
	$fir_logged_by = $_REQUEST['fir_logged_by'];
	$fofname = $_REQUEST['fofname'];
	$relationship_with_victim = $_REQUEST['relationship_with_victim'];
	$vehicle_details = $_REQUEST['vehicle_details'];
	$no_of_veh_involved = $_REQUEST['no_of_veh_involved'];
	$vehicle_impleded_as_party = $_REQUEST['vehicle_impleded_as_party'];
	$mvi_inspected = $_REQUEST['mvi_inspected'];
	$summary_of_nvi = $_REQUEST['summary_of_nvi'];
	$damage_of_vehicle = $_REQUEST['damage_of_vehicle'];
	$shid_mark_obs = $_REQUEST['shid_mark_obs'];
	$per_of_contribution = $_REQUEST['per_of_contribution'];
	$chargesheet_filed = $_REQUEST['chargesheet_filed'];
	$chargesheetcoll = $_REQUEST['chargesheetcoll'];
	$sumchrge = $_REQUEST['sumchrge'];




$ssql = "UPDATE `fir_details` SET `name_of_ps`= '$name_of_ps' , `address_of_ps`= '$address_of_ps', `dist_bet_acc_ps`= '$dist_bet_acc_ps', `fir_no`= '$fir_no', `fir_date`= '$fir_date', `delay_in_fir`= '$delay_in_fir', `firsum`= '$firsum', `fircoy`= '$fircoy', `fir_logged_by`= '$fir_logged_by', `fofname`= '$fofname'  , `relationship_with_victim`= '$relationship_with_victim' , `vehicle_details`= '$vehicle_details' , `no_of_veh_involved`= '$no_of_veh_involved' , `vehicle_impleded_as_party`= '$vehicle_impleded_as_party',`mvi_inspected`= '$mvi_inspected', `summary_of_nvi`= '$summary_of_nvi' ,`damage_of_vehicle`= '$damage_of_vehicle', `shid_mark_obs`= '$shid_mark_obs',`per_of_contribution`= '$per_of_contribution', `chargesheet_filed`= '$chargesheet_filed' ,`chargesheet_filed`= '$chargesheet_filed', `chargesheetcoll`= '$chargesheetcoll', `sumchrge`= '$sumchrge' WHERE `user_id`= '$insu_user_id_fir' ";
$lssql=mysql_query($ssql);






//$log = mysql_query("SELECT * FROM `fir_details` where `user_id`= '$insu_user_id_fir'"); 

$log = mysql_query("select * ,ct.city_name,st.state from fir_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$insu_user_id_fir'"); 
	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>
