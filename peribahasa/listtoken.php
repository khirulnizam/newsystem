<?php
/*
 * Created on May 3, 2012
 *
 * Author: Khirulnizam Abd Rahman
 * http://kerul.net
 */

 //to print array of strings in $wlist

 function listtoken($wlist){
 	//print tokenized words
 	$wcount=count($wlist);
	echo "Token Perkataan: bil $wcount <br>";
	for ($i=0; $i<$wcount; $i++) {
    	echo ($wlist[$i]."<br>");
	}
 }
?>
