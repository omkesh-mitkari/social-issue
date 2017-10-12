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
$sql1="SELECT * from post where post_id=$post_id";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$userid=$row1['user_id'];
$sql2="SELECT username from user where user_id=$userid";
		$result2=$conn->query($sql2);
		$row2=$result2->fetch_assoc();
		$username=$row2['username'];
			$imagedir="users/$username/images/";
			$imgsrc=$row1['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";

echo'
<html>
<head>
<link href="details1.css" rel="stylesheet">
</head>
<body>

<div id="container">
  <div id="image">
  <center><img src=';echo'"';echo $imagedir;echo '"';echo'></center></div>
  <div id="stuff">
    <a href=addcomment.php';echo' role="button">';echo'<button>Add Comment</button></a>
    <strong>';
	$sql1="SELECT count(*) as count from comments where post_id=$post_id";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_assoc();
	echo $row1["count"];
	echo'</strong> Comments<br><strong>';
	$sql2="SELECT count(*) as count1 from upvote where p_id=$post_id";
	$result2=$conn->query($sql2);
	$row2=$result2->fetch_assoc();
	echo $row2["count1"];
	echo'</strong> Upvotes<br><strong>';
	$sql3="SELECT count(*) as count2 from downvote where p_id=$post_id";
	$result3=$conn->query($sql3);
	$row3=$result3->fetch_assoc();
	echo $row3["count2"];
	echo'</strong> Downvotes<br><strong>';
	echo'
  </div>
  
  <div id="comments">';
  $sql4="SELECT * from comments where post_id=$post_id";
	$result4=$conn->query($sql4);
	
	while($row4=$result4->fetch_assoc())
	{
		echo $row4["comment"];
		echo '<br>';
	}
	echo'
  </div>
</div>
</body>
</html>';
?>