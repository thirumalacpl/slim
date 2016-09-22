<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$accident_details_a_user_id = $_REQUEST['accident_details_a_user_id'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$accident_date = $_REQUEST['accident_date']; //1
	$vehicle_speed = $_REQUEST['vehicle_speed'];//2
	$odometer_reading = $_REQUEST['odometer_reading'];//3
	$place_of_accident = $_REQUEST['place_of_accident'];//4
	$purpose_of_travel = $_REQUEST['purpose_of_travel'];//5
	$nature_of_goods = $_REQUEST['nature_of_goods'];//6
	$numof_people = $_REQUEST['numof_people'];//7
	$third_party_name = $_REQUEST['third_party_name'];//8
	$vicinity_attribute = $_REQUEST['vicinity_attribute'];//9
	$type_of_accident = $_REQUEST['type_of_accident'];//10
	$nature_of_road = $_REQUEST['nature_of_road'];//11
	$road_type = $_REQUEST['road_type'];//12
	$name_of_investigating_officer = $_REQUEST['name_of_investigating_officer'];//13
	$iv_co_relation = $_REQUEST['iv_co_relation'];//14
	$tp_co_relation = $_REQUEST['tp_co_relation'];//15
	$vehicle_on_spot = $_REQUEST['vehicle_on_spot'];//16

/*

	$vehicle_reg_no = $_REQUEST['vehicle_reg_no'];//17
	$vehicle_reg_date = $_REQUEST['vehicle_reg_date'];//18
	$vehicle_purchase_date = $_REQUEST['vehicle_purchase_date'];//19
	$vehicle_type_of_vehicle = $_REQUEST['vehicle_type_of_vehicle'];//20
	$vehicle_purpose_of_vehicle = $_REQUEST['vehicle_purpose_of_vehicle'];//21
	$vehicle_model = $_REQUEST['vehicle_model'];//22
	$vehicle_color = $_REQUEST['vehicle_color'];//23
	$vehicle_type_of_fuel = $_REQUEST['vehicle_type_of_fuel'];//24
	$vehicle_laden_weight = $_REQUEST['vehicle_laden_weight'];//25
	$vehicle_unladen_weight = $_REQUEST['vehicle_unladen_weight'];//26
	$vehicle_engine_no = $_REQUEST['vehicle_engine_no']; //27
	$vehicle_chassis_no = $_REQUEST['vehicle_chassis_no'];//28
	$vehicle_date_of_transfer = $_REQUEST['vehicle_date_of_transfer'];//29
	$vehicle_fc_details = $_REQUEST['vehicle_fc_details'];//30
	$vehicle_hypothecation = $_REQUEST['vehicle_hypothecation'];//31
	$vehicle_permit_details = $_REQUEST['vehicle_permit_details'];//32
	$vehicle_type_of_permit = $_REQUEST['vehicle_type_of_permit'];//33
	$vehicle_permit_num = $_REQUEST['vehicle_permit_num'];//34
	$vehicle_date_of_permit_expiry = $_REQUEST['vehicle_date_of_permit_expiry'];//35
	$vehicle_date_of_permit_issue = $_REQUEST['vehicle_date_of_permit_issue'];//36
	$vehicle_details_of_opp_vehicle = $_REQUEST['vehicle_details_of_opp_vehicle'];//37
	$vehicle_owner_of_opp_vehicle = $_REQUEST['vehicle_owner_of_opp_vehicle'];//38

$vehicle_km_run = $_REQUEST['vehicle_km_run'];//39*/
	$soc_rough_sketch = $_REQUEST['soc_rough_sketch'];//40
	$soc_critical_obs = $_REQUEST['soc_critical_obs'];//41
	$soc_latlng = $_REQUEST['soc_latlng'];//42
	$soc_relevant_info = $_REQUEST['soc_relevant_info'];//43


$ssql = "UPDATE `accident_details` SET `accident_date`= '$accident_date' , `vehicle_speed`= '$vehicle_speed', `odometer_reading`= '$odometer_reading', `place_of_accident`= '$place_of_accident' , `purpose_of_travel`= '$purpose_of_travel', `nature_of_goods`= '$nature_of_goods', `numof_people`= '$numof_people', `third_party_name`= '$third_party_name' , `vicinity_attribute`= '$vicinity_attribute' , `type_of_accident`= '$type_of_accident' , `nature_of_road`= '$nature_of_road', `road_type`= '$road_type', `name_of_investigating_officer`= '$name_of_investigating_officer' , `iv_co_relation`= '$iv_co_relation', `tp_co_relation`= '$tp_co_relation' ,`vehicle_on_spot`= '$vehicle_on_spot', `rough_sketch`= '$soc_rough_sketch' , `critical_obs`= '$soc_critical_obs', `latlng`= '$soc_latlng' ,`relevant_info`= '$soc_relevant_info' where `user_id`= '$accident_details_a_user_id'";

$lssql=mysql_query($ssql);





$log = mysql_query("SELECT * FROM `accident_details` where `user_id`= '$accident_details_a_user_id'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>
