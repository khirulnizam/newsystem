<?php
//saverecord.php
if(isset($_POST['name']) && isset($_POST['matrixno'])){
	include "dbconnect.php";
	$name=$_POST['name'];
	$matrixno=$_POST['matrixno'];
	$address=$_POST['address'];
	$dob=$_POST['dob'];
	//sql command to insert record
	$sql="INSERT INTO students(name,matrixno,address,dob) 
			VALUES ('$name','$matrixno','$address','$dob') ";
	$result=mysqli_query($conn,$sql);
	//redirect to forminsert.php
	header("Location: forminsert.php?message=New+student+$name+saved");
}
else{
	header("Location: forminsert.php?message=Please+key-in+student+record");
}


?>