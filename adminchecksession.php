<?php
session_start();
//check session if not assigned
if(!isset($_SESSION['accesslevel'])){
    //then redirect to login 
    header("location:login.php?error=You need to login first!");
}
//if user's accesslevel is not admin 
if($_SESSION['accesslevel']!="admin"){
    //then redirect to login 
    header("location:login.php?error=You need to login as admin!");
}
?>

