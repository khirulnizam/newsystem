<?php

include "config.php";

include "log.php";

include "listtoken.php";

	$sampletext="Kalau kamu tunggu sehingga kucing bertanduk sekali pun, Aminah tidak akan hidup kembali...";

	$searchentri=$_GET["txt"];

?>

<html>

<head>

<title>PERIBAHASA Dictionary Windows Phone</title>

<?php

//include "analytics.php";

?>

</head>

<body bgcolor="#C8FCC2">

<?php

  if($searchentri==""){

	//echo "Sila masukkan kata kunci peribahasa, terima kasih...<br>";

	echo "Please key-in the specific keyword...<br>";

	//echo " $searchentri <br>";

	/*echo "</body>".

		 "</html>";*/

  }// end input NULL

  else{

  	$searchidioms="SELECT * FROM a_senarai_e WHERE " .

					"MATCH(entri) AGAINST ('$searchentri'  IN NATURAL LANGUAGE MODE) ";

	//echo $searchidioms."<br>";

	$qr=mysqli_query($db,$searchidioms);

	if($qr==false){

		echo ("Query cannot be executed!<br>");

		echo ($searchidioms."<br>");

		echo ("SQL Error : ".mysqli_error($db)."<br>");

	}//sql error

	else{

		if(mysqli_num_rows($qr)>0){//one meaning detected

			echo ("Below are the peribahasa related to the keyword: ");

			echo ("<b>$searchentri</b> <hr>");

			$c=1;

			while ($rekod=mysqli_fetch_array($qr)){//redo to other records

			

	            	echo "<b>$c)  ".ucfirst($rekod['entri'])." </b><br>";

				echo "Meaning in Malay: ".$rekod['makna']."<br>\n";

				echo "Example: ".$rekod['contoh']."<br>\n";

				echo "<i>English meaning</i>: <i>".$rekod['englishmeaning']."</i><br>\n";

				echo "<i>Equivalent English proverb</i>: <i>".$rekod['englishproverb']."</i><br>\n";

			echo "<hr>";

	            $c++;

	            if ($c==6){

	            	break;

	            }

			}//print all semua cadangan

		}//only one meaning

		else{

			echo ("Sorry, could not detect the peribahasa based on the keyword: <b>$searchentri</b> .<br>");

			echo ("TQvm...<br>");

		}

	}//end no sql error

  }//end not NULL







  echo "<br>";

  echo "Keyword: <b>$searchentri</b><br>";



?>

<hr>

<br>

  Developer: <strong>blog.kerul.net</strong>

<?php

//include "donate.php";

//include "adsense.php";

//include "endtimex.php";

?>



</body>

</html>

