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
   <?php 

   //echo "Current Risk Posture:";
   $query = "select sev,count(*) as total from issuedetails where status!='Closed' group by sev;";
   //echo "Recurring Issues:";
   $query1 = "SELECT issuename,count(*) as occurrance FROM issuedetails group by issuename;";
   //echo "Average amount of time taken for each pentest vs asset size:";
   $query2 = "SELECT size,DATEDIFF(enddate,startdate) as days,scope,id FROM pentest group by size;";
   //echo "Class of New Vulnerabilities Discovered:";
   $query3 = "SELECT distinct issuename,count(*) as total FROM issuedetails group by issuename;";
   //echo "Open Findings";
   $query4 = "select sev,count(*) as total from issuedetails where status!='Closed' and status!='Risk Accepted' group by sev;";
   //asset health
   $query5 = "select assetname,total from issue group by assetname;";
   //avg busy time for pentester
   $query6 = "SELECT id,DATEDIFF(enddate,startdate) as days FROM pentest;";
   //developer trends
  // $query7 = "SELECT DISTINCT(Select Count(status) FROM issuedetails WHERE status ='Closed') AS closed, (SELECT Count(status) FROM issuedetails WHERE status != 'Closed') AS open FROM issuedetails;";
   $query7 = "SELECT high,medium FROM issue;";
   $result = mysqli_query($db,$query);
   $result1 = mysqli_query($db,$query1);
   $result2 = mysqli_query($db,$query2);
   $result3 = mysqli_query($db,$query3);
   $result4 = mysqli_query($db,$query4);
   $result5 = mysqli_query($db,$query5);
   $result6 = mysqli_query($db,$query6);
   $result7 = mysqli_query($db,$query7);
   ?>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['Severity','Total'], 
         <?php
            while ($row = mysqli_fetch_assoc($result))
            { 
              echo "['".$row['sev']."', ".$row['total']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Current Risk Posture:',
           pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart" style='width: 550px; height: 400px;
    position: absolute;
      top: 360px;
    left: 0px;
    '></div>


     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['IssueName','Occurrance'], 
         <?php
            while ($row = mysqli_fetch_assoc($result1))
            { 
              echo "['".$row['issuename']."', ".$row['occurrance']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Recurring Issues:'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart1" style='width: 550px; height: 400px;
    position: absolute;
      top: 360px;
    left: 500px;
    '></div>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

      function drawSeriesChart() {
         var data = google.visualization.arrayToDataTable([
         ['AssetSize','Days','Id','Scope'], 
         <?php
            while ($row = mysqli_fetch_assoc($result2))
            { 
               echo "['".$row['size']."',".$row['days'].",".$row['id'].",'".$row['scope']."'],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Average amount of time taken for each pentest vs asset size:',
         hAxis: {title: 'Time'},
        vAxis: {title: 'Scope'},
        bubble: {textStyle: {fontSize: 11}} 
        };

        var chart = new google.visualization.BubbleChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart2" style='width: 700px; height: 400px;
    position: absolute;
      top: 360px;
    left: 1000px;
    '></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['IssueName','Total'], 
         <?php
            while ($row = mysqli_fetch_assoc($result3))
            { 
              echo "['".$row['issuename']."', ".$row['total']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Class of New Vulnerabilities Discovered:'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart3" style='width: 800px; height: 400px;
    position: absolute;
      top: 760px;
    left: 0px;
    '></div>






    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['Severity','Total'], 
         <?php
            while ($row = mysqli_fetch_assoc($result4))
            { 
              echo "['".$row['sev']."', ".$row['total']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Open Findings:'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart4" style='width: 550px; height: 400px;
    position: absolute;
      top: 760px;
    left: 900px;
    '></div>


     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['AssetName','Total'], 
         <?php
            while ($row = mysqli_fetch_assoc($result5))
            { 
              echo "['".$row['assetname']."', ".$row['total']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Asset Health:'
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart5'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart5" style='width: 550px; height: 400px;
    position: absolute;
      top: 1160px;
    left: 0px;
    '></div>


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['PentesterId','Days'], 
         <?php
            while ($row = mysqli_fetch_assoc($result6))
            { 
              echo "['".$row['id']."', ".$row['days']."],";
            }
          ?> 
             ]); 

          var options = {
          title: 'Average busy time for each pentester:'
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart6'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart6" style='width: 550px; height: 400px;
    position: absolute;
      top: 1160px;
    left: 500px;
    '></div>



 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['High','Issues'], 
         <?php
            while ($row = mysqli_fetch_assoc($result7))
            { 
              echo "[".$row['high'].", ".$row['medium']."],";
               
            }
          ?> 
             ]); 

          var options = {
          title: 'Developer Trends:'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('piechart7'));

        chart.draw(data, options);
      }
  </script>
       <div id="piechart7" style='width: 550px; height: 400px;
    position: absolute;
      top: 1160px;
    left: 1000px;
    '></div>




   </body>
   
</html>