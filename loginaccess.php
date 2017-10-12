<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kmosminiproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pwd = $_POST['password'];
$email = $_POST['email'];

$iterations = 10000;
// Generate a random IV using openssl_random_pseudo_bytes()
// random_bytes() or another suitable source of randomness
//$salt = openssl_random_pseudo_bytes(16);

$sql1 = "SELECT * from user where username='$email'";
$result1=mysqli_query($conn,$sql1);

if($result1->num_rows>0)
{
	$row1=mysqli_fetch_assoc($result1);
	$salt=$row1['salt'];
	$prehash=$row1['password'];

	$hash = hash_pbkdf2("sha256", $pwd, $salt, $iterations, 64);
	if($hash==$prehash)
	{
	$sql = "SELECT * FROM user where username='$email'";
	$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0) {
			$query="SELECT * FROM user where username='$email'";
			$session=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($session);
			$_SESSION["user_id"]=$row["user_id"];
			$_SESSION["username"]=$row["username"];
			//echo "<script> window.location.assign('Userprofile.php'); </script>";
		} else {
			echo "0 results";
		}
	}
}
else
{
	echo "Account does not exist!";
}
$conn->close();
?>
<html>
<head>
<link rel='stylesheet' href='user_homepage.css' type='text/css'>
</head>
<body>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php
						echo $row["name"];
						?>
					</div>
					<div class="profile-usertitle-job">
						<?php
						echo $row["Location"];
						?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="myposts.php">
							<i class="glyphicon glyphicon-home"></i>
							My Posts </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							See Issues Nearby Me </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Account Setting</a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							My groups </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
	</div>
</div>
<center>
<strong>Powered by <a href="#" target="_blank">WHO BLOCKED IT COMMUNITY</a></strong>
</center>
<br>
<br>
</body>
</html>