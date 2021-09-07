<?php
//filename dbconnect
$servername = "localhost";//server location / IP number
$username = "root";//db admin username
$password = "";//password for db admin username
$dbname = "newsystem";//database name

// Create connection
$conn = mysqli_connect($servername, $username, 
			$password, $dbname);
// Check connection
if (!$conn) {
	//terminate system if not connected 
    die("Connection failed: " . mysqli_connect_error());
}
else{
	//temp message if successfully connected to DB
	//echo "DB Connected!";
}
?>