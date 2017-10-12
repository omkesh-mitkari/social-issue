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

if(isset($_GET["upvote"]))
{
	$uu_id=$_SESSION["user_id"];
	$pwd = $_SESSION['password'];
	$email = $_SESSION["username"];
	$p_id=$_GET["upvote"];
	$sql6="SELECT count(*) as total from upvote where p_id=$p_id and u_id=$uu_id";
	$result6=mysqli_query($conn,$sql6);
	$row6=mysqli_fetch_assoc($result6);
	//echo $row6["total"];
	if($row6["total"]==0)
	{
		$sql7="insert into upvote(u_id,p_id) values($uu_id,$p_id)";
		$result7=mysqli_query($conn,$sql7);
	}
}
else if(isset($_GET["downvote"]))
{
	$uu_id=$_SESSION["user_id"];
	$pwd = $_SESSION['password'];
	$email = $_SESSION["username"];
	$p_id=$_GET["downvote"];
	$sql6="SELECT count(*) as total from downvote where p_id=$p_id and u_id=$uu_id";
	$result6=mysqli_query($conn,$sql6);
	$row6=mysqli_fetch_assoc($result6);
	//echo $row6["total"];
	if($row6["total"]==0)
	{
		$sql7="insert into downvote(u_id,p_id) values($uu_id,$p_id)";
		$result7=mysqli_query($conn,$sql7);
	}
}
else if(isset($_GET["resolved"]))
{
	$uu_id=$_SESSION["user_id"];
	$pwd = $_SESSION['password'];
	$email = $_SESSION["username"];
	$p_id=$_GET["resolved"];
	$sql6="SELECT count(*) as total from resolved where p_id=$p_id and u_id=$uu_id";
	$result6=mysqli_query($conn,$sql6);
	$row6=mysqli_fetch_assoc($result6);
	//echo $row6["total"];
	if($row6["total"]==0)
	{
		$sql7="insert into resolved(u_id,p_id) values($uu_id,$p_id)";
		$result7=mysqli_query($conn,$sql7);
	}
}
else 
{
$pwd = $_POST['password'];
$email = $_POST['email'];
}
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
			$_SESSION["password"]=$pwd;
			$cuid=$_SESSION["user_id"];
			$cloc=$row["Location"];
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
<title>User Profile WBI</title>
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

  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>User</a>
 
    
  
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
		 $sql2="SELECT* from user where user_id=$cuid";
		 $result2=$conn->query($sql2);
		 $row2=$result2->fetch_assoc();
		 echo'</h4>';echo $row2["name"];
		 echo'
        
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> User,Contribute by posting issue </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>';echo $cloc;echo '</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
		<form action="chat.php">
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button></form>
          <form action="myposts.php">
          <button class="w3-button w3-block w3-theme-l1 w3-left-align" type="submit"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Posts</button>
			</form>
           <form action="resolved_issue.php">
          <button class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>My Resolved Issues</button>
         </form>
         
          
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
            <div class="w3-container w3-padding">
				<form action="regform.html">
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i>Post</button></form> 
            </div>
          </div>
        </div>
      </div>';
	  
	  $sql3="SELECT* from post where location='$cloc'";
		 $result3=$conn->query($sql3);
		 while($row3=$result3->fetch_assoc())
		 {
      echo' <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        
        <span class="w3-right w3-opacity"></span>';echo $row3["TimeCreated"];echo '
        <h4>';echo $row3["title"];echo'</h4><br>
        <hr class="w3-clear">
        <p>';echo $row3["description"];echo'</p>
		<a href=';echo'"';echo 'details.php?post=';echo $row3['post_id'];echo'"'; echo' role="button">';echo'<button>DETAILS</button></a>
		<a href=';echo'"';echo 'profile.php?upvote=';echo $row3['post_id'];echo'"'; echo' role="button"><button>UPVOTE</button></a>
		 <a href=';echo'"';echo 'profile.php?downvote=';echo $row3['post_id'];echo'"'; echo' role="button"><button>DOWNVOTE</button></a>
		 <a href=';echo'"';echo 'profile.php?resolved=';echo $row3['post_id'];echo'"'; echo' role="button"><button>RESOLVED </button></a><br></div>';}
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
