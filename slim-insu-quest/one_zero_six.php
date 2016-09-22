<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();

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

$supervisor_inprogress_count_array=array();
$supervisor_verified_count_array =array();
$supervisor_not_verified_count_array = array();
$supervisor_completed_count_array = array();
$supervisor_inprogress_array=array();
$supervisor_verified_array =array();
$supervisor_completed_array = array();
$supervisor_not_verified_array = array();

$region = mysql_real_escape_string($_REQUEST['region']);
$user_id = mysql_real_escape_string($_REQUEST['user_id']);
$state = mysql_real_escape_string($_REQUEST['state']);


		$ver_master = mysql_real_escape_string($_REQUEST['verification_user_id']);
		$qualification_id =mysql_real_escape_string( $_REQUEST['qualification_id']);
		$user_id =mysql_real_escape_string( $_REQUEST['user_id']);
		$state =mysql_real_escape_string( $_REQUEST['state']);
		$status =mysql_real_escape_string( $_REQUEST['status']);
		$insu_final_one_zero_six =mysql_real_escape_string( $_REQUEST['insu_final_one_zero_six']);
		$insu_final_one_zero_one =mysql_real_escape_string( $_REQUEST['insu_final_one_zero_one']);

//question start
		$user_id_su = mysql_real_escape_string($_REQUEST['user_id_su']);
		
$insuria = mysql_real_escape_string($_REQUEST['insuria']);
$insurib = mysql_real_escape_string($_REQUEST['insurib']);
$insuric = mysql_real_escape_string($_REQUEST['insuric']);
$insurid = mysql_real_escape_string($_REQUEST['insurid']);
$insurie = mysql_real_escape_string($_REQUEST['insurie']);
$insurif = mysql_real_escape_string($_REQUEST['insurif']);

//question end

if($qualification_id == '101'){
$travel_expen_insu =mysql_real_escape_string( $_REQUEST['travel_expen_insu']);
$actua_exp_insu =mysql_real_escape_string( $_REQUEST['actua_exp_insu']);
$misc_e_insu =mysql_real_escape_string( $_REQUEST['misc_e_insu']);
}

//insured
if($qualification_id == '101'){
$accexp ="INSERT into expense (`travel`,`actual`,`mis`,`sta`,`user_id`,`type`,`cmp`) values ('$travel_expen_insu','$actua_exp_insu','$misc_e_insu','insu','$ver_master','$qualification_id','')";
$accexpquery=mysql_query($accexp);
}

if($insu_final_one_zero_six != ''){

$rrsqlqaqrt = "INSERT INTO `supervisor_final_command`(`final_Command`,`supervisor_id`,`type`,`verification_id`,`command_date`,`state`)values('$insu_final_one_zero_six','$user_id','$qualification_id','$ver_master','now()','$state')";
$rlsqlqaqrt = mysql_query($rrsqlqaqrt);

$sqlqw= "UPDATE insert_assigned_users SET  sstatus='Verified',verified_on = now() where verification_user_id='$ver_master' and type='$qualification_id' and sstatus!='rework' ";
$lsqlqwq=mysql_query($sqlqw);
	
}

if($insu_final_one_zero_one != ''){

$rrsqlqaqrtOO = "INSERT INTO `supervisor_final_command`(`final_Command`,`supervisor_id`,`type`,`verification_id`,`command_date`,`state`)values('$insu_final_one_zero_one','$user_id','$qualification_id','$ver_master','now()','$state')";
$rlsqlqaqrtO = mysql_query($rrsqlqaqrtOO);

$sqlyu= "UPDATE insert_assigned_users SET  sstatus='Verified',verified_on = now() where verification_user_id='$ver_master' and type='$qualification_id' and sstatus!='rework' ";
$lsqliy=mysql_query($sqlyu);
	
}

//question update insert
//insurance
if($insuria != '' && $insurib != '' && $insuric != '' && $insurid != '' && $insurie != '' && $insurif != '') {
$rrsqlqgtetg = "INSERT INTO `tvo_isured_ques`(`pho_insu`,`insu_stmt`,`pho_resi_insu`,`rc_cpy`,`cv_cpy`,`pol_cpy`,`user_id`,`type`,`sup_id`)values('$insuria','$insurib','$insuric','$insurid','$insurie','$insurif','$ver_master','$qualification_id','$user_id_su')";
$rlsqlqgte = mysql_query($rrsqlqgtetg);	
}


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

