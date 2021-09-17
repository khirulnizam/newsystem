<!-- additional for drop-down program -->
<?php 
//connect to datase
			include "include/dbconnect.php";
            $codefaculty=$_GET['codefaculty'];
?>

<label for="programcode">Program</label>
	<select class="form-control" name="programcode" required>
		<option value="">Select <?php echo $codefaculty; ?> program from this list
		</option>
		<?php
			
			$sql = "SELECT * FROM programs
            WHERE codefaculty='$codefaculty'";
			$result=mysqli_query($conn,$sql);
			//display in options
			while($row=mysqli_fetch_array($result)){
				$code=$row['programcode'];
				$pname=$row['programname'];
				echo "<option value='$code'>".
						"$code $pname ".
						"</option>";
			}

		?>
		
	</select>
	<br>