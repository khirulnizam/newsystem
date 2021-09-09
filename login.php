<?php include "include/header.template.php"; ?>
<h1>Login form</h1>
<?php include "noti.php"; ?>
<form action="verifyuser.php" method="post">
    Email (Eg: admin@gmail.com)
    <input type="text" name="email" required
    class="form-control">
    Password (Eg: admin123)
    <input type="password" name="password" required
    class="form-control">
    <button type="submit"
    class="btn btn-primary">Login</button>
</form>

<?php include "include/footer.template.php"; ?>