<?php
//filename listing.php
//use the previous settings
include "dbconnect.php";

//embed SQL commands
$sql = "SELECT id, matrixno, name, address, dob 
			FROM students";
//execute sql commands that will return result set
$result = mysqli_query($conn, $sql);

//check records fetched available
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Student ID ".$row['id']."<br>";
        echo "Matrix :".$row['matrixno'] ."<br>";
        echo "Name :".$row['name'] ."<br>";
        echo "DOB :".$row['dob'] ."<br>";
        echo "Address: ".$row['address']."<hr>\n";
    }
} 
else {
    echo "No results";
}

//purge dbconnect
mysqli_close($conn);
?>