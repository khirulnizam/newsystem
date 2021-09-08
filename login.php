<?php include "include/header.template.php"; ?>
<h1>Login form</h1>
<?php
if(isset($_GET['error'])){
    $error=$_GET['error'];
    echo "<div class='alert alert-warning'>
        $error
    </div>";
}

?>
<form action="verifyuser.php" method="post">
    Email 
    <input type="text" name="email" required
    class="form-control">
    Password
    <input type="password" name="password" required
    class="form-control">
    <button type="submit"
    class="btn btn-primary">Login</button>
</form>
<?php include "include/footer.template.php"; ?>