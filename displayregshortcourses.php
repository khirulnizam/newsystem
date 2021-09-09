<?php
//displayregshortcourses.php
//sql with M-M relationship between tables
//1. students
//2. students_register_scourses
//3. shortcourses
//based on the students matrixno selected
$sqlreg="SELECT
students.name AS name,
students.matrixno AS matrixno, 
shortcourses.sccode AS sccode, sctitle
FROM
students, students_register_scourses, shortcourses
WHERE
students.matrixno='$matrixno' 
AND
students.matrixno = students_register_scourses.matrixno
AND
students_register_scourses.sccode = shortcourses.sccode";

$rsreg=mysqli_query($conn, $sqlreg);
?>
<div class="card">
    <div class="card-header">
        <h1> Registered shortcourses for 
        <?php echo $matrixno ?></h1>
    </div>
    <div class="card-body">
        <?php include "noti.php"; ?>

        <?php

        //check has student registered shortcourses
        if(mysqli_num_rows($rsreg)==0){
            echo "Student has not registered any shortcourses, 
            <a href='form-students-register-scourses.php?matrixno=$matrixno'>
            REGISTER SHORTCOURSES HERE</a>";
        }
        else{
            //this is to dispaly list of shortcourses registered
            while($recreg=mysqli_fetch_assoc($rsreg)){
                $sccode=$recreg['sccode'];
                $sctitle=$recreg['sctitle'];
                echo "$sccode : $sctitle <br>";
            }
        }

       ?>

    </div>
</div>