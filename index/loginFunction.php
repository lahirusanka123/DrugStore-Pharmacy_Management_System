<?php
session_start();
$log = null;
require 'connection.php';

 
if (isset($_POST['login'])) 
{

     
    $Email=$_POST['email'];      // assign login page usename to $username 
    $password=$_POST['pwd'];   // assign login page password to $password 
    
    //$pass = md5($password);
    
    
    //checking if email and password exists in MySQL database 
    $sql="SELECT * FROM customer WHERE email_address='$Email' AND password='$password'";
    $result = mysqli_query($conn,$sql);  //pass result variable to $sql 

    // counting no of table row and it assign to the count variable 
    $count=mysqli_num_rows($result);
    
   
    if ($count == 1)  // If $username and $password mached, result must be 1 row
    {
        
        //select user by using email address        
         $row = mysqli_fetch_assoc($result);
         
         $_SESSION['customer_id'] = $row['id'];
         $_SESSION['login_user'] = $row['f_name']; //asing selected username
         $_SESSION['email_address'] = $row['email_address'];  //add session variable to email address
         $_SESSION['admin'] = $row['admin']; 
        
        //check user type and redirect page according to the user type 
         if ($row['admin'] == 1)
         {     
            header('location:adminpage.php'); 
         }
         else if($row['admin'] == 2)
         {     
            header('location: prescription_checking.php');
         }
         else
         {     
            header('location: index.php');
         }  
    } 
    else 
    {
        
        
        $_SESSION["loginerror"] = "This account does not exist on DrugStore";
        
        header('location: login.php');
        
    }
}

 mysqli_close($conn);
?>

