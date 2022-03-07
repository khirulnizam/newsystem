<?php
include "config.php";
?>
<html>
<head>
<title>Cari peribahasa </title>
</head>

<body>

Cari peribahasa: &nbsp;&nbsp;
<form method="get" target="">
	<input type="text" name="txtsearch">
	<input type="submit" value="cari">
</form>



<?php
  $searchentri=$_GET['txtsearch'];
  if($searchentri==NULL){
		echo "Sila masukkan peribahasa carian dalam kotak teks di atas, makasih...";
		echo "</body></html>";
		exit();
  }



  //Create SQL query, add WHERE clause to narrow listing
  $query="SELECT entri, makna FROM a_senarai
 		  WHERE entri LIKE '%$searchentri%' ORDER BY entri ASC";

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

<?php
include "endtimex.php";

?>
</body>
</html>
