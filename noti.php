<?php
if(isset($_GET['error'])){
    $error=$_GET['error'];
    echo "<div class='alert alert-warning'>
        $error
    </div>";
}

if(isset($_GET['success'])){
    $success=$_GET['success'];
    echo "<div class='alert alert-success'>
        $success
    </div>";
}

?>