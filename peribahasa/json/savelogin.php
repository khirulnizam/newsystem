<?php



$uname=$_POST['uname'];

$pwd=$_POST['pwd'];

 

// include connect class

require_once __DIR__ . '/connect.php';

 

// connecting to db

$db = new DB_CONNECT();



//using LIKE

$pwd=md5($pwd);

$q = mysql_query("INSERT INTO a_training_user VALUES ('','$uname', '$pwd')");

echo (mysql_error());

 

// check for empty result

if ($q==true) {

    // match found

	//send success

		//echo "success";

		$response["success"] = 1;

	}//end match found

	else{//no match found

		//send status fail

		//echo "fail";

		$response["success"] = 0;

	}

	echo json_encode($response);



?>