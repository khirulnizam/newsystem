<?php
//delete.php
	include "include/dbconnect.php";
	$id=$_GET['x'];

	//sql command to update record
	$sql="DELETE FROM students
			WHERE id='$id' ";

	$result=mysqli_query($conn,$sql);
	//redirect to forminsert.php
	header("Location: search-admin.php?message=Student+record+deleted");
?>