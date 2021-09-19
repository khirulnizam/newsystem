<?php 
//multi-record-department-form.php
include "include/header.template.php";

//to list faculties
    //filename ebook-star-rating-form.php
    //use the previous settings
    include "include/dbconnect.php";

    //embed SQL commands
    $sql = "SELECT * from faculty";
    //execute sql commands that will return result set
    $result = mysqli_query($conn, $sql);
    
?>
<h1>Multi-record Input</h1>
<form action="multi-record-department-save.php" 
method="GET">
<div class="row">
    <div class="col-8">
        
        Select the faculty
        <select name="codefaculty" class="form-control" >
        <option disabled selected value> -- select faculty code -- </option>
        <?php
        //check records fetched available
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $codefaculty=$row['codefaculty'];
                $namefaculty =$row['namefaculty'];
                echo "<option value='$codefaculty'>$codefaculty $namefaculty</option>";
            }//end while
        } //end if have records
        else {
            echo "No results";
        }
        ?>
        </select>
    </div>
</div>
<br>
(Leave blank to skip)<br>
Department 1<br>
<div class="row">

    <div class="col-2">
        Code:
        <input type="text" name="deptcode[]" 
        class="form-control">
    </div>
    <div class="col-6">
        Dept Name:
        <input type="text" name="deptname[]"
        class="form-control">
    </div>
</div>
<br>
Department 2<br>
<div class="row">
    <div class="col-2">
        Code:
        <input type="text" name="deptcode[]"
        class="form-control">
    </div>
    <div class="col-6">
        Dept Name:
        <input type="text" name="deptname[]"
        class="form-control">
    </div>
</div>
<br>
Department 3<br>
<div class="row">
    <div class="col-2">
        Code:
        <input type="text" name="deptcode[]"
        class="form-control">
    </div>
    <div class="col-6">
        Dept Name:
        <input type="text" name="deptname[]"
        class="form-control">
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">
    Save departments</button>



</form>
<?php 
include "include/footer.template.php";
?>