<?php
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');

$supervisor_verified_array = array();
$supervisor_final_command_array = array();
$bankguarantee_verification_array=array();
$assests_verification_array=array();
$address_verification_array=array();
$reference_verification_array=array();
$distributor_verification_array=array();
$distributor_details_array=array();
$collectionArray =array();


$web_verification_array = array();
$supplier_details_array =array();
$warehouse_verification_array=array();
$verification_master_array=array();
$supervisor_verified_count_array=array();

$driving_details_array=array();
$credential_verification_array=array();
$bankruptcy_verification_array=array();
$identity_verification_array=array();
$professional_details_array=array();

$employmentgap_verification_array=array();
$delinquent_verification_array=array();
$servant_verification_array=array();
$integrity_lifestyle_verification_array=array();
$edusalary_office_array=array();
$criminal_verification_array=array();
$edusalary_education_array=array();
$integrity_lifestyle_permanent_array=array();
$servant_education_array=array();
$emp_verification_cumulative_array=array();

$educational_records_array=array();
$multiple_documents_array=array();
	$region =mysql_real_escape_string( $_REQUEST['region']);
	$user_id = mysql_real_escape_string($_REQUEST['user_id']);
	$state = mysql_real_escape_string($_REQUEST['state']);

$supervisor_verified_count = mysql_query("select count(*) as super_verified_count from ((select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc) as dfg"); 
if(mysql_num_rows($supervisor_verified_count)== 0){
 	$supervisor_verified_count['data new veri'][] =  0;
	}
	else{
	 while($r500 = mysql_fetch_array($supervisor_verified_count)) {

	array_push($supervisor_verified_count_array,$r500);

}
}


$lverification_veri="(select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc" ;
                    
      $lverification_veri=mysql_query($lverification_veri);

	
	 while($r6 = mysql_fetch_array($lverification_veri)) {

	array_push($supervisor_verified_array,$r6);

}


