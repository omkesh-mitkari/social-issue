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
$p_id=$_GET["delete"];

$sql1="DELETE from post where post_id=$p_id";
$result1=$conn->query($sql1);

	echo 'Your Post has been Successfully Deleted';


?>


          

