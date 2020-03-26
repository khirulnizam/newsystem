<?php
	include "include/header.template.php";
	//getbootstrap.com
?>
<h3>Search Proceedings</h3>
<div class="float-right">
	<form method="get" action=""
		class="form-inline">
		<input type="text" name="keyword" 
		class="form-control"
		placeholder="Search proceeding title here">
		<button type="submit" class ="btn btn-primary">
		Search</button>
	</form>
</div>
<?php
//filename searchProceeding.php
//use the previous settings
include "include/dbconnect.php";

//embed SQL commands
if(isset($_GET['keyword'])){//based on keyword entered
	$keyword=$_GET['keyword'];
	$sql = "SELECT id,title, author, institutions.name FROM proceedings 
	INNER JOIN institutions
	ON proceedings.institution_code = institutions.institution_code 
	WHERE title LIKE '%$keyword%' ";
	
}
else{//first time page load, list all
	$sql = "SELECT id,title, author, institutions.name FROM proceedings 
	INNER JOIN institutions
	ON proceedings.institution_code = institutions.institution_code  ";
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
			<th>Title</th>
			<th>Author</th>
			<th>Institution</th>
		</tr>
	<?php
    while($row = mysqli_fetch_assoc($result)) {
    	//display records
    	echo "<tr>";
        echo "<td> ".$row['id']."</td>";
        echo "<td> ".$row['title'] ."</td>";
        echo "<td> ".$row['author'] ."</td>";
        echo "<td> ".$row['name'] ."</td>";
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