$final_command = mysql_query("SELECT * FROM `supervisor_final_command`"); 
if(mysql_num_rows($final_command)== 0){
 	$supervisor_final_command_array['data new veri'][] =  0;
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

$verification_master = mysql_query("select * ,ct.city_name,st.state from verification_master wv Inner join cities ct on wv.Current_City=ct.city_id Inner join states st on st.id=wv.Current_State"); 
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

/*16 to 21*/

$employmentgap_verification = mysql_query("select * ,ct.city_name,st.state from employmentgap_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($employmentgap_verification)== 0){
 	$employmentgap_verification_array['employmentgap_verification'][] =  0;
	}
	else{
	
	 while($r6123 = mysql_fetch_array($employmentgap_verification)) {


	array_push($employmentgap_verification_array,$r6123);


}
}

$delinquent_verification = mysql_query("select *, Verification_Master_Id,Ref_no,Verification_For,Last_Name,Current_Address1,Current_Address2,Current_Taluk,Current_City,Current_District,ct.city_name,st.state,delve.bank_name as bank1,delve.account_no as account_no1,delve.branch_name as branch_name1,delve.add_one as add_one1,delve.city_bank1 as citybank1,delve.state_bank1 as statebank1,delve.pincode as pincodebamk1,delve.bank_new as bank2,delve.accnumber as account_no2,delve.branch_new as branch_new2,delve.bank_address as bank_address2,delve.city_new as city_new2,delve.state_new as state_new2,delve.pin_new as pin_new2 from verification_master wv Inner join cities ct on wv.Current_City=ct.city_id Inner join states st on st.id=wv.Current_State Inner join delinquent_verification delve on wv.Verification_Master_Id=delve.user_id"); 
if(mysql_num_rows($delinquent_verification)== 0){
 	$delinquent_verification_array['delinquent_verification'][] =  0;
	}
	else{
	
	 while($r645 = mysql_fetch_array($delinquent_verification)) {


	array_push($delinquent_verification_array,$r645);


}
}

$servant_verification = mysql_query("select * ,ct.city_name,st.state from servant_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($servant_verification)== 0){
 	$servant_verification_array['servant_verification'][] =  0;
	}
	else{
	
	 while($r646 = mysql_fetch_array($servant_verification)) {


	array_push($servant_verification_array,$r646);


}
}

$integrity_lifestyle_verification = mysql_query("select * ,ct.city_name,st.state from integrity_lifestyle_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($integrity_lifestyle_verification)== 0){
 	$integrity_lifestyle_verification_array['integrity_lifestyle_verification'][] =  0;
	}
	else{
	
	 while($r6467 = mysql_fetch_array($integrity_lifestyle_verification)) {


	array_push($integrity_lifestyle_verification_array,$r6467);


}
}

$edusalary_office = mysql_query("select * ,ct.city_name,st.state from edusalary_office wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($edusalary_office)== 0){
 	$edusalary_office_array['edusalary_office'][] =  0;
	}
	else{
	
	 while($r64678 = mysql_fetch_array($edusalary_office)) {


	array_push($edusalary_office_array,$r64678);


}
}

$criminal_verification = mysql_query("select * ,ct.city_name,st.state from criminal_verification wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($criminal_verification)== 0){
 	$criminal_verification_array['criminal_verification'][] =  0;
	}
	else{
	
	 while($r64679 = mysql_fetch_array($criminal_verification)) {


	array_push($criminal_verification_array,$r64679);


}
}

$edusalary_education = mysql_query("select * ,ct.city_name,st.state from edusalary_education wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($edusalary_education)== 0){
 	$edusalary_education_array['edusalary_education'][] =  0;
	}
	else{
	
	 while($r64678 = mysql_fetch_array($edusalary_education)) {


	array_push($edusalary_education_array,$r64678);


}
}

$integrity_lifestyle_permanent = mysql_query("select * ,ct.city_name,st.state from integrity_lifestyle_permanent wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($integrity_lifestyle_permanent)== 0){
 	$integrity_lifestyle_permanent_array['integrity_lifestyle_permanent'][] =  0;
	}
	else{
	
	 while($r64678 = mysql_fetch_array($integrity_lifestyle_permanent)) {


	array_push($integrity_lifestyle_permanent_array,$r64678);


}
}

$servant_education = mysql_query("select * ,ct.city_name,st.state from servant_education wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($servant_education)== 0){
 	$servant_education_array['servant_education'][] =  0;
	}
	else{
	
	 while($r64678 = mysql_fetch_array($servant_education)) {


	array_push($servant_education_array,$r64678);


}
}

$emp_verification_cumulative = mysql_query("select * ,ct.city_name,st.state from emp_verification_cumulative wv Inner join cities ct on wv.employer_city_id=ct.city_id Inner join states st on st.id=wv.employer_state_id"); 
if(mysql_num_rows($emp_verification_cumulative)== 0){
 	$emp_verification_cumulative_array['emp_verification_cumulative'][] =  0;
	}
	else{
	
	 while($r1234 = mysql_fetch_array($emp_verification_cumulative)) {


	array_push($emp_verification_cumulative_array,$r1234);


}
}

$educational_records = mysql_query("select * ,ct.city_name,st.state from educational_records wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($educational_records)== 0){
 	$educational_records_array['educational_records'][] =  0;
	}
	else{
	
	 while($r646781 = mysql_fetch_array($educational_records)) {


	array_push($educational_records_array,$r646781);


}
}

$mult=mysql_query("select * from multiple_documents");
	
	 

	 while($r1112 = mysql_fetch_array($mult)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($multiple_documents_array,$r1112);

	 }

array_push($collectionArray,$supervisor_verified_array);
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
array_push($collectionArray,$supervisor_verified_count_array);

array_push($collectionArray,$driving_details_array);
array_push($collectionArray,$credential_verification_array);
array_push($collectionArray,$identity_verification_array);
array_push($collectionArray,$bankruptcy_verification_array);
array_push($collectionArray,$professional_details_array);

array_push($collectionArray,$employmentgap_verification_array);
array_push($collectionArray,$delinquent_verification_array);
array_push($collectionArray,$servant_verification_array);
array_push($collectionArray,$integrity_lifestyle_verification_array);
array_push($collectionArray,$edusalary_office_array);
array_push($collectionArray,$criminal_verification_array);
array_push($collectionArray,$edusalary_education_array);
array_push($collectionArray,$integrity_lifestyle_permanent_array);
array_push($collectionArray,$servant_education_array);
array_push($collectionArray,$emp_verification_cumulative_array);

array_push($collectionArray,$educational_records_array);
array_push($collectionArray,$multiple_documents_array);
print json_encode($collectionArray, JSON_NUMERIC_CHECK);
	








?>
