<?php 
//multi-record-department-form.php
include "include/header.template.php";
?>

<?php
//multi-record-department-save.php
$deptcode=$_GET['deptcode'];
$deptname=$_GET['deptname'];
$codefaculty=$_GET['codefaculty'];

include "include/dbconnect.php";

for($count = 0; $count < sizeof($deptcode); $count++)
		{
			if(!empty($deptcode[$count]))
			{
				$dcode = $deptcode[$count];
				$dname=$deptname[$count];
				
				$sql = "INSERT INTO departments (deptcode, deptname,codefaculty) 
                VALUES('$dcode','$dname','$codefaculty')";
                $rs=mysqli_query($conn,$sql);

				if($rs==false){
                    //echo mysqli_error($conn)." SQL:$sql <br> ";
					$my_errors[] = $dcode;
                    echo "Department code cannot been saved : $dcode <br>";
                }
                else{
                    echo "Department code has been saved : $dcode <br>";
                }
			}
		}

?>
<?php 
//multi-record-department-form.php
include "include/footer.template.php";
?>