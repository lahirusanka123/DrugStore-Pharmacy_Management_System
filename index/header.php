<head>
<link rel="stylesheet" href="../styles/style.css" >
</head>
<?php
 $items = 0;
 $total = 0;
if (isset($_SESSION['cart']))
    {   $cart =  $_SESSION['cart'];
               
        foreach( $cart as $key => $val )
        {    $items++;   
            $total += $cart[$key]['qty'] * $cart[$key]['price'] ;
            
        }

    }

?>
<div class = "header" >
		<div class = "subheader" >
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/facebook.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/instagram.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/linkedin.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/twitter.png" ></a>
			
             <!----- display logn and  logout links -->
            <label id = "logbtn"> 
                <?php
                     if ( !($_SESSION['login_user']) )
                     { 
                       echo "<b><a href='login.php' class = 'loginbtn' >Log in</a></b>";
                    
                         
                     }
                     else
                     { 
                        echo "<b><a  href='logout.php' class = 'loginbtn' >Log out</a></b>";
                                                            
                     }
                
                    
                ?>
            </label>
			
            
        
            <!--- display username according to user type here -->
            <label id = "logname">
                <b>
                    <?php
                    if (isset($_SESSION['admin']))
                    {    
                        if ($_SESSION['admin'] == 1 )
                        {
                          
                           echo "<a href='adminpage.php'>      
                           <p style='float :right; margin : 0px 20px 0px 8px; font-size : 15px;color:white'>Admin" .$_SESSION["login_user"]."</p>  </a>";

                            
                        }
                        else
                        {
                         
                           echo "<a href='myAccount.php'> 
                                 <p style='float :right; margin : 0px 20px 0px 8px; font-size : 15px;color:white'>Hi ".$_SESSION["login_user"]."</p></a>";
                           
                        }
                    }
                    else//to display user name after create account
                    {
                       if (isset($_SESSION['email_address']))
                       {
                           echo "<a href='myAccount.php'> 
                                 <p style='float :right; margin : 0px 20px 0px 8px; font-size : 15px;color:white'>Hi ".$_SESSION["login_user"]."</p></a>";
                       }
                    }
                    ?>
              
                </b>
            </label>
            
            <!--- display contact number here -->
             <label id = "contactNo"><b>Contact No : 011 233 2334</b></label>
           
           
			
		</div>
		<div class = "mainheader" >
			<div class = "header-logo"  >
			<a href = "index.php" >
				<img class = "logo" src = "../images/logo.jpg" >
			</a>
            </div>
			
           
			    
             <div class = "header-buttons" style ="width : 70%;height : auto; float :left; background-color : white;"  >
                      <form method="post" action = "searchResultnew.php" >
                      <input id = "search" type="text" name="search" placeholder="Search..">	
                      <input type="submit" name = "submit" value = "Search"  id ="uploadPrescriptionBtn">
              
                     <a  href = "shoppingcart.php" id ="cartBtn" style=" text-decoration: none;" ><?php echo $items;?> ITEMS - Rs.<?php echo $total;?>.00</a>
              </form>
  
			 </div> 
                  
		
		</div>
		
</div>
