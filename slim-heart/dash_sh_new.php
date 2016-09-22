<?php

header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');

$sh_new_veri_list = array();
$sh_new_veri_list_count = array();
$insertassign_employment_array = array();
$insertassign_education_array = array();
$insertassign_address_array = array();
$sh_new_veri_list_count=array();

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

$driving_details_array=array();
$credential_verification_array=array();
$bankruptcy_verification_array=array();
$identity_verification_array=array();
$professional_details_array=array();

$collectionArray =array();


$region = $_REQUEST['region'];

$regionsection = $_REQUEST['regionsection'];

$state = $_REQUEST['state'];




$user_coo=mysql_query("select count(*) as sh_new_veri_Count from ((select vm.status,vm.Ref_no,er.state as sta,er.assigned_status as rej,vm.Doc,ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name ,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone,vm.Mobile,vc.Verification_Category,qu.qualification_name as qname,er.education_type as edutype from verification_master as vm inner join educational_records as er on vm.Verification_Master_Id=er.user_id inner join qualifications as qu on er.education_type=qu.qualification_id Inner join taskname ta on ta.task_name_id=qu.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=er.state Inner join region rn on st.region_id=rn.region_id WHERE er.state = '$state' and vm.status = 'assigned' and er.sh_assigned != 'progress') union(select vm.status,vm.Ref_no,evc.assigned_status as rej,evc.employer_state_id as sta,vm.Doc,ta.task_name,vm.Verification_Master_Id,vm.Verification_For, vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, em.employment as qname,evc.employment_type as edutype from verification_master as vm Inner Join emp_verification_cumulative evc on vm.Verification_Master_Id=evc.user_id Inner Join employment em on em.empid=evc.employment_type Inner join taskname ta on ta.task_name_id=em.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=evc.employer_state_id Inner join region rn on st.region_id=rn.region_id where evc.employer_state_id = '$state' and vm.status = 'assigned' and evc.sh_assigned != 'progress') union(select vm.status,vm.Ref_no,aid.assigned_status as rej,aid.state as sta,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ad.address_name as qname,aid.proof_type_id as edutype from verification_master as vm inner join addressid_records as aid on vm.Verification_Master_Id=aid.user_id inner join address_type as ad on aid.proof_type_id=ad.id Inner join taskname ta on ta.task_name_id=ad.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=aid.state Inner join region rn on st.region_id=rn.region_id where aid.state = '$state' and vm.status = 'assigned' and aid.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,ast.assigned_status as rej,ast.state as sta,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, pt.property_name as qname,ast.propert_type as edutype from verification_master as vm inner join assests_verification as ast on vm.Verification_Master_Id=ast.user_id inner join property_type as pt on ast.propert_type=pt.pro_id Inner join taskname ta on ta.task_name_id=pt.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=ast.state Inner join region rn on st.region_id=rn.region_id where ast.state = '$state' and vm.status = 'assigned' and ast.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,av.state as sta,av.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,av.address_group as edutype from verification_master as vm inner join address_verification as av on vm.Verification_Master_Id=av.user_id inner join address_group as ag on av.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=av.state Inner join region rn on st.region_id=rn.region_id where av.state = '$state' and vm.status = 'assigned' and av.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,rf.state as sta,rf.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,rf.address_group as edutype from verification_master as vm inner join reference_verification as rf on vm.Verification_Master_Id=rf.user_id inner join address_group as ag on rf.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=rf.state Inner join region rn on st.region_id=rn.region_id where rf.state = '$state' and vm.status = 'assigned' and rf.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dv.state as sta,dv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dv.address_group as edutype from verification_master as vm inner join distributor_verification as dv on vm.Verification_Master_Id=dv.user_id inner join address_group as ag on dv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dv.state Inner join region rn on st.region_id=rn.region_id where dv.state = '$state' and vm.status = 'assigned' and dv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dd.state as sta,dd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dd.address_group as edutype from verification_master as vm inner join distributor_details as dd on vm.Verification_Master_Id=dd.user_id inner join address_group as ag on dd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dd.state Inner join region rn on st.region_id=rn.region_id where dd.state = '$state' and vm.status = 'assigned' and dd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,vm.Current_State as sta,vm.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,vm.address_group as edutype from verification_master as vm inner join address_group as ag on vm.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=vm.Current_State Inner join region rn on st.region_id=rn.region_id where vm.Current_State = '$state' and vm.status = 'assigned' and vm.sh_assigned != 'progress' and vm.address_group !='33' and vm.address_group !='52') union (select vm.status,vm.Ref_no,wb.state as sta,wb.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,wb.address_group as edutype from verification_master as vm inner join web_verification as wb on vm.Verification_Master_Id=wb.user_id inner join address_group as ag on wb.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=wb.state Inner join region rn on st.region_id=rn.region_id where wb.state = '$state' and vm.status = 'assigned' and wb.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,sd.state as sta,sd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,sd.address_group as edutype from verification_master as vm inner join supplier_details as sd on vm.Verification_Master_Id=sd.user_id inner join address_group as ag on sd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=sd.state Inner join region rn on st.region_id=rn.region_id where sd.state = '$state' and vm.status = 'assigned' and sd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,wh.state as sta,wh.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,wh.address_group as edutype from verification_master as vm inner join warehouse_verification as wh on vm.Verification_Master_Id=wh.user_id inner join address_group as ag on wh.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=wh.state Inner join region rn on st.region_id=rn.region_id where wh.state = '$state' and vm.status = 'assigned' and wh.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,sv.state as sta,sv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,sv.address_group as edutype from verification_master as vm inner join servant_verification as sv on vm.Verification_Master_Id=sv.user_id inner join address_group as ag on sv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=sv.state Inner join region rn on st.region_id=rn.region_id where sv.state = '$state' and vm.status = 'assigned' and sv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dvd.state as sta,dvd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dvd.address_group as edutype from verification_master as vm inner join driving_details as dvd on vm.Verification_Master_Id=dvd.user_id inner join address_group as ag on dvd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dvd.state Inner join region rn on st.region_id=rn.region_id where dvd.state = '$state' and vm.status = 'assigned' and dvd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,cv.state as sta,cv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,cv.address_group as edutype from verification_master as vm inner join credential_verification as cv on vm.Verification_Master_Id=cv.user_id inner join address_group as ag on cv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=cv.state Inner join region rn on st.region_id=rn.region_id where cv.state = '$state' and vm.status = 'assigned' and cv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,bgv.state as sta,bgv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,bgv.address_group as edutype from verification_master as vm inner join bankguarantee_verification as bgv on vm.Verification_Master_Id=bgv.user_id inner join address_group as ag on bgv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=bgv.state Inner join region rn on st.region_id=rn.region_id where bgv.state = '$state' and vm.status = 'assigned' and bgv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,id.state as sta,id.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone,vm.Mobile,vc.Verification_Category,ag.add_name as qname,id.address_group as edutype from verification_master as vm inner join identity_verification as id on vm.Verification_Master_Id=id.user_id inner join address_group as ag on id.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=id.state Inner join region rn on st.region_id=rn.region_id where id.state = '$state' and vm.status = 'assigned' and id.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,brv.state as sta,brv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,brv.address_group as edutype from verification_master as vm inner join bankruptcy_verification as brv on vm.Verification_Master_Id=brv.user_id inner join address_group as ag on brv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=brv.state Inner join region rn on st.region_id=rn.region_id where brv.state = '$state' and vm.status = 'assigned' and brv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,av.state as sta,av.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,av.address_group as edutype from verification_master as vm inner join asset_verification as av on vm.Verification_Master_Id=av.user_id inner join address_group as ag on av.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=av.state Inner join region rn on st.region_id=rn.region_id where av.state = '$state' and vm.status = 'assigned' and av.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,pd.state as sta,pd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,pd.address_group as edutype from verification_master as vm inner join professional_details as pd on vm.Verification_Master_Id=pd.user_id inner join address_group as ag on pd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=pd.state Inner join region rn on st.region_id=rn.region_id where pd.state = '$state' and vm.status = 'assigned' and pd.sh_assigned != 'progress') Order by start_date Desc) as def");
	
	 

	 while($r26 = mysql_fetch_array($user_coo)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($sh_new_veri_list_count,$r26);



	 }



 $user_co=mysql_query("(select vm.status,vm.Ref_no,er.state as sta,er.assigned_status as rej,vm.Doc,ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name ,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone,vm.Mobile,vc.Verification_Category,qu.qualification_name as qname,er.education_type as edutype from verification_master as vm inner join educational_records as er on vm.Verification_Master_Id=er.user_id inner join qualifications as qu on er.education_type=qu.qualification_id Inner join taskname ta on ta.task_name_id=qu.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=er.state Inner join region rn on st.region_id=rn.region_id WHERE er.state = '$state' and vm.status = 'assigned' and er.sh_assigned != 'progress') union(select vm.status,vm.Ref_no,evc.assigned_status as rej,evc.employer_state_id as sta,vm.Doc,ta.task_name,vm.Verification_Master_Id,vm.Verification_For, vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, em.employment as qname,evc.employment_type as edutype from verification_master as vm Inner Join emp_verification_cumulative evc on vm.Verification_Master_Id=evc.user_id Inner Join employment em on em.empid=evc.employment_type Inner join taskname ta on ta.task_name_id=em.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=evc.employer_state_id Inner join region rn on st.region_id=rn.region_id where evc.employer_state_id = '$state' and vm.status = 'assigned' and evc.sh_assigned != 'progress') union(select vm.status,vm.Ref_no,aid.assigned_status as rej,aid.state as sta,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ad.address_name as qname,aid.proof_type_id as edutype from verification_master as vm inner join addressid_records as aid on vm.Verification_Master_Id=aid.user_id inner join address_type as ad on aid.proof_type_id=ad.id Inner join taskname ta on ta.task_name_id=ad.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=aid.state Inner join region rn on st.region_id=rn.region_id where aid.state = '$state' and vm.status = 'assigned' and aid.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,ast.assigned_status as rej,ast.state as sta,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, pt.property_name as qname,ast.propert_type as edutype from verification_master as vm inner join assests_verification as ast on vm.Verification_Master_Id=ast.user_id inner join property_type as pt on ast.propert_type=pt.pro_id Inner join taskname ta on ta.task_name_id=pt.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=ast.state Inner join region rn on st.region_id=rn.region_id where ast.state = '$state' and vm.status = 'assigned' and ast.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,av.state as sta,av.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,av.address_group as edutype from verification_master as vm inner join address_verification as av on vm.Verification_Master_Id=av.user_id inner join address_group as ag on av.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=av.state Inner join region rn on st.region_id=rn.region_id where av.state = '$state' and vm.status = 'assigned' and av.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,rf.state as sta,rf.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,rf.address_group as edutype from verification_master as vm inner join reference_verification as rf on vm.Verification_Master_Id=rf.user_id inner join address_group as ag on rf.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=rf.state Inner join region rn on st.region_id=rn.region_id where rf.state = '$state' and vm.status = 'assigned' and rf.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dv.state as sta,dv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dv.address_group as edutype from verification_master as vm inner join distributor_verification as dv on vm.Verification_Master_Id=dv.user_id inner join address_group as ag on dv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dv.state Inner join region rn on st.region_id=rn.region_id where dv.state = '$state' and vm.status = 'assigned' and dv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dd.state as sta,dd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dd.address_group as edutype from verification_master as vm inner join distributor_details as dd on vm.Verification_Master_Id=dd.user_id inner join address_group as ag on dd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dd.state Inner join region rn on st.region_id=rn.region_id where dd.state = '$state' and vm.status = 'assigned' and dd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,vm.Current_State as sta,vm.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,vm.address_group as edutype from verification_master as vm inner join address_group as ag on vm.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=vm.Current_State Inner join region rn on st.region_id=rn.region_id where vm.Current_State = '$state' and vm.status = 'assigned' and vm.sh_assigned != 'progress' and vm.address_group !='33' and vm.address_group !='52') union (select vm.status,vm.Ref_no,wb.state as sta,wb.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,wb.address_group as edutype from verification_master as vm inner join web_verification as wb on vm.Verification_Master_Id=wb.user_id inner join address_group as ag on wb.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=wb.state Inner join region rn on st.region_id=rn.region_id where wb.state = '$state' and vm.status = 'assigned' and wb.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,sd.state as sta,sd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,sd.address_group as edutype from verification_master as vm inner join supplier_details as sd on vm.Verification_Master_Id=sd.user_id inner join address_group as ag on sd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=sd.state Inner join region rn on st.region_id=rn.region_id where sd.state = '$state' and vm.status = 'assigned' and sd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,wh.state as sta,wh.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,wh.address_group as edutype from verification_master as vm inner join warehouse_verification as wh on vm.Verification_Master_Id=wh.user_id inner join address_group as ag on wh.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=wh.state Inner join region rn on st.region_id=rn.region_id where wh.state = '$state' and vm.status = 'assigned' and wh.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,sv.state as sta,sv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,sv.address_group as edutype from verification_master as vm inner join servant_verification as sv on vm.Verification_Master_Id=sv.user_id inner join address_group as ag on sv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=sv.state Inner join region rn on st.region_id=rn.region_id where sv.state = '$state' and vm.status = 'assigned' and sv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,dvd.state as sta,dvd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,dvd.address_group as edutype from verification_master as vm inner join driving_details as dvd on vm.Verification_Master_Id=dvd.user_id inner join address_group as ag on dvd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=dvd.state Inner join region rn on st.region_id=rn.region_id where dvd.state = '$state' and vm.status = 'assigned' and dvd.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,cv.state as sta,cv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,cv.address_group as edutype from verification_master as vm inner join credential_verification as cv on vm.Verification_Master_Id=cv.user_id inner join address_group as ag on cv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=cv.state Inner join region rn on st.region_id=rn.region_id where cv.state = '$state' and vm.status = 'assigned' and cv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,bgv.state as sta,bgv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,bgv.address_group as edutype from verification_master as vm inner join bankguarantee_verification as bgv on vm.Verification_Master_Id=bgv.user_id inner join address_group as ag on bgv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=bgv.state Inner join region rn on st.region_id=rn.region_id where bgv.state = '$state' and vm.status = 'assigned' and bgv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,id.state as sta,id.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone,vm.Mobile,vc.Verification_Category,ag.add_name as qname,id.address_group as edutype from verification_master as vm inner join identity_verification as id on vm.Verification_Master_Id=id.user_id inner join address_group as ag on id.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=id.state Inner join region rn on st.region_id=rn.region_id where id.state = '$state' and vm.status = 'assigned' and id.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,brv.state as sta,brv.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,brv.address_group as edutype from verification_master as vm inner join bankruptcy_verification as brv on vm.Verification_Master_Id=brv.user_id inner join address_group as ag on brv.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=brv.state Inner join region rn on st.region_id=rn.region_id where brv.state = '$state' and vm.status = 'assigned' and brv.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,av.state as sta,av.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,av.address_group as edutype from verification_master as vm inner join asset_verification as av on vm.Verification_Master_Id=av.user_id inner join address_group as ag on av.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=av.state Inner join region rn on st.region_id=rn.region_id where av.state = '$state' and vm.status = 'assigned' and av.sh_assigned != 'progress') union (select vm.status,vm.Ref_no,pd.state as sta,pd.assigned_status as rej,vm.Doc, ta.task_name,vm.Verification_Master_Id,vm.Verification_For,vm.First_Name,vm.Last_Name,vm.Current_Address1,vm.start_date,vm.Current_Address2,vm.Phone, vm.Mobile, vc.Verification_Category, ag.add_name as qname,pd.address_group as edutype from verification_master as vm inner join professional_details as pd on vm.Verification_Master_Id=pd.user_id inner join address_group as ag on pd.address_group=ag.add_grp_id Inner join taskname ta on ta.task_name_id=ag.task_name_id Inner join verification_category vc on vm.Verification_For=vc.Verification_Category_Id Inner join states st on st.id=pd.state Inner join region rn on st.region_id=rn.region_id where pd.state = '$state' and vm.status = 'assigned' and pd.sh_assigned != 'progress') Order by start_date Desc");
	
	 

	 while($r18 = mysql_fetch_array($user_co)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($sh_new_veri_list,$r18);



	 }



