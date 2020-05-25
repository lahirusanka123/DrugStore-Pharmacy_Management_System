<?php 
session_start();
require 'connection.php';
 

if(isset($_POST["create"]))
{
    $firstN = $_POST["fname"];
    $lastN = $_POST["lname"];
    $DoB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $phoneNo = $_POST["pNo"];
    $Email = $_POST["email"];
    $password = $_POST["pwd"];
    //$password = md5($_POST["pwd"]);// md5 encryption for password
    $agree = $_POST["agr"];
    
    
    $sql = "INSERT INTO customer(f_name,l_name,birthday,gender,phone_no,email_address,password,agree) VALUE('$firstN','$lastN','$DoB','$Gender','$phoneNo','$Email','$password','$agree')";
        
    if($conn->query($sql)==TRUE)
    {
        echo "New record created successfully";
        $_SESSION['login_user'] = $firstN;
        $_SESSION['email_address'] = $_POST['email']; //add session variable to email address
        header('location: index.php');
    }
    else
    {
        echo "Error :".$sql."<br>".$conn->error;
    }

 
    
}
 

?>