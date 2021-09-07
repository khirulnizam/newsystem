<?php  
//save-students-register-scourses.php
if(isset($_GET['sccodes']) && $_GET['sccodes']!=null){//check atleast one shortcourse selected
    $sccodes=$_GET['sccodes'];
    $matrixno=$_GET['matrixno'];
}else{
    //if no shortcourse selected go back
    header ("Location:form-students-register-scourses.php?msg=No shortcourse selected ");
}

//checking nombor matrix exist
include "include/dbconnect.php";
$sql1="SELECT * FROM students 
WHERE matrixno='$matrixno' ";
$result1=mysqli_query($conn, $sql1);
if(mysqli_num_rows($result1)==1){
    $datetime=date("Y-m-d H:i:s"); 
    //matrixno exist
    foreach($sccodes as $code)  
    {  
        $sql="INSERT INTO students_register_scourses
            (matrixno, sccode, datetimereg)
            VALUES
            ('$matrixno','$code','$datetime')";
        echo "$sql<br>";
        $result=mysqli_query($conn, $sql); 

    } 
}
else{
    //matrixno doesnot exist
    header ("Location:form-students-register-scourses.php?msg=No such MatrixNo ");
}



?>