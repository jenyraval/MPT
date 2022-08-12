<?php
   include('session.php');
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
   </body>
   
</html>