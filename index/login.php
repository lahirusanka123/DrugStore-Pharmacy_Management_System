<?php
  
session_start();

if(!isset($_SESSION["loginerror"]))   
{
    $_SESSION["loginerror"]="";     //clear "This account does not exist on DrugStore" error msg
     
       
}
if (!(empty($_SESSION['login_user'])))  
{
  
    header("location:index.php");
       
}

 
?>

<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="stylesheet" href="../styles/style.css" >
<link rel="stylesheet" href="../styles/style2.css" >
    
<script src="../scripts/login.js"></script>  
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
</head>
<body >
 <div id="a">

     
<?php require 'header.php' ?>
<!-------------------------------------------------------------------------------------------------------------------------------------------
                                                               body section
-------------------------------------------------------------------------------------------------------------------------------------------->
        <div class = "pageBody">
            
            <div  id = "loginPic" > <!-- -------------  Doctor image area -->
                <img Id="loginImg"   src="../images/2.png">
            </div>
        
            <div id ="loginForm">
				<div class = "loginform-back" >
                <label style="color: #2439AD" id="signInfont"> <b> Sign In <br> </b></label>
                <label style="color: #14A57C"><b>Order your monthly medicines and get delivered doorstep<br> </b></label>
                 
                    
                    <span id="validatuser"><?php echo "<p style='color:red; text-align:center;'>".$_SESSION["loginerror"]."</p>" ;  ?></span>
                    
                    <form action="loginFunction.php" method="POST" onsubmit="return validateLogin()">  <!-- ---------------------- login form begin -->        
                    <table width="100%">
                        <tr>
                            <td width="100%"><lable class="Stext" ><b>Email</b><br>  </lable> <label id="vEmail"></label> </td>
                        </tr>
                        <tr>
                            <td><input class="signText"  type="email" name="email" id="tEmail" min="5"  >  </td>                
                        </tr>
                        <tr>
                            <td><lable class="Stext"><b>Password</b><br> </lable>  <label id="vPassword"></label> </td>
                        </tr>
                        <tr>
                            <td><input class="signText" type="password" name="pwd" id="pwd"  >  </td>
                        </tr>
                        <tr>
                            <td><a href="createAccount.php" style = "text-decoration : none;  margin-top : 2px ; color : gray ; font-size : 15px;"><br><span class="glyphicon glyphicon-user"></span> Create a New Account</a>              
                        
                            <input id="signinButton" style="float: right" type="submit" name="login" value="Sign in" onclick="validateLogin()"> </td>  
                        </tr>    
                   </table>
                  </form>  <!-- ----------------------------- end of the form -->       
                </div>
            </div>
        </div>
	
	
	
		
	
	<div >
         <?php require 'footer.php' ?>   
	</div>
    </div>
</body>
</html>