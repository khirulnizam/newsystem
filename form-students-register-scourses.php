<!-- form-students-register-scourses.php -->
<h1>Student may select more than one short-courses</h1>
<form action="save-students-register-scourses.php" 
method="get">

<?php
//filename listing.php
//use the previous settings
include "include/dbconnect.php";

//embed SQL commands
$sql = "SELECT * from shortcourses";
//execute sql commands that will return result set
$result = mysqli_query($conn, $sql);

//check records fetched available
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $code=$row['sccode'];
        $title =$row['sctitle'];
        echo "<input type='checkbox' name='sccodes[]' value='$code'>";
        echo  "$code $title <br>";
    }
} 
else {
    echo "No results";
}

//purge dbconnect
mysqli_close($conn);
?>
<br>
MatrixNo to verify your registration<br>
<input type="text" name="matrixno" required>
<button type="submit">Save Register</button>
</form>