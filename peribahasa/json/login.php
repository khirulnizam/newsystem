<?php

$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
 
// include connect class
require_once __DIR__ . '/connect.php';
 
// connecting to db
$db = new DB_CONNECT();

//using LIKE
$result = mysql_query("SELECT * FROM users WHERE username='$uname' AND pwd=md5('$pwd')") 
or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
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