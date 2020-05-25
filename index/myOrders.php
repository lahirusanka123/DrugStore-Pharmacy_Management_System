<?php 
require 'myAccountFunction.php';
?>

<!DOCTYPE html>
<html>
<head>

<script src="../scripts/myAccount.js"></script>
<link rel="stylesheet" href="../styles/style.css" >
<link rel="stylesheet" href="../styles/style2.css" >
    
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <title>My Account</title>  
</head>
<body >
<div  width = "device-width">
    
<?php require 'header.php' ?>  
<!-------------------------------------------------------------------------------------------------------------------------------------------------                                                           body section 
--------------------------------------------------------------------------------------------------------------------------------------------------> 
    
    <div class ="pageBody1">
           
       
          
        <?php
          include 'connection.php';
          $orderId = $_GET['orderID'];
          $sql1 = "SELECT * FROM orders WHERE id = '$orderId' ";
          $result = mysqli_query($conn,$sql1);          
          $row = mysqli_fetch_assoc($result);
          $conn->query($sql);
        ?> 
        
          <div id="bDiv">  
              <a id="back" class="btn btn btn-sm" href="myAccount.php"><span class="glyphicon glyphicon-arrow-left"> </span> Back</a>
              
              <table id="mTable"  class="table table-hover"  >
                  <caption>Your Order <?php echo $row['id'] ?></caption>
                <tr style="background-color:#E9E8E8;font-size :17px;" >
                    <th > Order No :- <?php echo $_GET['orderID'] ?></th>
                    <th >Orderd Date :- <?php echo $row['order_date'] ?></th> 
                    <th >  </th>
                    <th > Order Status :-</th> 
                    <th style="color : #130681;" > <?php echo $row['status'] ?> </th>
                </tr>
                  <tr style="background-color:#FAFAFA;">
                    <th ></th>
                    <th >Item Name</th> 
                    <th >Item Price</th>
                    <th > Quantity</th> 
                    <th >Total price </th>
                </tr>
                  
                  <?php
                  include 'connection.php';
                  $orderId = $_GET['orderID'];
                  $sql2 = "SELECT *FROM item, orderitems WHERE  order_id = '$orderId' AND item_id = item_code ";
                  $result = mysqli_query($conn,$sql2);          
                  $result->num_rows;
                  if ($result->num_rows > 0) {
                  while($row2 = $result->fetch_array()) 
                  {?>
                  
                <tr>
                    <td style="height: 50px; padding:10px 0px 10px 20px"><img width="80px" src="<?php echo $row2['image_text'] ?>">   </td>
                    <td style="padding-left: 13px "><?php echo $row2['item_name'] ?></td>
                    <td style="padding-left: 13px ">Rs. <?php echo $row2['sale_price'] ?>.00</td>
                    <td style="padding-left: 40px "><?php echo $row2['qty'] ?></td>
                    <td style="padding-left: 13px ">Rs. <?php echo $row2['sale_price'] * $row2['qty'] ?>.00</td>
                </tr>
              <?php 
                  }
                  }?>
                  <tr style="font-weight: bold;background-color:#E9E8E8;">
                    <td > </td>
                    <td ></td>
                    <td ></td>
                    <td style="padding-left: 40px ">Net Amount -</td>
                    <td style="padding-left: 13px ">Rs. <?php echo $row['total_price'] ?>.00/=</td>
                </tr>
              </table>
          </div>
       
        </div>
         
	
	
	<!-- footer area   --> 
		
	
	<div >
         <?php require 'footer.php' ?>   
	</div>
</div>
</body>
</html>