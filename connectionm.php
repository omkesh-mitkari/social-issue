
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kmosminiproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
$fullname = $_POST['name']; 
$party = $_POST['agency']; 
$email = $_POST['email']; 
$password = $_POST['password'];
$directory="users/$email";
$imagedir="users/$email/images";
$location=$_POST['location'];
$iterations = 10000;
// Generate a random IV using openssl_random_pseudo_bytes()
// random_bytes() or another suitable source of randomness
$salt = uniqid(mt_rand(), true);
$hash = hash_pbkdf2("sha256", $password, $salt, $iterations, 64);


if(!is_dir($directory)){
	mkdir($directory,0755);
	mkdir($imagedir,0755);
	$query = "INSERT INTO media (name,agency,email,password,salt,location) VALUES ('$fullname','$party','$email','$hash','$salt','$location')"; 

if($conn->query($query))
{
	echo "Your Account has been created Successfully";
}
else
{
	echo "Error: " . $query . "<br>" . $conn->error;
	
}

}
else
{
	echo "An account with this email ID already exists. Try logging in.";
}

$conn->close();


?>