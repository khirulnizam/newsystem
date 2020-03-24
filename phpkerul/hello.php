<html>
<head>
<title> Web Programming </title>
</head>
<body>

	<?php
	/* Author: Khirulnizam
		website: khirulnizam.com
		Program description: to show echo, comments & variables in PHP
	*/
		$txtname='enKerul';//store name in string
		$num1=23;//store number1 integer

		echo "Welcome to PHP, ".$txtname."<br>\n\n"; 
		echo "Age: $num1 <br>";//display age

		echo "Assalamualaikum<br>";
		echo "Date for today : ";
		// set the default timezone to use
		date_default_timezone_set('Asia/Kuala_Lumpur');
		echo date("d-M-Y");
	?>
</body>
</html>