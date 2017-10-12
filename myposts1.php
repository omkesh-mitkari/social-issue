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

if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$imagedir="users/$username/images/";
		echo $user_id;
		$imgsrc=$row['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		$title=$row['title'];
		$description=$row['description'];
		$location=$row['location'];
		$timecreated=$row['TimeCreated'];
		echo'<div class="container">
<div class="row">
  <div class="span12">
    <div class="row">
      <div class="span8">
        <h4><strong><a href="#">';echo $title; echo'</a></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="span2">
        <a href="#" class="thumbnail">
            <img src=';echo '"';echo $imagedir;echo'"';echo'height="200" width="300">
        </a>
      </div>
      <div class="span10">      
        <p>';
        echo $description;  
        echo '</p>
      </div>
    </div>
    <div class="row">
      <div class="span8">
        <p></p>
        <p>
          | <i class="icon-calendar"></i>'; echo $timecreated;
          echo'| <i class="icon-comment"></i> <a href=';echo'"';echo 'comments.php?comments=';echo $row['post_id'];echo'"';echo'>Comments</a>
          | <i class="icon-share"></i> <a href="#">39 Shares</a>
        </p>
      </div>
    </div>
  </div>
</div>
<hr>';
	}
}
?>