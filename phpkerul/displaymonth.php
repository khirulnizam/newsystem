Month 
<select name="month">
<?php
	//values in array
	$month=array('Jan', 'Feb', 'Mar', 'Apr', 'May','June',
			'July','August','September','October',
			'November','December');
	foreach($month as $m){//iterate array $m
		echo "<option value=$m>";
		echo "$m";
		echo "</option>\n";
	}
?>
</select>