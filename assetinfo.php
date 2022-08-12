<?php
   include('session.php');
   include('config.php');

?>
<html>
   
   <head>
      <title>Welcome </title>
	<img src="header.jpg" style="width:100%;height:300px;">
   </head>
   <style>
   .navbar a:hover {
  background: #ddd;
  color: black;
}
.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  top: 0;
  width: 100%;
}
.button{
   border: snow;
   color: white;
   padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  top: 40%;
  left: 75%;
  position: absolute;
 }
 .button1 {background-color: black;}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
   <body>
	  
	  <div class="navbar">
  <a href="assets.php">Assets</a>
	<a href="pentest.php">Pentests</a> 
   <a href="tracker.php">Issue Tracker</a> 
  <a href="devloper.php">Developer's Corner</a>
   <a href="analytics.php">Analytics</a>
   <a href="logout.php">Logout</a>
	</div> 

<?php

$title= mysqli_real_escape_string($db,$_REQUEST['title']);
echo "<center><h1>$title</h1></center><hr>";
$query = "select * from asset where title='$title'";

$result = mysqli_query($db,$query);
$row = mysqli_fetch_row($result);

$type = $row['2'];
$scope = $row['3'];

$size= $row['6'];
$desc= $row['7'];
echo "<h3>Type: $type</h3>";
echo "<h3>Pentest Scope: $scope</h3>";
echo "<h3>Asset Size: $size</h3>";
echo "<h3>Asset Description: $desc</h3>";

$query1 = "SELECT COUNT(*) as totalpentest FROM pentest WHERE assetname = '$title';";
    $result1 = mysqli_query($db,$query1) or die($db->error);
    $data1 = mysqli_fetch_assoc($result1);
$totalpentest = $data1['totalpentest'];

echo "<h3>Total Pentests Performed: $totalpentest</h3>";

$query2 = "SELECT total FROM `issue` WHERE assetname='$title';";
     $result2 = mysqli_query($db,$query2) or die($db->error);
    $data2 = $result2->fetch_assoc();
    $score = $data2['total'];
echo "<h3>Overall Risk Score: $score</h3><hr>";

echo "<h3>Total Number of Issues found:</h3>";

$query = "select high,medium,low,total from issue where assetname = '$title' limit 1;";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_row($result);
echo "<p style='color:red'>High: $row[0]</p>";
echo "<p style='color:orange'>Medium: $row[1]</p>";
echo "<p style='color:green'>Low: $row[2]</p>";
echo "<p style='color:brown'>Total: $row[3]</p>";
?>


</body>
</html>
