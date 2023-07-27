<?php
 
    
        $conn = mysqli_connect("localhost", "root", "", "etracker");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $username =  $_REQUEST['name'];
        $password = $_REQUEST['pass'];
        
        // Performing insert query execution
        // here our table name is college
        if($username=='' or $password=='')
        {
            echo "<script>";
echo " alert('PLEASE FILL IN ALL THE DETAILS!!!');      
        window.location.href='index.html';
      </script>";

        }
    
        else{
            $sql = "SELECT password FROM `register` WHERE username='$username'";
            $pass= mysqli_query($conn, $sql);
            $row= mysqli_fetch_assoc($pass);
            $pass=$row['password'];
            if($pass==''){
                echo "<script>";
                echo " alert('User does not exist!!!');      
                        window.location.href='index.html';
                      </script>";
            }
            else if($pass==$password){
                echo "<script>";
echo " alert('LOGIN SUCCESSFUL!!!');      
        window.location.href='home.php';
      </script>";
    
     
            } else{
                echo "<script>";
                echo " alert('Password incorrect!!!');      
                        window.location.href='index.html';
                      </script>";
    
            }
             
            // Close connection
            mysqli_close($conn);
        }
       
        ?>