<?php
include "config.php";
?>
<html>
<head>
<title>Search by Name</title>
</head>

<body>
<?php
  $searchName=$_GET['txtsearch'];



  //Create SQL query, add WHERE clause to narrow listing
  $query="SELECT entri, makna
 		FROM senarai ORDER BY entri ASC";

  //Execute the query
  $qr=mysqli_query($db,$query);
  if($qr==false){
	echo ("Query cannot be executed!<br>");
	echo ("SQL Error : ".mysqli_error($db));
  }

  //Check the record effected, if no record,
  //display a message
  if(mysqli_num_rows($qr)==0){
	echo ("No record by that name: $searchName...<br>");
  }//end no record
  else{//there is/are record(s)
  ?>
  <b>Senarai semua peribahasa susunan alfabet menaik</b><br>
  <table width="90%"  border="1">
  <tr align="center">
  	<td>Bil</td>
    <td>Peribahasa</td>
    <td>Makna</td>

  </tr>

  <?php
  	$i=0;
	while ($rekod=mysqli_fetch_array($qr)){//redo to other records
		$i++;
  ?>
	<tr>
    <td><?=$i?></td>
    <td><?=$rekod['entri']?></td>
    <td><?=$rekod['makna']?></td>
  	</tr>
  <?php
	}//end of records
  ?>
  </table>
  <?php
  }//end if there are records
?>
</body>
</html>
