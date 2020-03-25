<?php
//saverecord.php
if(isset($_POST['name']) && isset($_POST['matrixno'])){
	//include database settings
	include "include/dbconnect.php";

	//fetch all form data 
	$title=$_POST['title'];
	$author=$_POST['author'];
	$email=$_POST['email'];
	$abstract=$_POST['abstract'];
	$keywords=$_POST['keywords'];
	$institution_code=$_POST['institution_code'];

	//sql command to insert record
	$sql="INSERT INTO proceedings(title,author,email, abstract,keywords,institution_code) 
			VALUES ('$title','$author','$email', 
			'$abstract','$keywords','$institution_code') ";
	$result=mysqli_query($conn,$sql);

	//redirect to forminsert.php
	header("Location: insertProceedingForm.php?message=New+proceeding+
		$id+saved");
}
else{
	header("Location: insertProceedingForm.php?message=Please+key-in+proceeding+information");
}

?>