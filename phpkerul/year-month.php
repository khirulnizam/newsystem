Year <br>
<?php
	//iterate $y
	for ($y=2020; $y>=1900;$y--){
	    echo "$y<br>";
	}
?>
<br>

Month
<?php
	//values in array
	$month=array('Jan', 'Feb', 'Mar', 'Apr', 'May','June');
	foreach($month as $m){//iterate array $m
		echo "$m<br>";
	}
?>