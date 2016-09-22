<?php
//header('Access-Control-Allow-Origin: *');
//header('Content-type: text/html; charset=UTF-8');
header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
checkLogin();

function checkLogin(){
	//global $app;
	//$username1 = $_POST['username'];
	//error_log("username from post = $username1");
	
    //$req = $app->request(); // Getting parameter with names
//	$formData = json_decode($req->params('formData'));
   // $username = mysql_real_escape_string($_REQUEST['username']); // Getting parameter with username
   // $password = mysql_real_escape_string($_REQUEST['password']); // Getting parameter with password

//decodeURIComponent('%40'); // '@'
// or, to encode it back:
//encodeURIComponent('@'); // '%40'

   //$username = $_REQUEST['username']; // Getting parameter with username
   //$password = $_REQUEST['password']; // Getting parameter with password

	//echo $username,$password;
	//	error_log( print_r($_POST) );
//	 $username1 = $formData->username; 
    // Get password
//      $password1 = $formData->password; 

	//error_log( "$username,$password" );

	///$sql = "SELECT u.*,p.plant_name,c.country,r.region FROM user u,country c,plant p, region r  WHERE username=:username and password=:password or u.country_id=c.plant_id or u.plant_line=p.plant_id or u.region_id=r.regionid";
	///$sql1 = "SELECT p.plant_id, p.plant_name, c.country, r.region FROM plant p inner join country c on c.plant_id=p.country_id inner join region r on c.region_id=r.regionid";
	//$sql1 = "SELECT plant_id,plant_name,line_no FROM plant where status=1";
	$sql2 ="SELECT * from category  order by cat_id";
	////$sql3 = "SELECT activity_id,activity from activities where category_id=? and status=1 order by activity_id";
	/*$sql2 = "SELECT category_id,category,activity_id,activity FROM activities a,category c where c.category_id=a.category_id order by category_id";*/
	$alldata = array();
	//$check =false;
    try {
        $dbCon = getConnection();
        $stmt = $dbCon->prepare($sql2);  
        //$stmt->bindParam("username", $username);
		//$stmt->bindParam("password", $password);
        $stmt->execute();
       // $user = $stmt->fetchObject();
		if($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$check = true;
			$data = $row;	
			$stmt1 = $dbCon->prepare($sql2);
       		$stmt1->execute();
			$category_data = array();
			while($row1 = $stmt1->fetch(PDO::FETCH_OBJ)){
				 array_push($category_data,$row1);
			}

			/*$stmt2 = $dbCon->prepare($sql2);
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
			}*/

			//array_push($alldata,$check);
			array_push($alldata,$data);
			//array_push($alldata,$plant_data);
			array_push($alldata,$category_data);
			//array_push($alldata,$all_activity_data);
			//$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
			//print $data;
		}
        $dbCon = null;
        echo json_encode($alldata); 
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }


}

/*$db = new PDO(
		"mysql:host=$db_host;dbname=$db_name;charset=UTF8",
		$db_user,
		$db_pass
	);*/


function getConnection() {
    try {
        $db_username = "root";
        $db_password = "123456";
        $conn = new PDO('mysql:host=localhost;dbname=dmkyouthwing_db', $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       // $conn->query("SET NAMES 'utf8'");
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}

?>
