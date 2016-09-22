<?php

header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');

$waiting_sh = array();
/*$coordinator_final_comment_array = array();*/
$supervisor_final_command_array = array();
$bankguarantee_verification_array=array();
$assests_verification_array=array();
$address_verification_array=array();
$collectionArray =array();
$sh_waiting_count=array();
$reference_verification_array=array();

$distributor_verification_array=array();
$distributor_details_array=array();

$web_verification_array = array();
$supplier_details_array =array();
$warehouse_verification_array=array();
$verification_master_array=array();

$driving_details_array=array();
$credential_verification_array=array();
$bankruptcy_verification_array=array();
$identity_verification_array=array();
$professional_details_array=array();

$region = $_REQUEST['region'];
$regionsection = $_REQUEST['regionsection'];
$state = $_REQUEST['state'];


 $user_rejectt=mysql_query("select count(*) as waiting_count_sh, ia.ref_no,vm.Doc,ia.verified_on,vm.First_Name,vm.Last_Name,ia.sstatus, ia.task_name,ia.verification_user_id,ia.qualification_name,ia.name,ia.state,ia.verification_user_id,ia.type,ia.sstatus,ia.verification_for,vm.coordinator_status from insert_assigned_users as ia inner join verification_master as vm on vm.Verification_Master_Id=ia.verification_user_id where ia.state='$state' and ia.sstatus='Verified' order by verified_on Desc");
	
	 while($r29 = mysql_fetch_array($user_rejectt)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($sh_waiting_count,$r29);

	 }


$lverification = mysql_query("select ia.ref_no,vm.Doc,ia.verified_on,vm.First_Name,vm.Last_Name,ia.sstatus, ia.task_name,ia.verification_user_id,ia.qualification_name,ia.name,ia.state,ia.verification_user_id,ia.type,ia.sstatus,ia.verification_for,vm.coordinator_status from insert_assigned_users as ia inner join verification_master as vm on vm.Verification_Master_Id=ia.verification_user_id where ia.state='$state' and ia.sstatus='Verified' order by verified_on Desc"); 
if(mysql_num_rows($lverification)== 0){
 	$waiting_sh['supervisor_final_command'][] =  0;
	}
	else{
	 while($r6 = mysql_fetch_array($lverification)) {
	array_push($waiting_sh,$r6);
}
}


$final_command = mysql_query("Select *  from supervisor_final_command "); 
if(mysql_num_rows($final_command)== 0){
 	$supervisor_final_command_array['supervisor_final_command'][] =  0;
	}
	else{
	 while($r7 = mysql_fetch_array($final_command)) {
	array_push($supervisor_final_command_array,$r7);
}
}


$assests_verification = mysql_query("select * ,ct.city_name,st.state from asset_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($assests_verification)== 0){
 	$assests_verification_array['assests_verification'][] =  0;
	}
	else{
	
	 while($r31 = mysql_fetch_array($assests_verification)) {


	array_push($assests_verification_array,$r31);


}
}

$bankguarantee_verification = mysql_query("select * ,ct.city_name,st.state from bankguarantee_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($bankguarantee_verification)== 0){
 	$bankguarantee_verification_array['bankguarantee_verification'][] =  0;
	}
	else{
	
	 while($r32 = mysql_fetch_array($bankguarantee_verification)) {


	array_push($bankguarantee_verification_array,$r32);


}
}






$address_verification = mysql_query("select * ,ct.city_name,st.state from address_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($address_verification)== 0){
 	$address_verification_array['address_verification'][] =  0;
	}
	else{
	
	 while($r322 = mysql_fetch_array($address_verification)) {


	array_push($address_verification_array,$r322);


}
}

$reference_verification = mysql_query("select * ,ct.city_name,st.state from reference_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($reference_verification)== 0){
 	$reference_verification_array['reference_verification'][] =  0;
	}
	else{
	
	 while($r3212 = mysql_fetch_array($reference_verification)) {


	array_push($reference_verification_array,$r3212);


}
}

$distributor_verification = mysql_query("select * from distributor_verification"); 
if(mysql_num_rows($distributor_verification)== 0){
 	$distributor_verification_array['distributor_verification'][] =  0;
	}
	else{
	
	 while($r3232 = mysql_fetch_array($distributor_verification)) {


	array_push($distributor_verification_array,$r3232);


}
}

