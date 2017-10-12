<?php
$servername="localhost";
$username="root";
$password="";
$dbname="kmosminiproject";

$conn = new mysqli($servername, $username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection failed!".$conn->connect_error);
}
$sql1="SELECT * from post order by post_id desc limit 4";
$result1=$conn->query($sql1);

echo '<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href=';echo'homepage2.css rel=';echo'stylesheet>

    <!-- Custom styles for this template -->
    <link href=';echo'homepage1.css rel=';echo 'stylesheet>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="signup.html">Found Issue</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="who_blocked_it.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="policy.html">Joining Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.html">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Welcome to Who Blocked It</h1>
        <p class="lead">Who Blocked It is a online platfor where People take their own interest to put the problems which they are facing. People get to know how the people they elected are working and get chance to put their problems in front of them.</p>
        <a href="signup.html" class="btn btn-primary btn-lg">Contribute</a>
      </header>
	</div> ';
if($result1->num_rows > 0)
{
	while($row1=$result1->fetch_assoc())
	{
		$imagedir="users/$username/images/";
		echo $user_id;
		$imgsrc=$row1['post_id'];
		$imagedir=$imagedir.$imgsrc.".jpg";
		$title=$row1['title'];
		$description=$row1['description'];
		$location=$row1['location'];
		$timecreated=$row1['TimeCreated'];
		echo' 
		<div class="container">
      <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">';
           #<img class="card-img-top" src='echo '"';echo $imagedir; echo'"';echo 'alt="">
            echo'<div class="card-body">
              <h4 class="card-title">'echo $title;echo '</h4>
              <p class="card-text">';echo $description;echo'</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">read More</a>
            </div>
          </div>
        </div>';
	echo'
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->';
	}
}
    echo'<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>';
?>
