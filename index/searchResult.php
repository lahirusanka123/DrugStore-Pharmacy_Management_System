<!DOCTYPE html>
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
			<li class = "naviItem1" ><a class = "navitext"  href = "#personalCare" >Personal Care</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "#wellness" >Wellness</a>
			<li class = "naviItem1" ><a class = "navitext"  href = "#equipments" >Medical Equipments</a>
			<li class = "naviItem1" id = "promotions" ><a class = "navitext"  href = "#diabetesCare" >Special Promotions </a>
		</ul>	
	</div>
	
	
	
	<div class = "container" >
		<div class = "itemholder" >
				<?php
                        $search = null;
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
                                    echo "<button class ='addtocart'  ><b>Add to Cart</b></button></div>";
                            }
                        }else
                        {
                                
                        }
                            
                    }

                ?>
					
				</div>
	</div>
	</div>
	
	<script src="../scripts/addingItems.js" ></script>		
   <?php require 'footer.php' ?>
</body>
</html>