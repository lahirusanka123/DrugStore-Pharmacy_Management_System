<?php
require 'connection.php';
session_start();

//to update account details 
if(isset($_POST['save']) )
{
    $firstN = $_POST["fname"];
    $lastN = $_POST["lname"];
    $DoB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $phoneNo = $_POST["phoneNo"];
    $Email = $_POST["email"];
    $password = $_POST["pwd"];
     
    
    $sql = "UPDATE customer SET f_name = '$firstN', l_name = '$lastN', birthday = '$DoB', gender = '$Gender', phone_no = '$phoneNo', email_address = '$Email', password = '$password' WHERE email_address = '$Email'";
    
    if($conn->query($sql)==TRUE)
    {
        echo "New record created successfully";
        header("Location: index.php");
               
    }
    
    else
    {
         echo "Error :".$sql."<br>".$conn->error;
    }
    
}




       // to display Account details on myAccount page
      $email = $_SESSION['email_address'];  
      $sql = "SELECT * FROM customer WHERE email_address = '$email' ";
      $result = mysqli_query($conn,$sql); 
      $row = mysqli_fetch_assoc($result);
      $conn->query($sql);


  


$conn->close();

?>