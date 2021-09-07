<!-- form-students-register-scourses.php -->
<?php include "include/header.template.php"; ?>
<h1>Select more than one short-course</h1>
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
    <div class="row">
        <div class="column">
        <input type="text" name="matrixno" required 
        class="form-control">
        </div>
        <div class="column">
        <button type="submit" class="btn btn-primary">
            Save Register</button>
        </div>  
    </div>
</form>


<?php 
if(isset($_GET['error'])){
    $error=$_GET['error'];
    echo "<div class='alert alert-warning'>
        $error
    </div>";

}
if(isset($_GET['success'])){
    $success=$_GET['success'];
    echo "<div class='alert alert-success'>
        $success
    </div>";

}
include "include/footer.template.php"; ?>