$lverification="Select ta.task_name as task,vm.First_Name,vm.Verification_Master_Id,evc.employer_name as institute_name,evc.working_from as efrom,evc.working_to as eto,evc.employer_addressone as address,emp.employment as qualification_name,evc.employment_type as edutype,evc.employee_final_salary as percentage,evc.employer_zipcode as pincode ,evc.employer_addresstwo,ct.city_name,evc.employer_city_id as city_id,st.id as sat,st.state,vc.Verification_Category from verification_master vm inner join emp_verification_cumulative evc on evc.user_id=vm.Verification_Master_Id inner join cities ct on ct.city_id= evc.employer_city_id inner join states st on st.id = evc.employer_state_id inner join employment emp on emp.empid = evc.employment_type inner join verification_category vc on vc.Verification_Category_Id = vm.Verification_For inner join taskname as ta on ta.task_name_id=emp.task_name_id " ;



$supervisor_viewa=mysql_query($lverification);



	while($r2 = mysql_fetch_array($supervisor_viewa)) {

		array_push($insertassign_employment_array,$r2);

	}

$lverification="Select ta.task_name as task,vm.First_Name,vm.Verification_Master_Id,vm.Phone, vm.Mobile,er.institute_name, er.percentage, er.year_of_passing,er.education_type as edutype, er.percentage, er.address as address, er.from as efrom, er.to as eto, er.pincode, ct.city_name, ct.city_id,st.id as sat, st.state,qu.qualification_name,vc.Verification_Category from verification_master vm inner join educational_records er on er.user_id=vm.Verification_Master_Id inner join cities ct on ct.city_id=er.city inner join states st on st.id = er.state inner join qualifications qu on qu.qualification_id = er.education_type inner join verification_category vc on vc.Verification_Category_Id = vm.Verification_For inner join taskname as ta on ta.task_name_id=qu.task_name_id " ;



