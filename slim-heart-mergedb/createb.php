<?php
header('Access-Control-Allow-Origin: *');

updatelpa();

/*function checkLogin(){

    $username = mysql_real_escape_string($_REQUEST['username']); // Getting parameter with username
    $password = mysql_real_escape_string($_REQUEST['password']); // Getting parameter with password
	

	$sql = "SELECT * FROM user  WHERE username=:username and password=:password";
	$sql1 = "SELECT plant_id,plant_name,line_no FROM Plant";
	$sql2 = "SELECT category_id,category from categories order by category_id";
	$sql3 = "SELECT activity_id,activity from activities where category_id=? order by activity_id";
	$alldata =  array();
	$check =false;
    try {
        $dbCon = getConnection();
        $stmt = $dbCon->prepare($sql);  
        $stmt->bindParam("username", $username);
		$stmt->bindParam("password", $password);
        $stmt->execute();
       // $user = $stmt->fetchObject();
		if($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$check = true;
			$data = $row;	
			$stmt1 = $dbCon->prepare($sql1);
       		$stmt1->execute();
			$plant_data = array();
			while($row1 = $stmt1->fetch(PDO::FETCH_OBJ)){
				 array_push($plant_data,$row1);
			}
			$stmt2 = $dbCon->prepare($sql2);
       		$stmt2->execute();
			$category_data = array();
			$all_activity_data = array();
			while($row2 = $stmt2->fetch(PDO::FETCH_OBJ)){
				 $activity_data = array();
				 array_push($category_data,$row2);
				 $stmt3 = $dbCon->prepare($sql3);
				 $stmt3->bindParam(1, $row2->category_id);
				 $stmt3->execute();
				 while($row3 = $stmt3->fetch(PDO::FETCH_OBJ)){
					 array_push($activity_data,$row3);
				 }
				 array_push($all_activity_data,$activity_data);
				 
			}
			array_push($alldata,$check);
			array_push($alldata,$data);
			array_push($alldata,$plant_data);
			array_push($alldata,$category_data);
			array_push($alldata,$all_activity_data);
			//$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
			//print $data;
		}
		
        $dbCon = null;
        echo json_encode($alldata); 
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }


}*/


function updatelpa(){
	$dbCon;
			
			
	$activityval = split("#",$_REQUEST['activityval']);
	/*$plant_id = $_REQUEST['plant_id'];
	$part_id = $_REQUEST['part_id'];
	$shift = $_REQUEST['shift'];*/
	//$plant_id = "10";
	//$part_id = "pa511234";
	//$shift = "2";

$patient_obs_id = $_REQUEST['user_id'];
			

	$sql = "insert into patient_observation_details(patient_obs_id,observation_id,value,actual_closed_date,created_date,status) values (?,?,?,?,now(),?)";
	
	try {
		$dbCon = getConnection();
		$dbCon->beginTransaction();
        $stmt = $dbCon->prepare($sql); 
		$size = sizeof($activityval)-1;
		error_log("before for , $size"); 
		for ($x = 0; $x<$size; $x++) {
			$evaluation="";
			if(isset($_REQUEST['result_yes'.$x])){
				$evaluation = $_REQUEST['result_yes'.$x];
			}/*else if(isset($_REQUEST['result_no'+$x])){
				$evaluation = $_REQUEST['result_yes'.$x];
			}else if(isset($_REQUEST['result_yes'.$x])){
				$evaluation = $_REQUEST['result_na'.$x];
			}*/ 
				
			//$reponsible = '0'.$x;
			//$findings  = '0'.$x;
			$datepicker = '';
			if(isset($_REQUEST['datepicker'.$x])){
				$datepicker =$_REQUEST['datepicker'.$x]; 
			}
			$status= 1;
		
			$stmt->bindParam(1, $patient_obs_id);
			//$stmt->bindParam(2, $plant_id);
			//$stmt->bindParam(3, $part_id);
			$stmt->bindParam(2, $activityval[$x]);
			$stmt->bindParam(3, $evaluation);
			//$stmt->bindParam(6, $findings);
			//$stmt->bindParam(7, $shift);
			//$stmt->bindParam(8, $reponsible);
			$stmt->bindParam(4, $datepicker);
			$stmt->bindParam(5, $status);
			$stmt->execute();


		}
		$dbCon->commit();

		
		//json_encode("success"); 		
		echo "success";
	}catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		$dbCon->rollBack();

		//error_log($e->getMessage());
    }
	
	
	
	
}



function getConnection() {
    try {
        $db_username = "root";
        $db_password = "123456";
        $conn = new PDO('mysql:host=localhost;dbname=heart', $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}

?>
