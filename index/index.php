<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION["loginerror"]))   
{
    $_SESSION["loginerror"]="";     //overite loginerror session variable 
    
     
     
}
 
if(!isset($_SESSION["login_user"]))   //check if loginuser session active or not 
{
    $_SESSION["login_user"]="";     //clear login user name
    
    
}
 
 
    
 if(isset($_POST['test']) )
                    {  
                        if (!(empty($_SESSION['login_user'])))
                    { 
                        require 'shoppingCartFunctions.php'; 
                     
                            $item_code = $_POST['id'];
                            $item_name = $_POST['name'];
                            $sale_price = $_POST['price'];
                            $image = $_POST['image'];
                            $qty = 1;
                            addItemToCart( $item_code , $qty , $item_name , $sale_price, $image );
                           }else
                    {
                        header("location:login.php");
                    }      
                            

                    }
                ?>
<html>
<head>
<link rel="stylesheet" href="../styles/style.css" >
  
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body width = "device-width">
<?php require 'header.php' ?>

    <div class = "main" >
	<div class = "maincontainer" >
		<div class = "slideshow" >
			<img class = "slide"  src = "../images/slide3.jpg" width = "1000px" > 
		</div>
	</div>
	<div class = "navibar" >
		<ul class ="list">
			<li class = "naviItem1"  ><a class = "navitext" id ="firstone" href = "#diabetesCare" ><b>Product Categories</b></a>
			<li class = "naviItem1" ><a class = "navitext" href = "categorypage.php?pageID=1" >Prescription Medicines</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=2" >Diabetes Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=3" >Home Medicines</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=4" >Mother & Baby Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=5" >Personal Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=6" >Wellness</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=7" >Medical Equipments</a>
			<li class = "naviItem1" id = "promotions" ><a class = "navitext"  href = "categorypage.php?pageID=8" >Special Promotions </a>
		</ul>	
	</div>
	</div>
    <!------------------------------------------------------------------------------------------------------------------------>
	<div class = "content" >
	<label class = "categoryname" ><b>Special Promotions</b></label><br>
	<img class = "categoryimg"  src = "../images/items/stock2.png"  > 
		<div class = "productslider" >
			<div class = "slider" >
			
				<?php
                     
                    
                    $con = new mysqli("localhost", "root", "");
                    if ($con->error)
                    {
                        die("Connection Error : ".$con->error );
                    }else
                    {
                        $sql = "SELECT * FROM drugstore.item WHERE main_category = 8 LIMIT 10";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                    echo "<div class = 'itemlayer' id = 'categoryitem'>";
                                    echo "<a href = 'productview.php?item_code=".$row['item_code']."'><img class = 'item' src = '".$row['image_text']."'></a>";
                                    echo "<label class = 'itemname' ><b>".$row['item_name']."<br></b></label>";
                                    echo "<label class = 'itemprice' ><b>LKR ".$row['sale_price'].".00<br></b></label>";
                                    echo "<form method = 'post' action = '' >";
                                     echo "<input type = 'hidden' name = 'id' value = '".$row['item_code']."' >";
                                    echo "<input type = 'hidden' name = 'name' value = '".$row['item_name']."' >";
                                    echo "<input type = 'hidden' name = 'image' value = '".$row['image_text']."' >";
                                    echo "<input type = 'hidden' name = 'price' value = '".$row['sale_price']."' >";    
                                    echo "<input type = 'submit' name = 'test' class ='addtocart' value = 'Add to Cart' ></form></div>";
                                           
                            }
                        }
                    } ?>
				
			 </div>
		 </div>
		
	</div>
	<div class = "content" >
	<label class = "categoryname" ><b>Mother & Baby Care</b></label><br>
	<img class = "categoryimg2"  src = "../images/items/stock3.png"  > 
		<div class = "productslider" >
			<div class = "slider" >
			
				<?php
                     
                    
                    $con = new mysqli("localhost", "root", "");
                    if ($con->error)
                    {
                        die("Connection Error : ".$con->error );
                    }else
                    {
                        $sql = "SELECT * FROM drugstore.item WHERE main_category = 4 LIMIT 10";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo "<div class = 'itemlayer' id = 'categoryitem'>";
                                    echo "<a href = 'productview.php?item_code=".$row['item_code']."'><img class = 'item' src = '".$row['image_text']."'></a>";
                                    echo "<label class = 'itemname' ><b>".$row['item_name']."<br></b></label>";
                                    echo "<label class = 'itemprice' ><b>LKR ".$row['sale_price'].".00<br></b></label>";
                                    echo "<form method = 'post' action = '' >";
                                     echo "<input type = 'hidden' name = 'id' value = '".$row['item_code']."' >";
                                    echo "<input type = 'hidden' name = 'name' value = '".$row['item_name']."' >";
                                    echo "<input type = 'hidden' name = 'image' value = '".$row['image_text']."' >";
                                    echo "<input type = 'hidden' name = 'price' value = '".$row['sale_price']."' >";    
                                    echo "<input type = 'submit' name = 'test' class ='addtocart' value = 'Add to Cart' ></form></div>";
                                           
                            }
                        }
                    } ?>
				
			</div>
		</div>
		
	</div>
	
    <div class = "content" >
	<label class = "categoryname" ><b>Diabetes Care</b></label><br>
	<img class = "categoryimg2"  src = "../images/items/stock4.png"  > 
        <div class = "productslider" >
			<div class = "slider" >
			
				<?php
                     
                    
                    $con = new mysqli("localhost", "root", "");
                    if ($con->error)
                    {
                        die("Connection Error : ".$con->error );
                    }else
                    {
                        $sql = "SELECT * FROM drugstore.item WHERE main_category = 2 LIMIT 10";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo "<div  class = 'itemlayer' id = 'categoryitem'>";
                                    echo "<a href = 'productview.php?item_code=".$row['item_code']."'><img class = 'item' src = '".$row['image_text']."'></a>";
                                    echo "<label class = 'itemname' ><b>".$row['item_name']."<br></b></label>";
                                    echo "<label class = 'itemprice' ><b>LKR ".$row['sale_price'].".00<br></b></label>";
                                    echo "<form method = 'post' action = '' >";
                                     echo "<input type = 'hidden' name = 'id' value = '".$row['item_code']."' >";
                                    echo "<input type = 'hidden' name = 'name' value = '".$row['item_name']."' >";
                                    echo "<input type = 'hidden' name = 'image' value = '".$row['image_text']."' >";
                                    echo "<input type = 'hidden' name = 'price' value = '".$row['sale_price']."' >";    
                                    echo "<input type = 'submit' name = 'test' class ='addtocart' value = 'Add to Cart' ></form></div>";
                                           
                            }
                        }
                    } ?>
				
			</div>
		</div>
		
	</div>
	
</body>
<?php require 'footer.php' ?>   
</html>