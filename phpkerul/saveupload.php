<?php
// source https://www.w3schools.com/php/php_file_upload.asp
$target_dir = "uploads/";
$target_file = $target_dir . 
				basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;//value 1 will save to server later

$imageFileType = strtolower(pathinfo($target_file,
	PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - ".$check["mime"] ."<br>";
        $uploadOk = 1;//value 1 will save to server
    } else {
        echo "File is not an image <br>";
        $uploadOk = 0;//value 0 abort save to server
    }
}



// source https://www.w3schools.com/php/php_file_upload.asp
// Allow only certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && 
	$imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed<br>";
    $uploadOk = 0;
}



// source https://www.w3schools.com/php/php_file_upload.asp
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<hr>";
        echo "<img src='$target_dir".
        	basename( $_FILES["fileToUpload"]["name"]).
        	"' width='100%'>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>