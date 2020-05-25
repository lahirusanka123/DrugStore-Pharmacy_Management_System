<!DOCTYPE html>
<?php
$search = null;
session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>
<div class = "main" >
	<?php require 'header.php' ?>
	
	<div class = "categorynavibar" >
		<ul>
			<li class = "naviItem1"  ><a class = "navitext" id ="firstone" href = "#diabetesCare" ><b>Product Categories</b></a>
			<li class = "naviItem1" ><a class = "navitext" href = "#diabetesCare" >Prescription Medicines</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=2" >Diabetes Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=3" >Home Medicines</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=4" >Mother & Baby Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=5" >Personal Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=6" >Wellness</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "categorypage.php?pageID=7" >Medical Equipments</a>
			<li class = "naviItem1" id = "promotions" ><a class = "navitext"  href = "categorypage.php?pageID=8" >Special Promotions </a>
		</ul>	
	</div>
	
	
	
	<div class = "container" >
		<div class = "itemholder" >

                    <?php
                        
                        $search = $_POST['search'];
                          
                       
                        
                    $con = new mysqli("localhost", "root", "");
                    if ($con->error)
                    {
                        die("Connection Error : ".$con->error );
                    }else
                    {
                        $sql = "SELECT DISTINCT * FROM drugstore.item i , drugstore.categorylist c WHERE i.main_category = c.categoryID AND ( i.item_name LIKE '%$search%' OR c.categoryName LIKE '%$search%' OR i.description LIKE '%$search%' )  ";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo "<div class = 'itemlayer' id = 'categoryitem'>";
                                    echo "<a href = 'productview.php?item_code=".$row['item_code']."'><img class = 'item' src = '".$row['image_text']."'></a>";
                                    echo "<label class = 'itemname' ><b>".$row['item_name']."<br></b></label>";
                                    echo "<label class = 'itemprice' ><b>LKR ".$row['sale_price'].".00<br></b></label>";
                                    echo "<form method = 'post' action = '".$_SERVER['PHP_SELF']."?search=$search' >";
                                     echo "<input type = 'hidden' name = 'id' value = '".$row['item_code']."' >";
                                    echo "<input type = 'hidden' name = 'name' value = '".$row['item_name']."' >";
                                    echo "<input type = 'hidden' name = 'image' value = '".$row['image_text']."' >";
                                    echo "<input type = 'hidden' name = 'price' value = '".$row['sale_price']."' >";    
                                    echo "<input type = 'submit' name = 'test' class ='addtocart' value = 'Add to Cart' ></form></div> ";
                                           
                            }
                        }
                    } ?>
  
					
				</div>
	</div>
	</div>
	
		
   <?php require 'footer.php' ?>
</body>
</html>