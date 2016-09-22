
<?php
header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

include('dbConnect.inc.php');

$username = mysql_real_escape_string( $_REQUEST['username']); // Getting parameter with username
$password = mysql_real_escape_string( $_REQUEST['password']); // Getting parameter with password


/*$username = 'sudeep';
$password ='123a';*/


$collectionArray = array();
$co_alldata = array();

$reg=mysql_query("select Username,password,region,User_Id,E_Mail,state from user where username='$username' and password='$password' and User_Role_Id='4' group by region;");



$regionArray = array();
$usernamearray = array();
/*$supervisor_new_array = array();*/
/*$new_verification_count_array = array();*/
$supervisor_inprogress_array = array();
$supervisor_inprogress_count_array = array();
$supervisor_verified_array = array();
$supervisor_verified_count_array = array();
$supervisor_not_verified_array = array();
$supervisor_not_verified_count_array = array();
$supervisor_completed_array = array();
$supervisor_completed_count_array = array();
$multiple_documents_array = array();
$addressid_records_array = array();
$educational_records_array = array();
$employment_records_array = array();
$supervisor_activity_log_array = array();
$gcm_reg_id_array = array();
/*$activity_log_supervisor_details_array = array();*/
$image_log_array = array();
$bankguarantee_verification_array=array();
$assests_verification_array=array();
$address_verification_array=array();
$reference_verification_array=array();

$distributor_verification_array=array();
$distributor_details_array=array();

$web_verification_array = array();
$supplier_details_array =array();
$warehouse_verification_array=array();
$verification_master_array=array();
$emp_verification_cumulative_array=array();

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

$educational_records_array=array();

$coordinator_final_comment_array=array();
$sh_eeem_array=array();

$multiple_documents_array=array();

