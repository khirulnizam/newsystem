<?php
include "starttimex.php";
/*
 * Created on Apr 24, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 $db=mysqli_connect("localhost",
 "root",
 "",
 "newsystem");
//Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error($db));
    exit();
}
?>