$distributor_details = mysql_query("select * ,ct.city_name,st.state from distributor_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($distributor_details)== 0){
 	$distributor_details_array['distributor_details'][] =  0;
	}
	else{
	
	 while($r3332 = mysql_fetch_array($distributor_details)) {


	array_push($distributor_details_array,$r3332);


}
}
	
	$web_verification = mysql_query("select * ,ct.city_name,st.state from web_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($web_verification)== 0){
 	$web_verification_array['web_verification'][] =  0;
	}
	else{
	
	 while($r302 = mysql_fetch_array($web_verification)) {


	array_push($web_verification_array,$r302);


}
}

$supplier_details = mysql_query("select * ,ct.city_name,st.state from supplier_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($supplier_details)== 0){
 	$supplier_details_array['supplier_details'][] =  0;
	}
	else{
	
	 while($r132 = mysql_fetch_array($supplier_details)) {
	array_push($supplier_details_array,$r132);
}
}

$warehouse_verification = mysql_query("select * ,ct.city_name,st.state from warehouse_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($warehouse_verification)== 0){
 	$warehouse_verification_array['warehouse_verification'][] =  0;
	}
	else{
	
	 while($r3293 = mysql_fetch_array($warehouse_verification)) {
	array_push($warehouse_verification_array,$r3293);
}
}

$verification_master = mysql_query("select * from verification_master "); 
if(mysql_num_rows($verification_master)== 0){
 	$verification_master_array['verification_master'][] =  0;
	}
	else{
	
	 while($r123 = mysql_fetch_array($verification_master)) {

	array_push($verification_master_array,$r123);

}
}



$driving_details = mysql_query("select * ,ct.city_name,st.state from driving_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($driving_details)== 0){
 	$driving_details_array['driving_details'][] =  0;
	}
	else{
	
	 while($r12343 = mysql_fetch_array($driving_details)) {


	array_push($driving_details_array,$r12343);


}
}

$credential_verification = mysql_query("select * ,ct.city_name,st.state from credential_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($credential_verification)== 0){
 	$credential_verification_array['credential_verification'][] =  0;
	}
	else{
	
	 while($r1043 = mysql_fetch_array($credential_verification)) {


	array_push($credential_verification_array,$r1043);


}
}

$identity_verification = mysql_query("select * ,ct.city_name,st.state from identity_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($identity_verification)== 0){
 	$identity_verification_array['identity_verification'][] =  0;
	}
	else{
	
	 while($r1943 = mysql_fetch_array($identity_verification)) {


	array_push($identity_verification_array,$r1943);


}
}

$bankruptcy_verification = mysql_query("select * ,ct.city_name,st.state from bankruptcy_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($bankruptcy_verification)== 0){
 	$bankruptcy_verification_array['bankruptcy_verification'][] =  0;
	}
	else{
	
	 while($r1143 = mysql_fetch_array($bankruptcy_verification)) {


	array_push($bankruptcy_verification_array,$r1143);


}
}

$professional_details = mysql_query("select * ,ct.city_name,st.state from professional_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($professional_details)== 0){
 	$professional_details_array['professional_details'][] =  0;
	}
	else{
	
	 while($r11423 = mysql_fetch_array($professional_details)) {


	array_push($professional_details_array,$r11423);


}
}


array_push($collectionArray,$sh_waiting_count);
array_push($collectionArray,$waiting_sh);
array_push($collectionArray,$supervisor_final_command_array);
array_push($collectionArray,$assests_verification_array);
array_push($collectionArray,$bankguarantee_verification_array);
array_push($collectionArray,$address_verification_array);
array_push($collectionArray,$reference_verification_array);
array_push($collectionArray,$distributor_verification_array);
array_push($collectionArray,$distributor_details_array);

array_push($collectionArray,$web_verification_array);
array_push($collectionArray,$supplier_details_array);
array_push($collectionArray,$warehouse_verification_array);
array_push($collectionArray,$verification_master_array);

array_push($collectionArray,$driving_details_array);
array_push($collectionArray,$credential_verification_array);
array_push($collectionArray,$identity_verification_array);
array_push($collectionArray,$bankruptcy_verification_array);
array_push($collectionArray,$professional_details_array);

print json_encode($collectionArray, JSON_NUMERIC_CHECK);
	








?>
