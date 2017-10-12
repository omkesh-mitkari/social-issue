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
$title=$row1["title"];
$description=$row1["description"];
$location=$row1["location"];
			$imagedir="users/$username/images/";
			$imgsrc=$row1['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";


echo'
<!doctype html>
<head>
<link rel="stylesheet" type="text/css" href="reg.css">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>
<div class="container">
    <h3 class="well">Edit Your Post</h3>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="POST" action="createnewpostdbedit.php?post=';echo $post_id;echo'" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							
							<div class="col-sm-6 form-group">
							

								<label>Title</label>
								<input type="text" placeholder="Enter Title Here.." class="form-control" name="title" value=';echo'"';echo $title;echo'">
							</div>
						
						</div>					
					    <br>
						<div class="form-group">
							<label>Description</label>
							<textarea placeholder="Enter Description Here.." rows="3" class="form-control" name="description">';echo $description;echo'</textarea>
						</div>	
						
						<br>						
					<div class="form-group">
						<label>Location</label>
						<input type="text" placeholder="Enter Location Here.." class="form-control" name="location" value="';echo $location;echo'">
					</div>		
					<br>
					
					
					<center><button type="submit" class="btn btn-success">Submit</button></center>									
						
					</div>
				</form> 
				</div>
	</div>
	</div>


</body>
</html>';
?>