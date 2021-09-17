<?php
//saverecord.php
if(isset($_POST['name']) && isset($_POST['matrixno'])){
	//include database settings
	include "include/dbconnect.php";

	//fetch all form data 
	$name=$_POST['name'];
	$matrixno=$_POST['matrixno'];
	$address=$_POST['address'];
	$dob=$_POST['dob'];
	$programcode=$_POST['programcode'];
	$codefaculty=$_POST['codefaculty'];

	//sql command to insert record
	$sql="INSERT INTO students(name,matrixno,address,
			dob,programcode,codefaculty) 
			VALUES ('$name','$matrixno','$address',
			'$dob','$programcode','$codefaculty') ";
	$result=mysqli_query($conn,$sql);

	//redirect to forminsert.php
	header("Location: forminsert.php?message=New+student+$name+saved");
}
else{
	header("Location: forminsert.php?message=Please+key-in+student+record");
}

?>