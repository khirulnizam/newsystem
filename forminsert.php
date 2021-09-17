<?php
include "include/header.template.php";
//display info from saverecord.php
if(isset($_GET['message'])){
	echo "<div class='alert alert-success'>";
	echo $_GET['message']."</div>";
}
?>

<h3>Create new Student record</h3>
<form method="POST" action="saverecord.php">
	<label for="name">Student Name</label>
	<input type="text" name="name" class="form-control" required
		placeholder="Enter new student name as in IC">

	<label for="matrixno">Matrix No</label>
	<input type="text" name="matrixno" class="form-control" required
		placeholder="Enter student matrix number">

	<label for="address">Address</label>
	<input type="text" name="address" class="form-control" required
		placeholder="Student home address">

	<label for="dob">Date of birth</label>
	<input type="date" name="dob" class="form-control" required
		placeholder="Student date of birth">

	<!-- additional for drop-down faculty code -->
	<label for="codefaculty">Faculty</label>
	<select class="form-control" name="codefaculty" required
	onchange="showprogramme(this.value)">
		<option value="">Select faculty from this list
		</option>
		<?php
			//connect to datase
			include "include/dbconnect.php";
			$sql = "SELECT * FROM faculty";
			$result=mysqli_query($conn,$sql);
			//display in options
			while($row=mysqli_fetch_array($result)){
				$code=$row['codefaculty'];
				$faculty=$row['namefaculty'];
				echo "<option value='$code'>".
						"$code $faculty ".
						"</option>";
			}

		?>
	</select>
	<script>
		//this javacript is to handle refresh list of programme
		function showprogramme(str) {
		if (str == "") {
			document.getElementById("listprogramme").innerHTML = "";
			return;
		}
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById("listprogramme").innerHTML = this.responseText;
		}
		xhttp.open("GET", "ajax-select-programme.php?codefaculty="+str);
		xhttp.send();
		}
		</script>
	<br>
	<div id="listprogramme">Programmes by selected Faculty above will be listed here...</div>
	<div class="float-right">
		<button type="submit" class ="btn btn-primary">
		Save record</button>
	</div>

</form>
<?php
include "include/footer.template.php";
?>