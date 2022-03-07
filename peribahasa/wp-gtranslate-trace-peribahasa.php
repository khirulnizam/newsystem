<?php
//Kesan peribahasa - terjemah kepada literal - translate ayat guna Google
include "config.php";
include "gtranslate.php";
//include "log.php";
include "listtoken.php";
	//$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";
	//$sampletext="ali adalah seorang yang ringan tulang. beliau juga baik hati dan juga ringan mulut";
	//$searchentri=$sampletext;
	$searchentri=$_GET["txt"];
?>
<html>
<head>
<title>Cari peribahasa dari teks Melayu - terjemahan Google Translate</title>
</head>

<body bgcolor="#C8FCC2">

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
	  echo "Original: <b>".$searchentri."</b><br>";
	  echo "Google Translate: ".gtranslate($searchentri)."<hr>";

	//store the proverbs traced
	$proverblist=array();
	$proverbmeaninglist=array();
	//compare by two words
	//only for idioms
	for($i=0; $i<$wcount-1; $i++){//ignore last word because has no pair

		// use look ahead to produce combine word with 2 word
		$words2=$wlist[$i]." ".$wlist[$i+1];
		$searchidioms="SELECT * FROM a_senarai_e WHERE " .
				"entri = '$words2' ";
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
			$proverblist[]=$words2;
			$proverbmeaninglist[]=strtolower(str_replace(".","",$rekod['makna']));

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
					//register the first proverb
					array_push($proverblist,$words2);
					array_push($proverbmeaninglist,strtolower(str_replace(".","",$rekod['makna'])));
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
		$searchidioms="SELECT * FROM a_senarai_e WHERE " .
				"entri LIKE '$words3%' ";
		//echo $searchidioms."<br>";
		$qr=mysqli_query($db,$searchidioms);
  		if($qr==false){
			echo ("Query cannot be executed!<br>");
			//echo ($searchidioms."<br>");
			//echo ("SQL Error : ".mysqli_error($db)."<br>");
  		}//sql error
  		if(mysqli_num_rows($qr)==1){//1 peribahasa detected from the word pair
			//echo ("No record by that name: $searchName...<br>");
			//echo "Simpulan bahasa dikesan: $words2<br>";
			$rekod=mysqli_fetch_array($qr);
            		echo "<b>&nbsp;".$rekod['entri']."</b> <br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp; ".$rekod['makna']." <br>";

			$proverblist[]=$words3;
			$proverbmeaninglist[]=strtolower(str_replace(".","",$rekod['makna']));

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

				$proverblist[]=$words2;
				$proverbmeaninglist[]=strtolower(str_replace(".","",$rekod['makna']));
	            }else{
					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) ".$rekod['makna']." <br>";
	            }
			echo "<hr>";
	            $c++;
			}//print all peribahasa dikesan
        }//more than 1 proverb detected
	}//end of wordlist

//print_r($proverblist);
	
	if(count($proverblist)>0){
		echo "Original: <b>".$searchentri."</b><br>";
	  	echo "<div style='background-color:#FFD400'><br>";
		echo "Google Translate: ".gtranslate($searchentri)."<br><br>";
		echo "</div>";
		$teksbaru=$searchentri;
		for ($i=0;$i<count($proverblist);$i++){
			//$teksbaru=str_replace($proverblist[$i],"( ".$proverbmeaninglist[$i]." )",$teksbaru);
			$teksbaru=str_replace($proverblist[$i], $proverbmeaninglist[$i],$teksbaru);

			//echo "$teksbaru <br>";
		}
		
		echo "<hr>";
		echo "Teks baru selepas pengecaman simpulan / peribahasa<br>";
		
	  	echo "<div style='background-color:#FFD400'><br>";
		echo "$teksbaru <br><br>";
		echo "</div>";
		
		echo "Terjemahan Google Translate selepas tapisan simpulan / peribahasa<br>";
		echo "<div style='background-color:#FFD400'><br>";
		echo gtranslate($teksbaru)."<br><br>";
		echo "</div>";
		
	}//peribahasa dikesan
	else{
		echo "<hr>";
		echo "Maaf, tiada simpulan / peribahasa berjaya dikesan<br>";
	}//no proverb detected

}//end input NOT NULL


?>
<hr>
Developer: <b>blog.kerul.net</b><br>

<?php
/*

*/
//include "donate.php";
//include "adsense.php";
//include "endtimex.php";
?>
</body>
</html>

