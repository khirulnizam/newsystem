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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/themes/peribahasa2.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="js/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="js/jquery-1.11.1.min.js"></script> 
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
<?php
//include "analytics.php";
?>
</head>
<body bgcolor="#C8FCC2">
<!-- main page -->
<div data-role="page" id="carian-peribahasa">
	<!-- header -->
	<div data-role="header" data-position="fixed">
		<h1>Cadangan Peribahasa</h1>
	</div>
	
	<!-- content -->
	<div role="main" class="ui-content">
		<?php
  if($searchentri==""){
	echo "Sila masukkan maksud peribahasa, terima kasih...<br>";
	//echo " $searchentri <br>";
	/*echo "</body>".
		 "</html>";*/
  }// end input NULL
  else{
  	$searchidioms="SELECT * FROM a_senarai WHERE " .
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
<a href="http://KERUL.net">Dibangunkan oleh KERUL.net</a><br>

<a href="https://www.facebook.com/pages/blogkerulnet/201678276509766"><img src="peribahasa-google-play-150.png"></a><br>
<a href="https://www.facebook.com/pages/blogkerulnet/201678276509766">hubungi kami di Facebook</a><br>


<?php
//include "donate.php";
//include "adsense.php";
include "endtimex.php";
?>

	</div><!-- end content -->
	
	<!-- footer -->
	<div data-role="footer">
		Pembangun KERUL.net
	</div><!-- end footer -->
</div><!-- end of Cadang Peribahasa -->

</body>
</html>
