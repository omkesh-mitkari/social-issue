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


$sql1 = "SELECT * from media where email='$email'";
$result1=mysqli_query($conn,$sql1);

if($result1->num_rows>0)
{
	$row1=mysqli_fetch_assoc($result1);
	$salt=$row1['salt'];
	$prehash=$row1['password'];
	$hash = hash_pbkdf2("sha256", $pwd, $salt, $iterations, 64);
	if($hash==$prehash)
	{
	$sql = "SELECT * FROM media where email='$email'";
	$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0) {
			$query="SELECT * FROM media where email='$email'";
			$session=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($session);
			$_SESSION["user_id"]=$row["m_id"];
			$_SESSION["username"]=$row["email"];
			$_SESSION["password"]=$pwd;
			$cuid=$_SESSION["user_id"];
			$cloc=$row["agency"];
			$clocation=$row["location"];
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



echo'<!DOCTYPE html>
<html>
<title>Media</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="profile1.css">
<link rel="stylesheet" href="profile2.css">
<link rel="stylesheet" href="profile3.css">
<link rel="stylesheet" href="profile4.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">

  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Media</a>
 
    
  
 </div>
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
		 $sql2="SELECT * from media where m_id=$cuid";
		 $result2=$conn->query($sql2);
		 $row2=$result2->fetch_assoc();
		 echo'</h4>';echo $row2["name"];
		 echo'
        
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Media,Contribute by raising issue </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>';echo $cloc;echo '</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
		<form action="chatm.php">
          <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button></form>
           
         
         
          
        </div>      
      </div>
      <br>
      
     
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        
       
       
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
          </div>
        </div>
      </div>';
	  
	  $sql3="SELECT* from post where location='$clocation' and DATE(TimeCreated)<=DATE(DATE_SUB(now(),INTERVAL 10 DAY))";
	  //$sql3="SELECT* from post where location='$clocation' and DATE(TimeCreated)<= DATE(now()) interval -10 day";
		 $result3=$conn->query($sql3);
		 while($row3=$result3->fetch_assoc())
		 {
      echo' <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        
        <span class="w3-right w3-opacity"></span>';echo $row3["TimeCreated"];echo '
        <h4>';echo $row3["title"];echo'</h4><br>
        <hr class="w3-clear">
        <p>';echo $row3["description"];echo'</p>
		<a href=';echo'"';echo 'details.php?post=';echo $row3['post_id'];echo'"'; echo' role="button"><button>DETAILS</button></a></div>';}
		 echo'
      
      
        
      
    <!-- End Middle Column -->
    
    
   
      
    
    
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
