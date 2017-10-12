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

$post_id=$_GET["post"];
$title=$_POST["title"];
$description=$_POST["description"];
$location=$_POST["location"];
$sql1="UPDATE post SET title = '$title',description = '$description',location = '$location' where post_id = $post_id";
if($conn->query($sql1) === TRUE)
{
	echo "Your Post Edited Successfully";
}
$conn->close();
?>