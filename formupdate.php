<?php
include "include/header.template.php";
// filename formupdate.php

include "include/dbconnect.php";

$x=$_GET['x'];
$sql="SELECT * FROM students
	WHERE id='$x' ";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){//no record with id x
	echo "<div class='alert alert-warning'>";
	echo " No with id:$x record found</div>";
	$name="";
	$matrixno="";
	$address="";
	$dob="";
}
else{//record with id x found
	$record=mysqli_fetch_assoc($result);
	$name=$record['name'];
	$matrixno=$record['matrixno'];
	$address=$record['address'];
	$dob=$record['dob'];
}
?>

<h3>Update Student record details</h3>
<form action="saveupdate.php" method="post">
	<label for="name">Record id</label>
	<input type="text" name="id" class="form-control"
		value="<?php echo $record['id']; ?>" readonly>

	<label for="name">Student Name</label>
	<input type="text" name="name" class="form-control"
		value="<?php echo $name; ?>">

	<label for="matrixno">Matrix No</label>
	<input type="text" name="matrixno" class="form-control"
		value="<?php echo $matrixno; ?>">

	<label for="address">Address</label>
	<input type="text" name="address" class="form-control"
		value="<?php echo $address; ?>">

	<label for="dob">Date of birth</label>
	<input type="date" name="dob" class="form-control"
		value="<?php echo $dob; ?>"><br>

	<div class="float-right">

		<button type="button" class ="btn btn-default"
		onclick="window.history.back();">
		Cancel</button>
		<button type="submit" class ="btn btn-primary">
			<!-- submit tot saveupdate.php -->
		Save Update</button>
	</div>

</form>
<?php
include "include/footer.template.php";
?>