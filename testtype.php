<?php
include('phpgraphlib.php');
$graph = new PHPGraphLib(1200,400);
$servername = "localhost";

//username to connect to the db
//the default value is root
$username = "root";

//password to connect to the db
//this is the value you would have specified during installation of WAMP stack
$password = "";

//name of the db under which the table is created
$dbName = "kmosminiproject";

//establishing the connection to the db.
$conn = new mysqli($servername, $username, $password, $dbName);

//checking if there were any error during the last connection attempt
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
$dataArray=array();
  
//get data from database
$sql="SELECT type, COUNT(*) AS 'count' FROM post GROUP BY type";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $salesgroup=$row["type"];
	  
      $count=$row["count"];
      //add to data areray
      $dataArray[$salesgroup]=$count;
  }
}
  
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Current Issues Location-wise");
$graph->setGradient("silver", "silver");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>