$supervisor_viewb=mysql_query($lverification);



	while($r3 = mysql_fetch_array($supervisor_viewb)) {

		array_push($insertassign_education_array,$r3);

	}


	$lverification="Select ta.task_name as task,vm.First_Name,vm.Verification_Master_Id,vm.phone as Phone,vm.mobile as Mobile,vm.Current_Address1 as address,vm.Current_Address2 as Current_Address2 ,vm.mobile,at.id,at.address_name as qualification_name,aid.user_id,vc.Verification_Category,ct.city_name,ct.city_id as city_id,st.id as sat,st.state,aid.proof_type_id as edutype,at.address_name from verification_master as vm inner join addressid_records as aid on vm.Verification_Master_Id=aid.user_id inner join states as st  on st.id=aid.state inner join cities as ct on ct.city_id=aid.city inner join address_type as at on at.id=aid.proof_type_id inner join verification_category vc on vc.Verification_Category_Id = vm.Verification_For inner join taskname as ta on ta.task_name_id=at.task_name_id" ;



$supervisor_viewc=mysql_query($lverification);



	while($r4 = mysql_fetch_array($supervisor_viewc)) {

		array_push($insertassign_address_array,$r4);

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




array_push($collectionArray,$sh_new_veri_list_count);
array_push($collectionArray,$sh_new_veri_list);
array_push($collectionArray,$insertassign_employment_array);
array_push($collectionArray,$insertassign_education_array);
array_push($collectionArray,$insertassign_address_array);
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
