<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="kmosminiproject";

$conn = new mysqli($servername, $username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection failed!".$conn->connect_error);
}

$title=mysqli_real_escape_string($conn,$_POST['title']);
$desc=mysqli_real_escape_string($conn,$_POST['description']);
$location=mysqli_real_escape_string($conn,$_POST['location']);
$type=mysqli_real_escape_string($conn,$_POST['type']);
$user_id=$_SESSION["user_id"];
$email=$_SESSION["username"];
$imagedir="users/$email/images/";
$query="INSERT INTO post(title,description,location,user_id,type) values ('$title','$desc','$location','$user_id','$type')";
$result=mysqli_query($conn,$query);
$getpostID="SELECT post_id from post order by post_id desc LIMIT 1";
$postIDresult=mysqli_query($conn,$getpostID);
$IDRow=mysqli_fetch_assoc($postIDresult);
$ID=$IDRow['post_id'];

$target_file=$imagedir.basename($_FILES["image"]["name"]);
echo "Target file is: $target_file";
$uploadOk=1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo $imageFileType;

$target_file=$imagedir.$ID.".".$imageFileType;
echo $target_file;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
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

 // Check file size
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if($uploadOk==0){
	echo "Sorry, your file was not uploaded.";
}
else
{
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



$conn->close();
?>