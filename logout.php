<?php 
 session_start();
 if(isset($_SESSION['email'])){
    session_destroy();
    header('location:login.php?success=You have just logged out!');
 }else{
    header('location:login.php?success=You have just logged out!');
 }

?>