<?php
//saveupdate.php
if(isset($_POST['name']) && isset($_POST['matrixno'])){
	include "include/dbconnect.php";
	$id=$_POST['id'];
	$name=$_POST['name'];
	$matrixno=$_POST['matrixno'];
	$address=$_POST['address'];
	$dob=$_POST['dob'];
	$programcode=$_POST['programcode'];
	//sql command to update record
	$sql="UPDATE students
		SET name='$name',
			matrixno='$matrixno',
			address='$address',
			dob='$dob',
			programcode='$programcode'
		WHERE id='$id' ";

	$result=mysqli_query($conn,$sql);
	//redirect to forminsert.php
	header("Location: search-admin.php?message=Student+record+has+been+update+$name+saved");
}
else{
	//header("Location: 
	//forminsert.php?message=Please+key-in+student+record");
}


?>