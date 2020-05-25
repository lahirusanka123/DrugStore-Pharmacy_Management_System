<!DOCTYPE html>
<?php

session_start();
require 'connection.php';

if(isset($_SESSION['cart']))
    {    $cart = $_SESSION['cart'];

        foreach( $cart as $key => $value )
        {
           $item_code = $cart[$key]['Id'];
            $sql = "SELECT prescription FROM item WHERE item_code =  $item_code";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                if ( $row['prescription'] == 'yes' )
                    
                    if( empty($_SESSION['prescription_id']) )
                    {
                    header('location: uploadprescription.php');
                    break;
                    }
            }
        }

    }






?>
<html>
<head>
<style>
h5 {color:black;}
h2 {color:#006d96;
    padding-bottom: 0px;}
    
    input[type=text], select {
    width: 100%;
    padding: 5px 20px;
    margin: 8px 10px;
        font-size: 15px;
    display: inline-block;
    border: 1px solid gray;
    border-radius: 4px;
    box-sizing: border-box;
}
    
     input[type=date]{
    width: 50%;
    padding: 5px 20px;
    margin: 8px 10px;
        font-size: 15px;
    display: inline-block;
    border: 1px solid gray;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
<link rel="stylesheet" href="../styles/style.css" >
    <link rel="stylesheet" href="../styles/style4.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body >
   
<div class = "main">
	<?php require 'header.php' ?>
	   <form method = "post" action = "orders.php">
		<div class = "addressdetails" >
		<h2>2 ADDRESSES</h2>
			 <table>
                 <tr><td>Street Address</td><td><input type = "text" name = "address"></td></tr>

				 <tr><td>City</td><td><input type = "text" name = "city"></td></tr>
			
				 <tr><td>Phone</td><td><input type = "text" name = "phone"></td></tr>
			
				 <tr><td>Country</td><td><input type = "text" name = "country"></td></tr>
			</table>
         </div>

			<div class = "addressdetails" >		
		<h2>3 SHIPPING METHOD</h2>

			
			<input type = "radio" name="delivery" value ="normal">  Normal delivery <input type = "radio" name="delivery" value = "doorstep">  Doorstep delivery
			
			
		
				<br>
					<h5>When would you like to get your order delivered?</h5>
				
						<input type = "radio"name="time" >Deliver Now<br/><br/>
						<input type = "radio"name="time" value = "getdate" >Date <input type = "date" name="deliverydate" ><br/>
					
						<h5>Shipping cost will be: LKR 150.00(shipping cost very based on location)</h5>
    </div>
<div class = "addressdetails" >
					<h2>4 PAYMENT METHOD</h2>
				    <table>
                        <tr><td><input type = "radio"name="pay" value="Credit/Debit Card" ></td><td>Pay by Credit/Debit Card</td></tr>
					
	`				
					<tr><td><input type = "radio"name="pay" value="Cash On"></td><td>Pay by cash on Delivery</td></tr>
					
					
					<tr><td><input type = "radio"name="pay" value ="Company Insurance"></td><td>Pay by Company Insurance</td></tr>
					
					<tr><td><input type = "radio"name="pay" value = "Bank" ></td><td>Pay by Bank</td></tr>
					</table>
			
					
						<img src="../images/cards/visaC.png" width = "60px" style="margin-left : 25px;">
						<img src="../images/cards/masterC.png" width = "60px">
						<img src="../images/cards/americanEX.png" width = "60px">
				
				
		
				
				<input type="submit" class="subbutton" value="CONTINUE" name = "submit">
				
				
    </div>
</form>
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
 
    </div> 
</div>
</body>
</html>