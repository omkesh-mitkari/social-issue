<!DOCTYPE html>
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
$sql="SELECT * from post order by post_id desc limit 3";
$result=$conn->query($sql);

echo'
<html>
  <head>
    <title>Who Blocked It?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="slider.css">
    <!--Google Fonts-->
    <link href=';echo'http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext rel=';echo 'stylesheet type=';echo 'text/css>

    
    <!--Bootshape-->
    <link href=';echo"css/bootshape.css rel=";echo "stylesheet>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=";echo "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js></script>
      <script src=";echo "https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navigation bar -->";
	echo'
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Who Blocked It!?</a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
          <ul class="navbar-nav nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="ddpage.html">About</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">Login<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="loginu.php">User</a></li>
                <li><a href="logina.php">Authority</a></li>
                <li><a href="loginm.php">Media</a></li>
              <!--  <li class="divider"></li>
                <li><a href="#">All Items</a></li>-->
              </ul>
            </li>

            <li class="dropdown">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">Signup<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="signup.html">User</a></li>
                <li><a href="signupa.html">Authority</a></li>
                <li><a href="signupm.html">Media</a></li>
              <!--  <li class="divider"></li>
                <li><a href="#">All Items</a></li>-->
              </ul>
            </li>


            <!--<li><a href="#">Contacts</a></li>-->
          </ul>
        </nav>
      </div>
    </div><!-- End Navigation bar -->
	<br>
	<br>
	<br>
<div id="slider">
<figure>
<img src="image4.jpg" alt>
<img src="image6.jpg" alt>
<img src="image1.jpg" alt>
<img src="image4.jpg" alt>
<img src="image6.jpg" alt>
</figure>
</div>

    
	<br>
	<br>
	<br>

    <!-- Thumbnails -->
    <div class="container thumbs">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">';
		$row=$result->fetch_assoc();
		$userid=$row['user_id'];
		$sql1="SELECT username from user where user_id=$userid";
		$result1=$conn->query($sql1);
		$row1=$result1->fetch_assoc();
		$username=$row1['username'];
			$imagedir="users/$username/images/";
			$imgsrc=$row['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		 echo '<img src=';echo'"';echo $imagedir;echo'"'; echo 'alt="" class="img-responsive">
          <div class="caption">
            <h3 class="">';
			echo $row['title'];echo'</h3>
            <p>';echo $row['description'];echo'</p>
            
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">';
		$row=$result->fetch_assoc();
		$userid=$row['user_id'];
		$sql1="SELECT username from user where user_id=$userid";
		$result1=$conn->query($sql1);
		$row1=$result1->fetch_assoc();
		$username=$row1['username'];
			$imagedir="users/$username/images/";
			$imgsrc=$row['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		
		 echo '<img src=';echo'"';echo $imagedir;echo'"'; echo 'alt="" class="img-responsive">
          
          <div class="caption">
            <h3 class="">';
			echo $row['title'];echo'</h3>
            <p>';echo $row['description'];echo '</p>
            
          </div>
        </div>
      </div>
	  <div class="col-sm-6 col-md-4">
        <div class="thumbnail">';
		$row=$result->fetch_assoc();
		$userid=$row['user_id'];
		$sql1="SELECT username from user where user_id=$userid";
		$result1=$conn->query($sql1);
		$row1=$result1->fetch_assoc();
		$username=$row1['username'];
			$imagedir="users/$username/images/";
			$imgsrc=$row['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		
		 echo '<img src=';echo'"';echo $imagedir;echo'"'; echo 'alt="" class="img-responsive">
          
          <div class="caption">
            <h3 class="">';
			echo $row['title'];echo'</h3>
            <p>';echo $row['description'];echo '</p>
            
          </div>
        </div>
      </div>
    
    </div><!-- End Thumbnails -->
	<center><h3>These are the stats of the Current Issues in Pune</h3>
	<h4>Location-wise</h4>
<img src="test.php" />
<h4>Issue Type-wise</h4>
<img src="testtype.php" /></center>
    <!-- Content -->
    <div class="container">
      <div class="">
        <h3 class="">Welcome</h3>
        <p>Who Blocked It!? is a platform aimed at improving the nuisances happening in our day to day lives. We aim to create a positive difference in our society by bringing to light all types of mishaps which affect our lives in some or the other way and by trying to find solutions to these problems so that we make ourselves a better world to live in!:)
         </p>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <h3 class="">Joining Policy</h3>
          <img src="joining.jpg" alt="" class="img-responsive">
          <br>
          <p>The users are required to sign up with valid credentials in order to join this platform. 
             The users are expected to set their preferences for their post feeds according to their choice.
             All posts on this platform will be evaluated based on their legitimacy and accordingly will be displayed here so that we can take actions for the betterment of the cause. 
          We at Who Blocked It!? believe in keeping your personal information hidden from all the authorities. </p>
        </div>

    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootshape.js"></script>
  </body>
</html>';
?>
