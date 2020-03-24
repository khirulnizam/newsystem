<?php
	include "include/header.template.php";
	//getbootstrap.com
?>
<div class="float-right">
	<form method="get" action=""
		class="form-inline">
		<input type="text" name="keyword" 
		class="form-control"
		placeholder="Enter student name here">
		<button type="submit" class ="btn btn-primary">
		Search</button>
	</form>
</div>
<?php
//filename search.php
//use the previous settings
include "include/dbconnect.php";

//embed SQL commands
if(isset($_GET['keyword'])){//based on keyword entered
	$keyword=$_GET['keyword'];
	$sql = "SELECT id, matrixno, name, address, dob 
				FROM students 
				WHERE name LIKE '%$keyword%'";
}
else{//first time page load, list all
	$sql = "SELECT id, matrixno, name, address, dob 
				FROM students ";
}


//execute sql commands that will return result set
$result = mysqli_query($conn, $sql);

//check records fetched available
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Matrix</th>
			<th>Name</th>
			<th>DOB</th>
			<th>Address</th>
		</tr>
	<?php
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
        echo "<td> ".$row['id']."</td>";
        echo "<td> ".$row['matrixno'] ."</td>";
        echo "<td> ".$row['name'] ."</td>";
        echo "<td> ".$row['dob'] ."</td>";
        echo "<td> ".$row['address']."</td>";
        echo "</tr>\n";
    }
    ?>
	</table>
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