<!DOCTYPE html>
<html lang="en">
<head>
    <title>Etracker</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="Expense-Tracker-logo-2007.png" type="image/x-icon"><div class="nav">  
    <img class="icon" src="Expense-Tracker-logo-2007.png" alt="" height="25px" width="25px"> E-TRACKER
    <a  href="index.html">Logout</a>
    <a  href="about.html">About</a>
    <a href="report.html">View Report</a>
    <a  href="analysis.php">Analysis</a>
    <a  href="home.php">Main Page</a>
</div>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "etracker");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$date=date("Y-m-d");
$sql = "SELECT total FROM daily_total WHERE date='$date'";
$result = $conn->query($sql);
if(mysqli_num_rows($result)>0){
   $row = $result->fetch_assoc();
   $tot=$row['total'];
}
else{
   $tot=0;
}
echo "<center><h3 style='font-family: cursive;'>Welcome Back Amigo!!!! <br> Today's total expense is $tot </h3></center>";
$conn->close();
?>
    <div class="form">
       <table>

        <form action="items.php" method="post">
        <th>ITEMS</th> <th>AMOUNT (in Rupees)</th>
        <tr>
            <td><input type="text" name="t1"></td>
            <td><input type="number" name="n1"></td>
         </tr>
         <tr>
            <td><input type="text" name="t2"></td>
            <td><input type="number" name="n2"></td>
         </tr>
         <tr>
            <td><input type="text" name="t3"></td>
            <td><input type="number" name="n3"></td>
         </tr>
         <tr>
            <td><input type="text" name="t4"></td>
            <td><input type="number" name="n4"></td>
         </tr>
         <tr>
            <td><input type="text" name="t5"></td>
            <td><input type="number" name="n5"></td>
         </tr>
         <tr>
            <td><input type="text" name="t6"></td>
            <td><input type="number" name="n6"></td>
         </tr>
                  
       </table><br><br> <br>
       <input type="submit" value="SAVE" class="sub">
    </form>
   
    </div>
</table>

</body>
<div class="footer"> <br><p>CONTACT DETAILS</p>
    <a href="https://instagram.com/navada_shash_07?igshid=ZDdkNTZiNTM="><img src="insticon.png" height="30px" width="30px"></a>
    <a href="https://github.com/ShashwathiN"><img src="github.png" height="30px" width="30px" style="background-color: white;"></a>
    <a href="https://www.linkedin.com/in/shashwathi-n-0269a9228"><img src="174857.png" height="30px" width="30px"></a>
 </div>
</html>