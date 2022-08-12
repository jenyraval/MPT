<?php
   include('session.php');
   include('config.php');
 ?>  
<html>
   
   <head>
      <title>Welcome </title>
	<img src="header.jpg" style="width:100%;height:300px;">
   </head>
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
input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
textarea {
   padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 70%;
  background-color: #000000;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
<a href="addissues.php" class="button button1">Add Issues</a>
<form method="post">
<h3>Select Pentest to Track Issue:</h3>

<?php

$query = "select assetname from pentest";

$result = mysqli_query($db,$query);

echo "<select name='assetname'>";
while ($row = mysqli_fetch_array($result))
{
  echo "<option value='".$row['assetname']."'>".$row['assetname']."</option>";
}
echo "</select>";

?>
<input type="submit" name="submit" value="Check!">
</form><br/>
 <table>
  <tr>
   <th>Sr No</th>
    <th>Issue Title</th>
    <th>Issue Description</th>
    <th>Severity</th>
    <th>Remediation</th>
    <th>Issue Status</th>
 </tr>

<?php if($_POST['submit'])
{
   $asset=$_POST['assetname'];
}
$query= "select * from issuedetails where assetname='$asset'";
$prepared = $db->prepare($query);
$prepared->execute();
$result = $prepared->get_result();
  if ($result->num_rows > 0){
   $sn=1;
   while($data = $result->fetch_assoc())
   { ?>
  <tr>
    <td><?php echo $sn; ?></td>
   <td><?php echo $data['issuename']; ?></td>
    <td><?php echo $data['description']; ?></td>
     <td><?php echo $data['sev']; ?></td>
     <td><?php echo $data['remediation']; ?></td>
      <td><?php echo $data['status']; ?></td>
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