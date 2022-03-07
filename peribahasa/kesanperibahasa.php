<?php
include "config.php";
include "log.php";
include "listtoken.php";
include "iscandidate.php";

	//$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali.";
	$searchentri=$_POST["txtsearch"];
	if($searchentri==""){
		$sampletext="Ali dan Ahmad sudah berpatah arang selepas berebutkan harta peninggalan bapa mereka. Walaupun tanah yang ditinggalkan cuma sekangkang kera, namun masing-masing tidak mahu mengalah. ".
				"Adat peperangan, yang kalah jadi abu, menang jadi arang. Namun bagi sesetengah pihak alang-alang menyeluk pekasam, biar sampai ke pangkal lengan. " .
				"Ayah berpesan supaya pandai-pandai membawa diri demi menjaga air muka keluarga. Jangan menyonteng arang di muka ayah. Jika bertemu dengan orang yang susah, jadilah orang yang baik hati. Apabila berada di tempat orang, jadilah orang yang berguna, jangan jadi anjing kurap. ".
				"Mari kita pergi bulan madu di negara di bawah angin.";
	}
	else{
		$sampletext=$searchentri;
	}
?>
<html>
<head>
<title>Cari peribahasa teks Melayu</title>
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
<img src="peribahasa-melayu-banner.png"><br>
<?php
	//echo "Extract POST: ".extract ($_POST)."<br>";
?>
Cari peribahasa: &nbsp;&nbsp;
<form method="POST" target="">
	<textarea name="txtsearch" rows="10" cols="80"><?php echo $sampletext;?></textarea>
	<br>
	<input type="submit" value="Kesan Peribahasa">
	<br>
</form>

<?php
  if($searchentri==""){
	echo "Sila masukkan teks Melayu dalam kotak teks di atas, terima kasih...<br>";
	echo " $searchentri <br>";
	echo "</body>".
		 "</html>";
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

	//compare by two words
	//only for idioms
	for($i=0; $i<$wcount-1; $i++){//ignore last word because has no pair

		// use look ahead to produce combine word with 2 word
		$words2=$wlist[$i]." ".$wlist[$i+1];
		if(iscandidate($wlist[$i])){//is candidate
			$searchidioms="SELECT * FROM a_senarai WHERE " .
					"entri LIKE '$words2' ";
			//
			$qr=mysqli_query($db,$searchidioms);
			if($qr==false){
				echo ("Query cannot be executed!<br>");
				echo ($searchidioms."<br>");
				echo ("SQL Error : ".mysqli_error($db)."<br>");
			}//sql error
			if(mysqli_num_rows($qr)>0){//peribahasa detected from the word pair
				//echo ("No record by that name: $searchName...<br>");
				echo "Simpulan bahasa dikesan: $words2<br>";
				while ($rekod=mysqli_fetch_array($qr)){//redo to other records
					echo "&nbsp;&nbsp;&nbsp; ".$rekod['entri'].": ".$rekod['makna']." <br>";
				}//print all peribahasa dikesan
			}//end of gelintar words
		}
		
	}//end of wordlist

/* //disabling kesan peribahasa
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
  		if(mysqli_num_rows($qr)>0){//peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			echo "Peribahasa dikesan: $words3<br>";
			while ($rekod=mysqli_fetch_array($qr)){//redo to other records
				echo "&nbsp;&nbsp;&nbsp; ".$rekod['entri'].": ".$rekod['makna']." <br>";
			}//print all peribahasa dikesan
		}//end of gelintar words
	}//end of wordlist
	
*/

  }//end input NOT NULL
?>
<a href="http://KERUL.net">Dibangunkan oleh KERUL.net</a><br>

<a href="https://www.facebook.com/pages/blogkerulnet/201678276509766"><img src="peribahasa-google-play-150.png"></a><br>
<a href="https://www.facebook.com/pages/blogkerulnet/201678276509766">hubungi kami di Facebook</a><br>

<?php
include "endtimex.php";
?>
</body>
</html>
