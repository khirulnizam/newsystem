<?php
    include "include/dbconnect.php";
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email!=null && $password!=null){
        $sql="SELECT username, password, email, fullname, 
        accesslevel, profileimage FROM users
        WHERE email='$email' AND password=md5('$password')";
        //run sql
        $rs=mysqli_query($conn, $sql);
        //echo $sql;
        //echo mysqli_error($conn);
        //matching email & password
        if(mysqli_num_rows($rs)==1){
            //start session
            session_start();
            $rec=mysqli_fetch_assoc($rs);
            $username=$rec['username'];
            //session data
            $_SESSION['email']=$rec['email'];
            $_SESSION['fullname']=$rec['fullname'];
            $_SESSION['username']=$rec['username'];
            $_SESSION['profileimage']=$rec['profileimage'];
            $_SESSION['accesslevel']=$rec['accesslevel'];

            //redirect to respective accesslevel
            if($_SESSION['accesslevel']=='admin'){
                //redirect to admin dashboard
                header ("location:admindashboard.php");
            }
            else if($_SESSION['accesslevel']=='staff'){
                //redirect to staff dashboard
                header ("location:staffdashboard.php");
            }
            else if($_SESSION['accesslevel']=='guest'){
                //redirect to guest dashboard
                header ("location:guestdashboard.php");
            }
            //echo "Welcome user $username";
        }//no found matching
        else{
            //redirect to login
            header ("location:login.php?error=Email and password not valid");
        }
    }


?>