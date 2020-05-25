<?php
session_start();
if (!(empty($_SESSION['login_user'])))  
{
  
    header("location:login.php");
       
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../scripts/signUp.js"></script> 
    <link rel="stylesheet" href="../styles/style.css" >
	<link rel="stylesheet" href="../styles/style2.css" >
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
   
   
    
</head>
<body >

<div class = "main" >
    
     <!----------------------------- top mini header section --------------------------------------------------------------> 
	<div class = "header" >
		<div class = "subheader" >
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/facebook.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/instagram.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/linkedin.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/twitter.png" ></a>
			
			<label id = "contactNo"><b>Contact No : 011 233 2334</b></label>
		</div  >
     <!----------------------------- main header section -------------------------------------------------------------------> 
		<div class = "mainheader" >
			<div class = "header-logo"  >
			<a href = "index.php" >
				<img class = "logo" src = "../images/logo.jpg" >
			</a></div>
			<div class = "header-buttons" style ="width : 70%;height : auto; float :left; background-color : white;"  >
			<input id = "search" type="text" name="search" placeholder="Search..">	
			<button id ="uploadPrescriptionBtn"  ><b>Upload Prescription</b></button>
			<button id ="cartBtn"  ><b>0 ITEM - Rs.0</b></button>
		</div>
		</div>
		</div>
		
     <!----------------------------- body section --------------------------------------------------------------------------->
    
       <div class ="pageBody">
        <div id = "signUpBody">         
               
            <form method="POST" action="createAccountFunction.php" onsubmit="return validateSignUp()"> <!---form begins --->
             
                <table id="signUpTable" > <!--table begins -->
					 <br>
                    <tr>
                        <td width="50%"> <b>Already have an account? <a href="login.php" > Log in instead</a> <br> </b> </td>
                    </tr>
                    <tr>
                       <td ><lable class = "Stext" >  <b>First Name</b></lable> &nbsp;  <label id="fnameErro"></label>  </td> 
                    </tr>
                    <tr>
                       <td > <input class="logText"  type="text" name="fname" id="fname" ><br> </td>
                    </tr>
                    <tr>
                       <td><lable class="Stext"><b>Last Name</b></lable> &nbsp;  <label id="lnameErro"></label> </td> 
                    </tr>
                    <tr>
                        <td><input class="logText" type="text" name="lname" id="lname"  > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Date of Birth</b></lable> &nbsp;  <label id="dateErro"></label> </td> 
                    </tr>
                    <tr>
                        <td><input class="logText" type="date" name="dob" value="" id="dob" > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Gender</b> </lable> &nbsp;  <label id="genderErro"></label> </td> 
                    </tr>
                    <tr>
                        
                        <td><input  type="radio" name="gender" value="Male" id="male"  ><lable> Male </lable><input class="" type="radio" name="gender" value="Female" id="female"  ><label> Female</label> </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Phone Number</b></lable> &nbsp;  <label id="phoneErro"></label> </td> 
                    </tr>
                    <tr>
                        <td><input class="logText" type="text" name="pNo" id="pNo" max="10"  > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Email</b></lable> &nbsp;  <label id="emailErro"></label> </td> 
                    </tr>
                    <tr>
                        <td><input class="logText" type="email" name="email" id="email"  > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Password</b></lable> &nbsp;  <label id="pwdErro"></label> </td>
                    </tr>
                    <tr>
                         <td><input class="logText" type="password" name="pwd" id="pwd"  > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Re-Type Password</b></lable> &nbsp;  <label id="rePwdErro"></label> </td> 
                    </tr>
                    <tr>
                        <td><input class="logText" type="password" id="rePwd"  > </td>
                    </tr>
                    
                    <tr>
                        <td> <input class="" name="agr" type="checkbox" > <label> Agree to the </label><a href="#"> Term and condition</a> </td>
                    </tr>
                     
                    <tr>
                        <td><input id="signUpButton"  type="submit" name="create" value="Create an Account" onclick="validateSignUp()">  </td>
                    </tr>
                </table> <!-- end of the table -->
            </form> <!-- end of the form  -->   
          </div>
           
        </div>
         
	
	
	
		
	
	<div >
       <?php require 'footer.php' ?>    
	</div>
</div>
</body>
</html>