<?php
header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

include('dbConnect.inc.php');

$username = mysql_real_escape_string($_REQUEST['userchn']); // Getting parameter with username
$password =mysql_real_escape_string($_REQUEST['chngpassword']); // Getting parameter with password


/*$username = 'sudeep';
$password ='123a';*/

$collectionArray = array();




$reg=mysql_query("select Username,password,region,User_Id from user where username='$username' and password='$password' and User_Role_Id='4' group by region;");

$regionArray = array();
$uusernameArray = array();

 while($r1 = mysql_fetch_array($reg)){

$region = $r1['region'];
$Username = $r1['Username'];
$user_id = $r1['User_Id'];

	$regionArray['region'][] = $region;
	$uusernameArray['Username'][] = $Username;

                    $lverification="(select vm.First_Name,vm.Last_Name, tn.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join address_type at on ia.type=at.id inner join taskname tn on tn.task_name_id=at.task_name_id  inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc)

union (select vm.First_Name,vm.Last_Name,tk.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join qualifications qu on ia.type=qu.qualification_id inner join taskname tk on tk.task_name_id=qu.task_name_id  inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc) 

union (select vm.First_Name,vm.Last_Name, te.task_name as taskname,ia.name, ct.city_name, ia.verification_for, ia.qualification_name,ia.assigned_on, ia.status,ia.verification_user_id,ia.type as qualification_id, ia.location,st.state from insert_assigned_users as ia inner join cities as ct on ia.location=ct.city_id inner join user as us on us.User_Id=ia.assigned_to Inner join employment em on ia.type=em.empid inner join taskname te on te.task_name_id=em.task_name_id inner join verification_master vm on vm.Verification_Master_Id =ia.verification_user_id Inner join states st on ia.state=st.id where ia.status = 'Inprogress' and ia.location='$region' and ia.sstatus='New' Order by verification_user_id Desc,qualification_name Desc)
" ;
                    
                    $supervisor_view=mysql_query($lverification);


	
	 while($r2 = mysql_fetch_array($supervisor_view)) {

	array_push($supervisor_new_array,$r2);

}

}

array_push($collectionArray,$regionArray);
array_push($collectionArray,$uusernameArray);
print json_encode($collectionArray, JSON_NUMERIC_CHECK);

?>