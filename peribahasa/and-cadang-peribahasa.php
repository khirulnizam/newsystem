<?php
include "config.php";
include "log.php";
include "listtoken.php";
	$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";
	$searchentri=$_GET["txt"];
?>
<html>
<head>
<title>PERIBAHASA SCANNER: Cadangkan peribahasa dari teks Melayu - capaian Mobile</title>
<?php
//include "analytics.php";
?>
</head>
<body bgcolor="#C8FCC2">
<?php
  if($searchentri==""){
	echo "Sila masukkan maksud peribahasa, terima kasih...<br>";
	//echo " $searchentri <br>";
	/*echo "</body>".
		 "</html>";*/
  }// end input NULL
  else{
  	$searchidioms="SELECT * FROM a_peribahasa_e WHERE " .
					"MATCH(makna,contoh) AGAINST ('$searchentri'  IN NATURAL LANGUAGE MODE) ";
	//echo $searchidioms."<br>";
	$qr=mysqli_query($db,$searchidioms);
	if($qr==false){
		//echo ("Query cannot be executed!<br>");
		//echo ($searchidioms."<br>");
		//echo ("SQL Error : ".mysqli_error($db)."<br>");
	}//sql error
	else{
		if(mysqli_num_rows($qr)>0){//one meaning detected
			echo ("Berikut cadangan peribahasa yang sesuai berdasarkan<br>");
			echo ("   kata kunci:<b> $searchentri </b><hr>");
			$c=1;
			while ($rekod=mysqli_fetch_array($qr)){//redo to other records

	            	echo "<b>&nbsp; $c ) ".$rekod['entri']." </b><br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Makna: ".$rekod['makna']." <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contoh: ".$rekod['contoh']." <hr>";
	            $c++;
	            if ($c==11){
	            	break;
	            }
			}//print all semua cadangan
		}//only one meaning
		else{
			echo ("Harap maaf, sistem tidak dapat mencadangkan peribahasa yang sesuai!<br>");
		}
	}//end no sql error
  }//end not NULL



  echo "<br>";
  echo "Teks asal: ".$_GET["txt"]."<br>";

?>
<hr>


<a href="https://www.facebook.com/KerulNet"><img src="peribahasa-google-play-150.png"></a><br>
<a href="https://www.facebook.com/KerulNet">hubungi kami di Facebook</a><br>

<?php
//include "donate.php";
//include "adsense.php";
include "endtimex.php";
?>

</body>
</html>
