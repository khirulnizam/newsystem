<?php
include "config.php";
include "log.php";
include "listtoken.php";
	$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";
	$searchentri=$_GET["txt"];
?>
<html>
<head>
<title>PERIBAHASA Dictionary - suggest peribahasa from a keyword - Windows Phone</title>
<?php
//include "analytics.php";
?>
</head>
<body bgcolor="#C8FCC2">
<?php
  if($searchentri==""){
	echo "Please key-in a keyword related to the peribahasa<br>";
	//echo " $searchentri <br>";
	/*echo "</body>".
		 "</html>";*/
  }// end input NULL
  else{
  	$searchidioms="SELECT * FROM a_senarai_e WHERE " .
					"MATCH(makna,contoh) AGAINST ('$searchentri'  IN NATURAL LANGUAGE MODE) ";
	//echo $searchidioms."<br>";
	$qr=mysqli_query($db,$searchidioms);
	if($qr==false){
		echo ("Query cannot be executed!<br>");
		echo ($searchidioms."<br>");
		echo ("SQL Error : ".mysqli_error($db)."<br>");
	}//sql error
	else{
		if(mysqli_num_rows($qr)>0){//one meaning detected
			echo ("These are our suggestion based on the keyword : ");
			echo ("<b> $searchentri </b><hr>");
			$c=1;
			while ($rekod=mysqli_fetch_array($qr)){//redo to other records

	            	echo "<b>&nbsp; $c ) ".$rekod['entri']." </b><br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meaning in Malay: ".$rekod['makna']." <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Example in Malay: ".$rekod['contoh']." <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Meaning in English: ".$rekod['englishmeaning']." <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equivalent English Proverb: ".$rekod['englishproverb']." <br>";
	            $c++;
	            if ($c==11){
	            	break;
	            }
			}//print all semua cadangan
		}//only one meaning
		else{
			echo ("Sorry, could not suggest any peribahasa based on the keyword: <b>$searchentri</b> .<br>");
		}
	}//end no sql error
  }//end not NULL



  echo "<br>";
  echo "Original Text: ".$_GET["txt"]."<br>";

?>
<hr>
Developer: <strong>blog.kerul.net</strong>

<?php
//include "donate.php";
//include "adsense.php";
//include "endtimex.php";
?>

</body>
</html>