//eeeeeeee

$supervisor_inprogress_count = mysql_query("select count(*) as inprogress_count from ((select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id')Order by assigned_on Desc) as dfg"); 
if(mysql_num_rows($supervisor_inprogress_count)== 0){
 	$supervisor_inprogress_count['data new veri'][] =  0;
	}
	else{
	 while($r500 = mysql_fetch_array($supervisor_inprogress_count)) {

	array_push($supervisor_inprogress_count_array,$r500);

}
}

$supervisor_verified_count = mysql_query("select count(*) as super_verified_count from ((select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc) as dfg"); 
if(mysql_num_rows($supervisor_verified_count)== 0){
 	$supervisor_verified_count['data new veri'][] =  0;
	}
	else{
	 while($r5001 = mysql_fetch_array($supervisor_verified_count)) {

	array_push($supervisor_verified_count_array,$r5001);

}
}

$supervisor_not_verified_count = mysql_query("select count(*) as supervisor_not_verified_count_array from((select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') order by notverified_on Desc) as dfgew"); 
if(mysql_num_rows($supervisor_not_verified_count)== 0){
 	$supervisor_not_verified_count_array['data new veri'][] =  0;
	}
	else{
	 while($r9111 = mysql_fetch_array($supervisor_not_verified_count)) {

	array_push($supervisor_not_verified_count_array,$r9111);

}
}

$supervisor_verified_count = mysql_query("select count(*) as completed_count from ((select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id')order by approved_on DESC) as hgj"); 
if(mysql_num_rows($supervisor_verified_count)== 0){
 	$supervisor_verified_count['data new veri'][] =  0;
	}
	else{
	 while($r50101 = mysql_fetch_array($supervisor_verified_count)) {

	array_push($supervisor_completed_count_array,$r50101);

}
}

 $lverification_inpro="(select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id')Order by assigned_on Desc" ;
                    
  $lverification_inpro=mysql_query($lverification_inpro);


	
	while($r4 = mysql_fetch_array($lverification_inpro)) {

	array_push($supervisor_inprogress_array,$r4);

 }

$lverification_veri="(select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc" ;
                    
      $lverification_veri=mysql_query($lverification_veri);

	
	 while($r6 = mysql_fetch_array($lverification_veri)) {

	array_push($supervisor_verified_array,$r6);

}

$lverification_completed="(select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id')order by approved_on DESC";
                    
      $lverification_completed=mysql_query($lverification_completed);

	
	 while($r10 = mysql_fetch_array($lverification_completed)) {

	array_push($supervisor_completed_array,$r10);
}

$lverification_not_veri="(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') order by notverified_on Desc";
                    
      $lverification_not_veri=mysql_query($lverification_not_veri);


	
	 while($r8 = mysql_fetch_array($lverification_not_veri)) {

	array_push($supervisor_not_verified_array,$r8);

}


array_push($collectionArray,$claimant_details_array); //15    // db error  //1
array_push($collectionArray,$details_injured_array); //42                  //2
array_push($collectionArray,$details_deceased_array); //43          //3
array_push($collectionArray,$driver_details_d_array); //15    // db error  //4
array_push($collectionArray,$driver_details_o_array); //42                  //5
array_push($collectionArray,$fir_details_array); //43          				//6
array_push($collectionArray,$accident_details_array); //43          //7
array_push($collectionArray,$vehicle_details_array); //43          //8
array_push($collectionArray,$insured_per_details_array); //43          //9
array_push($collectionArray,$verification_master_arra); //43          //10
array_push($collectionArray,$policy_details_array); //43          //11

array_push($collectionArray,$supervisor_inprogress_count_array);     //12
array_push($collectionArray,$supervisor_verified_count_array);		//13
array_push($collectionArray,$supervisor_completed_count_array);		//14
array_push($collectionArray,$supervisor_not_verified_count_array);	//15

array_push($collectionArray,$supervisor_inprogress_array);//16
array_push($collectionArray,$supervisor_verified_array);//17
array_push($collectionArray,$supervisor_completed_array);//18
array_push($collectionArray,$supervisor_not_verified_array);//19

print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>
