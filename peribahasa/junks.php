<?php
/*
 * Created on Apr 25, 2012
 *
 * Author: Khirulnizam Abd Rahman
 * http://kerul.net
 */
?>
<!-- STATRT Google Translate API -->

	<table width="60%" border=1>
		<tr><td width="50%">Teks Melayu</td><td width="50%">Terjemahan dalam Inggeris (Google Translate)</td></tr>
		<tr> <td> <div name="teksmelayu" id="teksmelayu"> <?php echo $searchentri; ?></div></td>
		<td><div name="goog-trans-control" id="goog-trans-control"> </div></td></tr>
	</table>

	<script>
		function googleSectionalElementInit() {
  			new google.translate.SectionalElement({
    		sectionalNodeClassName: 'teksmelayu',
    		controlNodeClassName: 'goog-trans-control',
    		background: '#f4fa58'
  			}, 'google_sectional_element');
		}
	</script>
	<script src="//translate.google.com/translate_a/element.js?cb=googleSectionalElementInit&ug=section&hl=ms"></script>
  <!-- END Google Translate API -->

  <?php

  //()@!|{}[]*\'\"<>
  ?>
