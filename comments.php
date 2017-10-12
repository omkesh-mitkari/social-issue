
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
$post_id=$_GET["comments"];
$sql1="SELECT * from comments where post_id=$post_id";
$result1=$conn->query($sql1);


if($result1->num_rows > 0)
{
	while($row1=$result1->fetch_assoc())
	{
		$user_id=$row1['user_id'];
		$sql2="SELECT name from user where user_id=$user_id";
		$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();
    echo '
<html>
<head>
<link rel=';echo 'stylesheet href=';echo 'comments.css type=';echo 'text/css>
</head>
<div class="container">
<div class="row">
</div><!-- /col-sm-12 -->
</div><!-- /row -->
<div class="row">
<div class="col-sm-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->

<div class="col-sm-5">
<div class="panel panel-default">
<div class="panel-heading">
<strong>';


echo  $row2['name'];echo  '</strong> <span class="text-muted">';echo $row1['time'];echo '</span>
</div>
<div class="panel-body">';
echo $row1['comment'];
echo '</div><!-- /panel-body -->
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
</div><!-- /row -->

</div><!-- /container -->';
	}
}
?>