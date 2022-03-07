<?php
/*
 * Created on Apr 25, 2012
 *
 * Author: Khirulnizam Abd Rahman
 * http://kerul.net
 * End Time execution script - and display
 */

   $mtime = microtime();
   $mtime = explode(" ",$mtime);
   $mtime = $mtime[1] + $mtime[0];
   $endtime = $mtime;
   $totaltime = ($endtime - $starttime);
   echo "<br><br><hr>Tempoh masa memproses ".$totaltime." saat";

?>
