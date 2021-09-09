<?php
// filename formshow.php
include "include/header.template.php";
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

<h3>Showing Student record details</h3>
<form>
	<label for="name">Student Name</label>
	<input type="text" name="name" class="form-control"
		value="<?php echo $name; ?>">

	<label for="matrixno">Matrix No</label>
	<input type="text" name="matrixno" class="form-control"
	readonly
	value="<?php echo $matrixno; ?>">

	<label for="address">Address</label>
	<input type="text" name="address" class="form-control"
		value="<?php echo $address; ?>">

	<label for="dob">Date of birth</label>
	<input type="date" name="dob" class="form-control"
		value="<?php echo $dob; ?>"><br>

	<div class="float-right">
		<button type="button" class ="btn btn-primary"
		onclick="window.history.back();">
		Back</button>
	</div>

</form>
<hr>
<?php
//display list of registered shortcourses here
include "displayregshortcourses.php";
include "include/footer.template.php";
?>