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
$user_id=$_SESSION["user_id"];
$sql1="SELECT username from user where user_id=$user_id";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$username=$row1['username'];
$sql="SELECT * from post where user_id=$user_id order by post_id desc";
$result=$conn->query($sql);



echo'<!DOCTYPE html>
<html>
<title>My Posts</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="profile1.css">
<link rel="stylesheet" href="profile2.css">
<link rel="stylesheet" href="profile3.css">
<link rel="stylesheet" href="profile4.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">';
echo'<form>
  <input type="button" value="Go back!" onclick="history.back(-1)">
  </input>
</form>';

if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$imagedir="users/$username/images/";
		$imgsrc=$row['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		$title=$row['title'];
		$description=$row['description'];
		$location=$row['location'];
		$timecreated=$row['TimeCreated'];
    
   
     
      echo'
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity">';echo $timecreated;echo'</span>
        <h4>';echo $title;echo'</h4><br>
        <hr class="w3-clear">
        <p>';echo $description;echo'</p>
        <a href=';echo'"';echo 'editpost.php?post=';echo $row['post_id'];echo'"'; echo' role="button"><button>Edit</button></a>
		<a href=';echo'"';echo 'delete.php?delete=';echo $row['post_id'];echo'"'; echo' role="button"><button>Delete</button></a>
		<a href=';echo'"';echo 'details.php?post=';echo $row['post_id'];echo'"'; echo' role="button"><button>Details</button></a>
      </div>  

    <!-- End Middle Column -->
    </div>';
    }
   
      
}
echo'    

</body>
</html>';
?> 
