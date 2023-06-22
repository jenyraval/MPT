<?php
   include('session.php');
   include('config.php');
//prepared stmt
$query = "select title,type,scope,totalpentest,score from asset";
$prepared = $db->prepare($query);
$prepared->execute();
$result = $prepared->get_result();
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
 <br/> <br/> <br/><br/>
<a href="createasset.php" class="button button1">Create Asset</a>
     <table>
  <tr>
   <th>Id</th>
    <th>Title</th>
    <th>Type</th>
    <th>Scope</th>
    <th>Total Pentests</th>
    <th>Risk Score</th>
 </tr>
  <?php
  if ($result->num_rows > 0){
   $sn=1;
   while($data = $result->fetch_assoc())
   { 
    ?>
  <tr>
    <td><?php echo $sn; ?></td>
   <td onclick="location.href='./assetinfo.php?title=<?php echo $data['title']; ?>'"><a href="./assetinfo.php?title=<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a></td>
   <td><?php echo $data['type']; ?></td>
    <td><?php echo $data['scope']; ?></td>
    <?php 
    $title = $data['title'];

    $query1 = "SELECT COUNT(*) as totalpentest FROM pentest WHERE assetname = '$title';";
    $result1 = mysqli_query($db,$query1) or die($db->error);
    $data1 = $result1->fetch_assoc();
   ?>
     <td><?php echo $data1['totalpentest']; ?></td> 
     <?php 
    $title = $data['title'];
     $query2 = "SELECT total FROM `issue` WHERE assetname='$title';";
     $result2 = mysqli_query($db,$query2) or die($db->error);
    $data2 = $result2->fetch_assoc();
    ?>
     <td><?php echo $data2['total']; ?></td>
      </tr>
     
      <?php
      $sn++;}
   } else {
      ?>
   
  <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
</table>
</body>
</html>
