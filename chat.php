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

$curuser = $_SESSION["user_id"];
echo $curuser;
$sql1 = "SELECT * from user where user_id=$curuser";
$result1 = $conn->query($sql1);
$row1 = mysqli_fetch_assoc($result1);
$curlocation = $row1["Location"];
$sql2 = "SELECT * from grouptable where Location='$curlocation'";
$result2 = $conn->query($sql2);
$row2 = mysqli_fetch_assoc($result2);
$curgid = $row2["group_id"];
$curgname= $row2["name"];
$sql3 = "SELECT count(*) as total from group_user where group_id=$curgid";
$result3 = $conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$pcount = $row3["total"];
if(isset($_POST["submit"]))
{
	$curmessage = $_POST["message"];
	$sql6 = "Insert into user_chat(g_id,u_id,message) values($curgid,$curuser,'$curmessage')";
	$result6 = $conn->query($sql6);
}
echo'
<html>
<head>
<link rel="stylesheet" type="text/css" href="chat.css">
</head>
<div class="menu">
            <div class="name">';echo $curgname;echo'</div>
            <div class="last">';echo $pcount;echo' Participants</div>
        </div>
    <ol class="chat">';
	
	$sql4 = "SELECT * from user_chat where g_id=$curgid";
	$result4 = $conn->query($sql4);
	if($result4){
		while($row4 = mysqli_fetch_assoc($result4))
		{
			if($row4["u_id"]==$curuser){
				echo'<li class="self">
        
      <div class="msg">
        <p></p>
        <p>';echo $row4["message"];echo'</p>
        <time>';echo $row4["TimeCreated"];echo'</time>
      </div>
    </li>';
			}
			else{
				$sql5 = "SELECT * from user where user_id=$row4[u_id]";
				$result5 = $conn->query($sql5);
				$row5 = mysqli_fetch_assoc($result5);
				echo'
    <li class="other">
        <div class="msg">
        <p><h5>';echo $row5["name"];echo'</h5></p>
        <p>';echo $row4["message"];echo'</p>
        <time>';echo $row4["TimeCreated"];echo'</time>
      </div>
    </li>';
			}
		}
	}
	echo'
    </ol>
	<form action="chat.php" method=post>
	<br>
	<div>
    <input class="textarea" type="text" placeholder="Type here!" name="message"/>
	</div><br>
	<button type="submit" name="submit" style="float:right;">Send</button></form>
	<a href="chat.php?refresh=1"><button>Refresh</button></a>
	</form>
	</html>';
	
?>