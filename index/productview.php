<!DOCTYPE html>
<?php
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
                            $qty = $_POST['qty'];
                            addItemToCart( $item_code ,$qty,  $item_name , $sale_price, $image );
                      }else
                    {
                        header("location:login.php");
                    }   
                            

                    }
                ?>
<html>
<head>
<link rel="stylesheet" href="../styles/style.css" >
<link rel="script" href="../script/script.jss" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body width = "device-width">
    <div class = "main" >
       
	<?php require 'header.php' ?>
        
	<div class = "navibar1" >
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
          <?php
                $item_code = $_GET['item_code'];
                 $con = new mysqli("localhost", "root", "");
                    if ($con->error)
                    {
                        die("Connection Error : ".$con->error );
                    }else
                    {
                        $sql = "SELECT i.* , c.categoryName FROM drugstore.item i , drugstore.categorylist c WHERE i.item_code = $item_code and i.main_category = c.categoryID";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                    
                
                ?>
	<div class = "maincontainer" >
		<div class = "slideshow" >
		<div class = "slideshow1" >
			<div class = "product-img-container" >
				<img class = "productimg"  src = "<?php echo $row['image_text']; ?>"  > 
			</div>
			<div class = "product-details-container" >
			<label class="product-name" id = "Product-name-data"><b><?php echo $row['item_name']; ?></b></label>
			<br><label style = " color : #02a1be;" >Category : <?php echo $row['categoryName']; ?><label>
			<br>
			<br>
			<div class= "product-quantity-selector" >
            	<form method = 'post' action = '<?php echo $_SERVER['PHP_SELF']."?item_code=$item_code";?>' >
			<label style = "color : #006d96; margin-right : 15px; "><b>Quantity</b></label> 
			<label  style = "cursor: pointer;" id= "leftarrow" onclick = "decrementQuntity()" ><</label>
			<input type="text" value = 1 id = "quantity" width = "10px" name = 'qty' >
			<label style = "cursor: pointer;" id= "rightarrow" onclick="incrementQuntity()" >></label><br>
			 
			</div>
			<div style = "margin-top : 35px;">
			<label id="product-price" for= "610" ><b>LKR <?php echo $row['sale_price'];?>.00</b></label>
			</div>
			<div style = "margin-top : 35px;">
               
                                <input type = 'hidden' name = 'id' value = '<?php echo $row['item_code']; ?>' >
                                <input type = 'hidden' name = 'name' value = '<?php echo $row['item_name']; ?>' >
                                <input type = 'hidden' name = 'image' value = '<?php echo $row['image_text']; ?>' >
                                <input type = 'hidden' name = 'price' value = '<?php echo $row['sale_price']; ?>' >    
                                <input type = 'submit' name = 'test' class ='addtocart' value = 'Add to Cart' ></form>
		
			</div>
			<script>
            
                function incrementQuntity()
                {
                    var value = document.getElementById('quantity').value;
                    var va =  parseFloat(value);	
                    va += 1;
                   document.getElementById('quantity').value = va;
                }
               
                 function decrementQuntity()
                {
                     var value = document.getElementById('quantity').value;
                    var va =  parseFloat(value);
                    if ( va > 1 )
                        {
                            va -= 1;
                   document.getElementById('quantity').value = va;
                        }
                }

                
            
            </script>
			
               
			</div>
			</div>
		</div>
		<div class = "product-des" >
		<p class = "product-description-full">
		<label style = "color : gray;" ><b>DESCRIPTION</b></label><br><br>
		<?php 
            echo $row['description'];
                    }}    ?></div>
				<div class =  "Special-product-tray" >
				
				</div>
						
		
	</div>
	</div>
           	
            <div style="height: 100px; background-color: #02a1be; float: left;width: 100%;" >
       
		<div  >
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/facebook.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/instagram.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/linkedin.png" ></a>
			<a href = "https://www.facebook.com/" ><img class = "socialmediaicons" src = "../images/twitter.png" ></a>
			
			<label id = "contactNo"><b><a style="color : white;" href="file:///C:/Users/DELL/Desktop/Updated%20Project%202018.08.4%20%20%2011.27PM/index/About%20us.html">About Us</a></b></label>
            <label id = "contactNo"><b><a style="color : white;"href="file:///C:/Users/DELL/Desktop/Updated%20Project%202018.08.4%20%20%2011.27PM/index/contac%20us.html">contact us </a></b></label>
		</div  >  
	 
    </div>    
</body>
</html>