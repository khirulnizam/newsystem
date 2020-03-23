<?php
include "header.template.php";
//display info from saverecord.php
if(isset($_GET['message'])){
	echo "<div class='alert alert-success'>";
	echo $_GET['message']."</div>";
}
?>

<h3>Create new Student record</h3>
<form method="POST" action="saverecord.php">
	<label for="name">Student Name</label>
	<input type="text" name="name" class="form-control"
		placeholder="Enter new student name as in IC">

	<label for="matrixno">Matrix No</label>
	<input type="text" name="matrixno" class="form-control"
		placeholder="Enter student matrix number">

	<label for="address">Address</label>
	<input type="text" name="address" class="form-control"
		placeholder="Student home address">

	<label for="dob">Date of birth</label>
	<input type="date" name="dob" class="form-control"
		placeholder="Student date of birth"><br>

	<div class="float-right">
		<button type="submit" class ="btn btn-primary">
		Save record</button>
	</div>

</form>
<?php
include "footer.template.php";
?>