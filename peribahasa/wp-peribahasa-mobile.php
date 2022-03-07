<?php

include "config.php";

//include "log.php";

include "listtoken.php";

	$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";

	$searchentri=$_GET["txt"];

?>

<html>

<head>

<title>Peribahas SCANNer</title>

<?php

//include "analytics.php";

?>

</head>



  <body bgcolor="#C8FCC2">



<?php

  if($searchentri==""){

	echo "Please key-in some Malay text that contains peribahasa ...<br>";

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

	  echo "Original text: <b>".$_GET["txt"]."</b><hr>";

	



	//compare by two words

	//only for idioms

	for($i=0; $i<$wcount-1; $i++){//ignore last word because has no pair



		// use look ahead to produce combine word with 2 word

		$words2=$wlist[$i]." ".$wlist[$i+1];

		$searchidioms="SELECT * FROM a_senarai_e WHERE " .

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

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) Meaning in Malay".$rekod['makna']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English proverb: ".$rekod['englishproverb']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English meaning: ".$rekod['englishmeaning']." <br>";

	            }else{

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) Meaning in Malay".$rekod['makna']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English proverb: ".$rekod['englishproverb']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English meaning: ".$rekod['englishmeaning']." <br>";

					

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

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) Meaning in Malay".$rekod['makna']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English proverb: ".$rekod['englishproverb']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English meaning: ".$rekod['englishmeaning']." <br>";

	            }else{

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) Meaning in Malay".$rekod['makna']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English proverb: ".$rekod['englishproverb']." <br>";

					echo "&nbsp;&nbsp;&nbsp;&nbsp; $c) English meaning: ".$rekod['englishmeaning']." <br>";

	            }

			echo "<hr>";

	            $c++;

			}//print all peribahasa dikesan

        }//more than 1 proverb detected

}//end of wordlist



  }//end input NOT NULL





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



