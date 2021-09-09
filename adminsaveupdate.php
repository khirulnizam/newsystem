<?php
include "adminchecksession.php";
//adminsaveupdate.php
if(isset($_FILES["imagetoupload"])) {
    include "include/dbconnect.php";

    //proses upload gambar
    $target_dir = "usersprofileimages/";//folder to store images

    //new file rename with the target directory folder
    $target_file = $target_dir.date('m-d-Y-H-i-s')."-".
            basename($_FILES["imagetoupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imagetoupload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size not more than 500KB
    if ($_FILES["imagetoupload"]["size"] > 500000) {
        echo "Sorry, your file cannot be more than 500KB! ";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" 
    && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Image file not recognised.";
    // if everything is ok, try to upload file
    } else {
        //imej penuhi kriteria
        if (move_uploaded_file($_FILES["imagetoupload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["imagetoupload"]["name"])). " has been uploaded.";
            $imejprofile=basename( $_FILES["imagetoupload"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //simpan rekod
    //fetch new data from update form
    $username=$_POST['username'];
    $fullname=$_POST['fullname'];
    $email=$_SESSION['email'];
    //$profileimage=$imejprofile;
    //sql command to send update data to db
    $sql="UPDATE users SET 
        username='$username',
        fullname='$fullname',
        profileimage='$target_file'
        WHERE email='$email' ";
    $result=mysqli_query($conn, $sql);
    echo "$sql : error ".mysqli_error($conn);

if($result==true){//berjaya simpan rekod staf baharu
    echo "Saved update admin profile $fullname<br>";
    if($imejprofile!=null){
        //kalau ada gambar sistem papar
        $gambar=$target_dir.$imejprofile;
        //echo "<img src='$gambar' width='50%'>";

        //reset session with new data update
        //$_SESSION['email']=$rec['email'];
            $_SESSION['fullname']=$fullname;
            $_SESSION['username']=$username;
            $_SESSION['profileimage']=$target_file;
    }
    header("location:admindashboard.php?success=Update saved");
}
else{
    //failed to save update
    //redirect with fail noti
    header("location:admindashboard.php?error=Fail to save update");
}
?>