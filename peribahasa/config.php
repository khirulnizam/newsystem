<?php
include "starttimex.php";
/*
 * Created on Apr 24, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 $db=mysqli_connect("localhost","khirulni_joom792","131jlnpch7","khirulni_joom792");
//Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}
/*
	public $user = 'khirulni_joom792';
	public $password = '8lodP19ydS';
	public $db = 'khirulni_joom792';
*/
?>
