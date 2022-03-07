<?php
include "config.php";
//include "log.php";
include "listtoken.php";
	$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";
	$searchentri=$_GET["txt"];
?>
<html>
<head>
<title>Cari peribahasa dari teks Melayu - capaian Mobile</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/themes/peribahasa2.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<?php
//include "analytics.php";
?>
</head>

<body bgcolor="#C8FCC2">
<!-- main page -->
<div data-role="page" id="carian-peribahasa">
	<!-- header -->
	<div data-role="header" data-position="fixed">
		<h1>Kesan Peribahasa</h1>
	</div>
	
	<!-- content -->
	<div role="main" class="ui-content">
		<?php
  if($searchentri==""){
	echo "Sila masukkan teks Melayu dalam kotak teks di atas, terima kasih...<br>";
	echo " $searchentri <br>";
	/*echo "</body>".
		 "</html>";*/
  }// end input NULL
  else{//input NOT NULL
  	//STEP 1: TOkenize
  	//word counted
  	$wcount=0;
  	$wlist=array();
  	$tok = strtok($searchentri, " \n\t/?,.()@!|{}[]*\'\"<>");//regular expression of the delimiter
  	while ($tok != false) {
    	$wlist[$wcount]=$tok;
    	$tok = strtok(" \n\t/?,.()@!|{}[]*\'\"<>");
    	$wcount++;
	}
	//print all tokens
	//listtoken($wlist);
	  echo "Pengesan Peribahasa<br>Teks asal: <b>".$_GET["txt"]."</b><hr>";
	

	//compare by two words
	//only for idioms
	for($i=0; $i<$wcount-1; $i++){//ignore last word because has no pair

		// use look ahead to produce combine word with 2 word
		$words2=$wlist[$i]." ".$wlist[$i+1];
		$searchidioms="SELECT * FROM a_peribahasa_e WHERE " .
				"entri LIKE '$words2' ";
		//
		$qr=mysqli_query($db,$searchidioms);
  		if($qr==false){
			echo ("Query cannot be executed!<br>");
			echo ($searchidioms."<br>");
			echo ("SQL Error : ".mysqli_error($db)."<br>");
			exit(1);
  		}//sql error
  		if(mysqli_num_rows($qr)==1){//1 peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			//echo "Simpulan bahasa dikesan: $words2<br>";
			$rekod=mysqli_fetch_array($qr);
            echo "<b>&nbsp;".$rekod['entri']."</b> <br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp; ".$rekod['makna']." <br>";

		}//end of gelintar words
        else if(mysqli_num_rows($qr)>1){//>1 peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			//echo "Simpulan bahasa dikesan: $words2<br>";
	        //echo "&nbsp; $word2 <br>";
	        $c=1;
			while ($rekod=mysqli_fetch_array($qr)){//redo to other records
	            if($c==1){
	            	echo "<b>&nbsp;".$rekod['entri']."</b> <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) ".$rekod['makna']." <br>";
	            }else{
					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) ".$rekod['makna']." <br>";
	            }
	            $c++;
			echo "<hr>";
			}//print all peribahasa dikesan
		}//end of gelintar words
	}//end of wordlist

	//mengesan peribahasa
	for($i=0; $i<$wcount-2; $i++){//ignore last 2 words because has no pair

		// use look ahead to produce combine word with 2 word
		$words3=$wlist[$i]." ".$wlist[$i+1]." ".$wlist[$i+2];
		$searchidioms="SELECT * FROM a_senarai WHERE " .
				"entri LIKE '$words3%' ";
		//echo $searchidioms."<br>";
		$qr=mysqli_query($db,$searchidioms);
  		if($qr==false){
			echo ("Query cannot be executed!<br>");
			echo ($searchidioms."<br>");
			echo ("SQL Error : ".mysqli_error($db)."<br>");
  		}//sql error
  		if(mysqli_num_rows($qr)==1){//1 peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			//echo "Simpulan bahasa dikesan: $words2<br>";
			$rekod=mysqli_fetch_array($qr);
            echo "<b>&nbsp;".$rekod['entri']."</b> <br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp; ".$rekod['makna']." <br>";

		}//1 proverb detected
        else if(mysqli_num_rows($qr)>1){//>1 peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			//echo "Simpulan bahasa dikesan: $words2<br>";
	        //echo "&nbsp; $word2 <br>";
	        $c=1;
			while ($rekod=mysqli_fetch_array($qr)){//redo to other records
	            if($c==1){
	            	echo "<b>&nbsp;".$rekod['entri']."</b> <br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) ".$rekod['makna']." <br>";
	            }else{
					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) ".$rekod['makna']." <br>";
	            }
			echo "<hr>";
	            $c++;
			}//print all peribahasa dikesan
        }//more than 1 proverb detected
}//end of wordlist

  }//end input NOT NULL


?>
<hr>
<a href="http://KERUL.net" class="" target="_blank">Dibangunkan oleh KERUL.net</a><br>

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
</div><!-- end of Kesan Peribahasa -->
</body>
</html>

