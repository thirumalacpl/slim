<?php
header('Access-Control-Allow-Origin: *');

checkLogin();

function checkLogin(){


	$sql = "SELECT * from  observation";
	$sql1 = "SELECT * from  observation";
	//$sql1 = "SELECT plant_id,plant_name,line_no FROM plant where status=1";

	$sql2 = "SELECT category_id,category_desc from category where status=1 order by category_id";
	$sql3 = "SELECT observation_id,observation_name from observation where category_id=? and status=1 order by observation_id";
	/*$sql2 = "SELECT category_id,category,activity_id,activity FROM activities a,category c where c.category_id=a.category_id order by category_id";*/
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

/* Test */

/*		$con = mysqli_connect("localhost","root","123456", "lpa-dev");


	$sql = "SELECT p.plant_name, c.country, r.region FROM plant p inner join country c on c.country_id=p.country_id inner join region r on c.region_id=r.regionid";
    
	$fetch_query=mysqli_query($con, $sql);
    $num_of_rows= mysqli_num_rows($fetch_query);
	$listdata =  array();

    while($row = mysqli_fetch_assoc($fetch_query))
    {
       array_push($listdata,$row); 	

     }
        echo json_encode($listdata); */

        /* test ends */






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
