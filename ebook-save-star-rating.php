<?php
//ebook-save-star-rating.php

if(isset($_GET['ebookid']) && isset($_GET['ebookreview'])){
	//include database settings
	include "include/dbconnect.php";

	//fetch all form data 
	$ebookid=$_GET['ebookid'];
	$ebookreview=$_GET['ebookreview'];
	$ratexample=$_GET['ratexample'];
	$ratexplain=$_GET['ratexplain'];
	$rateoverall=$_GET['rateoverall'];

	//sql command to insert record
	$sql="INSERT INTO ebookratings(ebookid,ebookreview,ratexample,
			ratexplain,rateoverall) 
			VALUES ('$ebookid','$ebookreview','$ratexample',
			'$ratexplain','$rateoverall') ";
	$result=mysqli_query($conn,$sql);
	//echo "SQL: $sql :".mysqli_error($conn);

	//redirect to ebook-star-rating-form.php
	header("Location: ebook-star-rating-form.php?success=Rating/review successfully saved ($ebookid). Rate another book? ");
}
else{
	header("Location: ebook-star-rating-form.php?error=Failed to save rating!!!");
}
?>