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
        $conpass=$_REQUEST['conpass'];
        $email = $_REQUEST['email'];
         
        // Performing insert query execution
        // here our table name is college
        if($username=='' or $password=='' or $email=='')
        {
            echo "<script>";
echo " alert('PLEASE FILL IN ALL THE DETAILS!!!');      
        window.location.href='register.html';
      </script>";

        }
        else if ($password!=$conpass){
            echo "<script>";
            echo " alert('PASSWORDS DOES NOT MATCH');      
                    window.location.href='register.html';
                  </script>";
        }
        else{
            $sql = "INSERT INTO register  VALUES ('$username','$password','$email')";
         
            if(mysqli_query($conn, $sql)){
                echo "<script>";
echo " alert('REGISTRATION SUCCESSFUL!!!');      
        window.location.href='index.html';
      </script>";
    
     
            } else{
                echo "<script>";
                echo " alert('SORRY SOMETHINGS WRONG!!!');      
                        window.location.href='register.html';
                      </script>";
    
            }
             
            // Close connection
            mysqli_close($conn);
        }
       
        ?>