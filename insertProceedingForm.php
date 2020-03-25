<?php
include "include/header.template.php";
//display info from saverecord.php
if(isset($_GET['message'])){
	echo "<div class='alert alert-success'>";
	echo $_GET['message']."</div>";
}
?>

<h3>Create new Proceeding record</h3>
<form method="POST" action="saverecord.php">

	<label for="id">ID</label>
	<input type="text" name="id" class="form-control"
		placeholder="Enter the proceeding ID">

	<label for="title">Title</label>
	<input type="text" name="title" class="form-control"
		placeholder="Enter proceeding title">

	<label for="author">Author</label>
	<input type="text" name="author" class="form-control"
		placeholder="Main author">

	<label for="institution_code">Institution Code</label>
	<select class="form-control" name="institution_code">
		<option value="0">Select from this list</option>
		<?php
			//code to extract institution_code 
			//from table institution
			include "include/dbconnect.php";
			//embed SQL commands
			$sql = "SELECT * FROM institutions";
			//execute sql commands that will return result set
			$result = mysqli_query($conn, $sql);
    		// output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
    			$inst_code=$row['institution_code'];
    			$inst_name=$row['name'];
		?>
				<option value="<?php echo $inst_code ?>">
					<?php echo $inst_code ?>
				</option>
		<?php
			}//end while
		?>
	</select>

	<label for="email">Email</label>
	<input type="email" name="dob" class="form-control"
		placeholder="Corresponding email">

	<label for="abstract">Abstract</label>
	<textarea name="abstract" class="form-control">
		</textarea>

	<label for="keyword">Keyword</label>
	<input type="text" name="keyword" class="form-control"
		placeholder="Separate keyword by coma">

	<div class="float-right">
		<button type="submit" class ="btn btn-primary">
		Save Proceeding</button>
	</div>

</form>
<?php
include "include/footer.template.php";
?>