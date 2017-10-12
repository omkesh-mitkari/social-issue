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

$sql1 = "SELECT * from authority where email='$email'";
$result1=mysqli_query($conn,$sql1);

if($result1->num_rows>0)
{
	$row1=mysqli_fetch_assoc($result1);
	$salt=$row1['salt'];
	$prehash=$row1['password'];

	$hash = hash_pbkdf2("sha256", $pwd, $salt, $iterations, 64);
	if($hash==$prehash)
	{
	$sql = "SELECT * FROM authority where email='$email'";
	$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0) {
			$query="SELECT * FROM authority where email='$email'";
			$session=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($session);
			$_SESSION["user_id"]=$row["a_id"];
			$_SESSION["username"]=$row["email"];
			$cuid=$_SESSION["user_id"];
			$cloc=$row["location"];
			echo $cuid;
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
echo'
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Authority</a>
 
    
  
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">';
		 $sql2="SELECT* from authority where a_id=$cuid";
		 $result2=$conn->query($sql2);
		 $row2=$result2->fetch_assoc();
		 echo $row2["name"];echo'</h4>
        
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Authority,Contribute by solving issues </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>';echo $row2["location"];echo'</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>';echo $row2["party"];echo'</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
		<form action="chata.php">
          <button  type = "submit" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
		  </form>
         
         
           
         
         
         
          
        </div>      
      </div>
      <br>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">';
	$sql3="SELECT* from post where location='$cloc'";
		 $result3=$conn->query($sql3);
    
      
      
      while($row3=$result3->fetch_assoc())
		 {
      echo'
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        
        <span class="w3-right w3-opacity">';echo $row3["TimeCreated"];echo'</span>
        <h4>';echo $row3["title"];echo'</h4><br>
        <hr class="w3-clear">
        <p>';echo $row3["description"];echo '</p> 
		<a href=';echo'"';echo 'details.php?post=';echo $row3['post_id'];echo'"'; echo' role="button">';echo'<button>DETAILS</button></a>
		
		 </div>';} 

      echo'
      
    <!-- End Middle Column -->
    </div>
    
   
      
    
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>';
?>
