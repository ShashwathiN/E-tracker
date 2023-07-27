<!DOCTYPE html>
<html lang="en">
<head>
    <title>Etracker</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="Expense-Tracker-logo-2007.png" type="image/x-icon"><div class="nav">  
    <img class="icon" src="Expense-Tracker-logo-2007.png" alt="" height="25px" width="25px"> E-TRACKER
    <a class="link" href="index.html">Logout</a>
    <a class="link" href="about.html">About</a>
    <a class="link" href="report.html">View Report</a>
    <a class="link" href="analysis.php">Analysis</a>
    <a class="link" href="home.php">Main Page</a>
    
    </div>
<body>
<?php
 
    
 $conn = mysqli_connect("localhost", "root", "", "etracker");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
if($_REQUEST['date'])
{
    $date=$_REQUEST['date'];
}
else{
    $date=date("Y-m-d");
}
 $sql = "SELECT * FROM `items` WHERE date='$date'";
 $pass= mysqli_query($conn, $sql);
 if(mysqli_num_rows($pass)==0){
    echo "<h1 style='text-align: center;font-family:cursive;top: 58%;
    left: 50%;position:absolute;
    transform: translate(-50%, -50%);'>Hello!!! <br> No report available as of $date</h1>";

 }
 else{
    echo "<h1 style='text-align: center;font-family:cursive;
'>Hello!!!<br> Here's the report of $date</h1>";
    echo "<table style='padding:50px;
 align-items: center;
 position: absolute;
 background-color: black;
 font-family:cursive;
 top: 58%;
 left: 50%;
 transform: translate(-50%, -50%);
 text-align: center;
 color: aliceblue;'>";
 while($row= mysqli_fetch_assoc($pass)){
  echo " <tr><td> $row[item]<td><td> $row[amount]<td></tr>"; 
 }
 $sql = "SELECT total FROM `daily_total` WHERE date='$date'";
 $pass= mysqli_query($conn, $sql);
 $row= mysqli_fetch_assoc($pass);
 echo "<tr><td> Total<td><td> $row[total]<td></tr>";
 echo "</table>";
 mysqli_close($conn);
}
 ?>

</body>
<div class="footer"> <br><br><p>CONTACT DETAILS</p>
   <a href="https://instagram.com/navada_shash_07?igshid=ZDdkNTZiNTM="><img src="insticon.png" height="30px" width="30px"></a>
   <a href="https://github.com/ShashwathiN"><img src="github.png" height="30px" width="30px" style="background-color: white;"></a>
   <a href="https://www.linkedin.com/in/shashwathi-n-0269a9228"><img src="174857.png" height="30px" width="30px"></a>
</div>
</html>