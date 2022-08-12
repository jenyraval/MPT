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
<br />
<form method="post" action="">
*Asset Name <br/>
<input type=text name="assetname"><br/>
*Asset Type <br/>
<select name="type">
   <option value="Web">Web</option>
   <option value="API">API</option>
   <option value="Network">Network</option>
   <option value="WebAPI">Web+API</option>
   <option value="MobileApp">Mobile App</option>
   <option value="ConfigReview">Config Review</option>
   <option value="Phishing">Phishing</option>
   <option value="WebMobile">Web+Mobile</option> 
</select><br/>
Asset Description <br/>
 <textarea name="assetdesc" rows="4" cols="143"></textarea><br/>  
Asset Size <br/>
<select name="size">
<option value="Small">< 30 endpoints</option>
<option value="Medium">< 50 endpoints</option>
<option value="Large">60+ endpoints</option> 
</select><br/>
Asset Coverage <br/>
<select name="coverage">
<option value="Default">Default</option>
<option value="Timebound">Time bound</option>
<option value="Extensive">Extensive</option> 
</select>
<input type="submit" name="submit" value="Create Asset">
</form>
	 </body>
   
</html>

<?php 
if (!empty($_POST)){
$assetname = mysqli_real_escape_string($db,$_POST['assetname']);
$assettype = mysqli_real_escape_string($db,$_POST['type']);
$assetdesc = mysqli_real_escape_string($db,$_POST['assetdesc']);
$size = mysqli_real_escape_string($db,$_POST['size']);
$coverage = mysqli_real_escape_string($db,$_POST['coverage']);
$query = "insert into asset(title,type,scope,size,description) values ('$assetname','$assettype','$coverage','$size','$assetdesc');";
if(mysqli_query($db,$query)){
   echo "<h3>Asset created successfully.</h3>";
}
}
?>