<?php
 
    
        $conn = mysqli_connect("localhost", "root", "", "etracker");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        /*$t1 =  $_REQUEST['t1'];
        $n1 = $_REQUEST['n1'];
        $t2=$_REQUEST['t2'];
        $n2 = $_REQUEST['n2'];
        $t3 =  $_REQUEST['t3'];
        $n3 = $_REQUEST['n3'];
        $t3=$_REQUEST['t3'];
        $n3 = $_REQUEST['n3'];*/
        $date=date("Y-m-d");
        $exp=0;
        for ($x = 1; $x <= 6; $x++) {
            $t=$_REQUEST['t'.$x];
            $n=$_REQUEST['n'.$x];
            if(!($t=='' or $n==0)){
                $exp=$exp+$n;
                $sql = "INSERT INTO items  VALUES ('$date','$t','$n')";
                mysqli_query($conn,$sql);
            }    
          }
          $sql = "SELECT total FROM `daily_total` WHERE date='$date'";
          $tot= mysqli_query($conn, $sql);
          $row= mysqli_fetch_assoc($tot);
          $tot=$row['total'];
          $exp=$exp+$tot;
          if($tot==0){
            $sql = "INSERT INTO daily_total  VALUES ('$date','$exp')";
          }
          else{
            $sql = "UPDATE  daily_total  SET total='$exp' where date='$date'";

          }
          mysqli_query($conn, $sql);
          echo "<script>";
echo " alert('Items added successfully!!!');      
        window.location.href='home.php';
      </script>";
        
           

       
        ?>
        