/*$tet_array=array();*/
$supervisor_final_command_array=array();
$personal_details_array=array();

 while($r1 = mysql_fetch_array($reg)){

$region = $r1['region'];
$username = $r1['Username'];
$user_id = $r1['User_Id'];
$E_Mail = $r1['E_Mail'];
$state = $r1['state'];

	$regionArray['region'][] = $region;
	$regionArray['username'][] = $username;
	$regionArray['user_id'][] = $user_id;
	$regionArray['E_Mail'][] = $E_Mail;
	$regionArray['state'][] = $state;

/*                    $lverification="(select vm.First_Name,vm.Last_Name, tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id  inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc)

union (select vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id  inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc) 

union (select vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc)
" ;
                    
                    $supervisor_view=mysql_query($lverification);


	
	 while($r2 = mysql_fetch_array($supervisor_view)) {

	array_push($supervisor_new_array,$r2);

}*/



/*$new_verification_count = mysql_query("select count(*) as new_verification_count,ia.name, ct.city_name, ia.verification_for, ia.qualification_name, us.First_Name, ia.assigned_on, ia.status, ia.verification_user_id,ia.type as qualification_id, ia.location from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to  where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc"); 
if(mysql_num_rows($new_verification_count)== 0){
 	$new_verification_count_array['data new veri'][] =  0;
	}
	else{
	 while($r3 = mysql_fetch_array($new_verification_count)) {

	array_push($new_verification_count_array,$r3);

}
}*/

 $lverification_inpro="(select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id')Order by assigned_on Desc" ;
                    
      $lverification_inpro=mysql_query($lverification_inpro);


	
	
	 while($r4 = mysql_fetch_array($lverification_inpro)) {

	array_push($supervisor_inprogress_array,$r4);

}



$supervisor_inprogress_count = mysql_query("select count(*) as inprogress_count from ((select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id') union (select ia.type,vm.Ref_no,ia.sstatus,ia.subco_status,vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,ia.coordinator_id,ia.accept_on from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Inprogress' and ia.state='$state' and ia.assigned_to='$user_id')Order by assigned_on Desc) as dfg"); 
if(mysql_num_rows($supervisor_inprogress_count)== 0){
 	$supervisor_inprogress_count['data new veri'][] =  0;
	}
	else{
	 while($r5 = mysql_fetch_array($supervisor_inprogress_count)) {

	array_push($supervisor_inprogress_count_array,$r5);

}
}

$lverification_veri="(select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc" ;
                    
      $lverification_veri=mysql_query($lverification_veri);


	
	 while($r6 = mysql_fetch_array($lverification_veri)) {

	array_push($supervisor_verified_array,$r6);

}



$supervisor_verified_count = mysql_query("select count(*) as super_verified_count from ((select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.name,ia.verification_user_id,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Verified'and ia.assigned_to='$user_id')order by verified_on Desc) as dfg"); 
if(mysql_num_rows($supervisor_verified_count)== 0){
 	$supervisor_verified_count['data new veri'][] =  0;
	}
	else{
	 while($r7 = mysql_fetch_array($supervisor_verified_count)) {

	array_push($supervisor_verified_count_array,$r7);

}
}

$lverification_not_veri="(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,vm.Ref_no,ia.notverified_on,ia.assigned_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') order by notverified_on Desc";
                    
      $lverification_not_veri=mysql_query($lverification_not_veri);


	
	 while($r8 = mysql_fetch_array($lverification_not_veri)) {

	array_push($supervisor_not_verified_array,$r8);

}


$supervisor_not_verified_count = mysql_query("select count(*) as supervisor_not_verified_count_array from((select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,tn.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') union(select vm.Doc,ia.ref_no,ia.notverified_on,vm.First_Name,vm.Last_Name,te.task_name as taskname, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.verification_user_id,ia.type from insert_assigned_users as ia Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.sstatus = 'Notverified' and ia.state='$state' and ia.assigned_to='$user_id') order by notverified_on Desc) as dfgew"); 
if(mysql_num_rows($supervisor_not_verified_count)== 0){
 	$supervisor_not_verified_count_array['data new veri'][] =  0;
	}
	else{
	 while($r9 = mysql_fetch_array($supervisor_not_verified_count)) {

	array_push($supervisor_not_verified_count_array,$r9);

}
}

$lverification_completed="(select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id')order by approved_on DESC";
                    
      $lverification_completed=mysql_query($lverification_completed);


	
	 while($r10 = mysql_fetch_array($lverification_completed)) {

	array_push($supervisor_completed_array,$r10);

}



$supervisor_completed_count = mysql_query("select count(*) as completed_count from ((select vm.Ref_no,vm.First_Name,vm.Last_Name,tn.task_name as taskname,ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,tk.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join property_type pt on ia.type=pt.pro_id inner join taskname te on te.task_name_id=pt.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join acc_mode am on ia.type=am.acc_id inner join taskname te on te.task_name_id=am.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id') union (select vm.Ref_no,vm.First_Name,vm.Last_Name,te.task_name as taskname, ct.city_name,ia.type,ia.verification_for,ia.qualification_name,ia.assigned_on,ia.verified_on,ia.verification_user_id,ia.approved_on from insert_assigned_users as ia inner join cities as ct on ct.city_id=ia.location inner join user as us on us.User_Id=ia.assigned_to Inner join address_group ag on ia.type=ag.add_grp_id inner join taskname te on te.task_name_id=ag.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id where ia.state='$state' and sstatus='Approved' and ia.assigned_to='$user_id')order by approved_on DESC) as hgj"); 
if(mysql_num_rows($supervisor_completed_count)== 0){
 	$supervisor_completed_count_array['data new veri'][] =  0;
	}
	else{
	 while($r11 = mysql_fetch_array($supervisor_completed_count)) {

	array_push($supervisor_completed_count_array,$r11);

}
}






	$addressid_records =mysql_query("select * from addressid_records where city='$region' ");

	 while($r13 = mysql_fetch_array($addressid_records)) {

	array_push($addressid_records_array,$r13);

}
	

$employment_records =mysql_query("select * from emp_verification_cumulative where employer_city_id='$region'");
	
	 while($r15 = mysql_fetch_array($employment_records)) {

	array_push($employment_records_array,$r15);

}

$supervisor_activity_log =mysql_query("SELECT activity_log_id,ref_no,verification_id,type,activity_log,document,supervisor_id,log_date,status,ct.First_Name FROM supervisor_activity_log wv Inner join user ct on wv.supervisor_id=ct.User_Id");
	
	 while($r16 = mysql_fetch_array($supervisor_activity_log)) {

	array_push($supervisor_activity_log_array,$r16);

}

$gcm_reg_id =mysql_query("select * from user");
	
	 while($r177 = mysql_fetch_array($gcm_reg_id)) {

	array_push($gcm_reg_id_array,$r177);

}

/*$activity_log_details = mysql_query("select * from supervisor_activity_log"); 
if(mysql_num_rows($activity_log_details)== 0){
 	$activity_log_supervisor_details_array['activity_log_details'][] =  0;
	}
	else{
	
	 while($r3123 = mysql_fetch_array($activity_log_details)) {


	array_push($activity_log_supervisor_details_array,$r3123);


}
}*/

$multiple_super = mysql_query("select * from mutiple_supervisor"); 
if(mysql_num_rows($multiple_super)== 0){
 	$image_log_array['multiple_super'][] =  0;
	}
	else{
	
	 while($r51243 = mysql_fetch_array($multiple_super)) {


	array_push($image_log_array,$r51243);


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
	
	 while($r646782 = mysql_fetch_array($edusalary_office)) {


	array_push($edusalary_office_array,$r646782);


}
}

$criminal_verification = mysql_query("select * from criminal_verification "); 
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
	
	 while($r646783 = mysql_fetch_array($edusalary_education)) {


	array_push($edusalary_education_array,$r646783);


}
}

$integrity_lifestyle_permanent = mysql_query("select * ,ct.city_name,st.state from integrity_lifestyle_permanent wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($integrity_lifestyle_permanent)== 0){
 	$integrity_lifestyle_permanent_array['integrity_lifestyle_permanent'][] =  0;
	}
	else{
	
	 while($r646784 = mysql_fetch_array($integrity_lifestyle_permanent)) {


	array_push($integrity_lifestyle_permanent_array,$r646784);


}
}

$servant_education = mysql_query("select * ,ct.city_name,st.state from servant_education wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state"); 
if(mysql_num_rows($servant_education)== 0){
 	$servant_education_array['servant_education'][] =  0;
	}
	else{
	
	 while($r646785 = mysql_fetch_array($servant_education)) {


	array_push($servant_education_array,$r646785);


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

$coordinator_final_comment = mysql_query("select *  from coordinator_final_comment"); 
if(mysql_num_rows($coordinator_final_comment)== 0){
 	$coordinator_final_comment_array['coordinator_final_comment'][] =  0;
	}
	else{
	
	 while($r64678123 = mysql_fetch_array($coordinator_final_comment)) {


	array_push($coordinator_final_comment_array,$r64678123);


}
}

$sh_eeem = mysql_query("select * from user where state='$state' and User_Role_Id='10'"); 
if(mysql_num_rows($sh_eeem)== 0){
 	$sh_eeem_array['sh_eeem'][] =  0;
	}
	else{
	
	 while($r646738 = mysql_fetch_array($sh_eeem)) {


	array_push($sh_eeem_array,$r646738);


}
}

$mult=mysql_query("select * from multiple_documents");
	
	 

	 while($r1112 = mysql_fetch_array($mult)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($multiple_documents_array,$r1112);

	 }

/*$tet=mysql_query("select * from tet");
	
	 

	 while($r1112 = mysql_fetch_array($tet)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($tet_array,$r1112);

	 }*/



$multa=mysql_query("select * from supervisor_final_command");
	
	 

	 while($r11122 = mysql_fetch_array($multa)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($supervisor_final_command_array,$r11122);

	 }


$personal_details = mysql_query("SELECT * FROM `personal_details`"); 
if(mysql_num_rows($personal_details)== 0){
 	$personal_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72 = mysql_fetch_array($personal_details)) {
	array_push($personal_details_array,$r72);
}
}
}

array_push($collectionArray,$regionArray); //0
/*array_push($collectionArray,$supervisor_new_array);*/ //1
/*array_push($collectionArray,$new_verification_count_array);*/ //2
array_push($collectionArray,$supervisor_inprogress_array); //3            //1
array_push($collectionArray,$supervisor_inprogress_count_array); //4        //2
array_push($collectionArray,$supervisor_verified_array); //5                 //3 

array_push($collectionArray,$supervisor_verified_count_array); //6  //4
array_push($collectionArray,$supervisor_not_verified_array); //7      //5
array_push($collectionArray,$supervisor_not_verified_count_array); //8  //6
array_push($collectionArray,$supervisor_completed_array); //9       //7
array_push($collectionArray,$supervisor_completed_count_array); //10    //8
array_push($collectionArray,$multiple_documents_array); //11     //9

array_push($collectionArray,$addressid_records_array); //12       //10
array_push($collectionArray,$educational_records_array); //13       //11
array_push($collectionArray,$employment_records_array);  //14        //12


/*array_push($collectionArray,$activity_log_supervisor_details_array);*/ //16

array_push($collectionArray,$image_log_array); //17       //13
array_push($collectionArray,$assests_verification_array); //18     //14
array_push($collectionArray,$bankguarantee_verification_array); //19      //15
array_push($collectionArray,$address_verification_array); //20     //16
array_push($collectionArray,$reference_verification_array); //21   //17

array_push($collectionArray,$distributor_verification_array);//22   //18
array_push($collectionArray,$distributor_details_array);//23     //19
array_push($collectionArray,$web_verification_array); //24    //20
array_push($collectionArray,$supplier_details_array); //25     //21
array_push($collectionArray,$warehouse_verification_array); //26    //22

array_push($collectionArray,$verification_master_array); //27     //23
array_push($collectionArray,$emp_verification_cumulative_array); //28    //24
array_push($collectionArray,$driving_details_array); //29     //25
array_push($collectionArray,$credential_verification_array); //30      //26
array_push($collectionArray,$identity_verification_array); //31    //27
array_push($collectionArray,$bankruptcy_verification_array); //32    //28


array_push($collectionArray,$employmentgap_verification_array); //33      //29
array_push($collectionArray,$delinquent_verification_array); //34    //30
array_push($collectionArray,$servant_verification_array);//35     //31
array_push($collectionArray,$integrity_lifestyle_verification_array); //36  //32
array_push($collectionArray,$edusalary_office_array);//37     //33


array_push($collectionArray,$edusalary_education_array);//38    //34
array_push($collectionArray,$integrity_lifestyle_permanent_array);//39     //35
array_push($collectionArray,$servant_education_array);//40      //36



array_push($collectionArray,$sh_eeem_array);//41     //37

array_push($collectionArray,$criminal_verification_array); //44 //38
array_push($collectionArray,$professional_details_array);//45    //39

array_push($collectionArray,$personal_details_array);//46      //40




array_push($collectionArray,$gcm_reg_id_array);//47        //41


array_push($collectionArray,$supervisor_activity_log_array); //15    // db error  //42
array_push($collectionArray,$supervisor_final_command_array); //42                  //43
array_push($collectionArray,$coordinator_final_comment_array); //43          //44



print json_encode($collectionArray, JSON_NUMERIC_CHECK);

//print json_encode($co_alldata, JSON_NUMERIC_CHECK);



/*mysql_close($con);
*/
?>