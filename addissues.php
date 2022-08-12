<?php
   include('session.php');
   include('config.php');
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
input[type=text], select {
  width: 70%;
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
<br/>
<form action="" method="post" enctype="multipart/form-data">
<h3>Select Pentest to Add Issue:</h3>

<?php

$query = "select assetname from pentest";

$result = mysqli_query($db,$query);

echo "<select name='assetname'>";
while ($row = mysqli_fetch_array($result))
{
  echo "<option value='".$row['assetname']."'>".$row['assetname']."</option>";
}
echo "</select>";

?><br/><br/><br/>
<input type="file" name="file" value="" /><br/><br/><br/>
<input type="submit" name="submit" value="Submit">
</form>
<?php
if(isset($_POST['submit']))
{
   $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
   // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes))
    {
      // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
           // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE)
            {
                // Get row data
            $high = $line[1];
          
            $medium = $line[2];
           
            $low = $line[3];
           
            $total = $line[4];
            $asset=$_POST['assetname'];
          
            $query = "insert into issue(assetname,high,medium,low,total) values ('$asset','$high','$medium','$low','$total');";
         
            $result = $db->query($query); 
            break;
          } 
            fgetcsv($csvFile);
            fgetcsv($csvFile);
            while(($line = fgetcsv($csvFile)) !== FALSE)
            {
              
            //print_r($line); echo "<br/>";
          $issuename = $line[1];
          $desc = $line[2];
          $risk = $line[3];
          $rem = $line [4]; 
          $asset=$_POST['assetname'];

          $query = "insert into issuedetails(assetname,issuename,description,sev,remediation) values ('$asset','$issuename','$desc','$risk','$rem');";
          $result = $db->query($query); 
        
          } 

            fclose($csvFile);
            
            $qstring = '?status=succ';
        } else{
            $qstring = '?status=err';
        }
    } else{
        $qstring = '?status=invalid_file';
    } 
    if(mysqli_query($db,$query))
    {   
echo "<h3>Issue created against pentest successfully.</h3>";}
}
 
?>
</body>
</html>