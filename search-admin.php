<?php
	include "include/header.template.php";
	//getbootstrap.com

if(isset($_GET['message'])){
	echo "<div class='alert alert-success'>";
	echo $_GET['message']."</div>";
}
//github.com/khirulnizam/newsystem
?>

<div class="float-right">
	<!--  Search Bar -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
          method="get" action="">
            <div class="input-group">
              <input type="text" name="keyword" 
              class="form-control bg-light border-1 small" placeholder="Search students..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> 
          <!-- insert button -->
          <button href="forminsert.php" class="btn btn-success"
          	 title="Add new student">
          	<i class="fas fa-plus"></i>
          </button>
</div>
<?php
//filename search.php
//use the previous settings
include "include/dbconnect.php";

//embed SQL commands
if(isset($_GET['keyword'])){//based on keyword entered
	$keyword=$_GET['keyword'];
	$sql = "SELECT students.id, matrixno, name, address, 
			students.programcode, programname
				FROM students 
				INNER JOIN programs
				ON students.programcode = programs.programcode
				WHERE name LIKE '%$keyword%'
				ORDER BY matrixno ASC";
}
else{//first time page load, list all
	$sql = "SELECT students.id, matrixno, name, address, 
		students.programcode, programname
		FROM students 
		INNER JOIN programs
		ON students.programcode = programs.programcode 
		ORDER BY matrixno ASC";
}


//execute sql commands that will return result set
$result = mysqli_query($conn, $sql);
//echo "Sql error:".mysqli_error($conn);

//check records fetched available
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Matrix</th>
			<th>Name</th>
			<th>Program</th>
			<th>Tasks</th>
		</tr>
	<?php
    while($row = mysqli_fetch_assoc($result)) {
    	$id=$row['id'];
    	echo "<tr>";
        echo "<td> $id </td>";
        echo "<td> ".$row['matrixno'] ."</td>";
        echo "<td> ".$row['name'] ."</td>";
        echo "<td> ".$row['programname'] ."</td>";


        echo "<td> ";
        //show button
        echo "<a href='formshow.php?x=$id' ".
    			"class='btn btn-success btn-sm'>".
    			"<i class='fas fa-file-alt'></i>".
    			"</a> &nbsp;";
        //edit button
        echo "<a href='formupdate.php?x=$id' ".
    			"class='btn btn-warning btn-sm'>".
    			"<i class='fas fa-pen-square'></i>".
    			"</a> &nbsp;";
        //delete button
    	$name=$row['name'];
        echo "<button class='btn btn-danger btn-sm'".
        		"onclick='confirmdelete($id)'>".
    			"<i class='fas fa-trash'></i>".
    			"</button> &nbsp;";
        echo "</td></tr>\n";
    }
    ?>
	</table>
	<script type="text/javascript">
		function confirmdelete(id){
			var message="Are you sure to DELETE the record(id:"+id+")?"
			var r= confirm(message);
			if (r==true){
				//redirect if user press yes
				window.location.href = "delete.php?x="+id;
        //document.getElementById('myForm').submit();
			}
		}
	</script>
    <?php
} 
else {
    echo "Search not found";
}

//purge dbconnect
mysqli_close($conn);
?>

<?php
	include "include/footer.template.php";
?>