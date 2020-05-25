<?php

session_start();

if(isset($_POST['submit']))
{
    if (isset($_SESSION['cart']))
    {    
        require 'connection.php';
        require 'shoppingCartFunctions.php'; 
//---------------------------------------------------------Get Payment Details----------------------------------------------------
        $address = $_POST['address'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $delivery = $_POST['delivery'];
        $time = $_POST['time'];
        $paymentMethod = $_POST['pay'];
        $scheduledate =  $_POST['deliverydate'];
        if ($time == 'getdate')
            $deliverydate = $scheduledate;
        else
            $deliverydate = date('Y-m-d', time());
//-------------------------------------------------------------------------------------------------------------------------------
        $sql1 = "INSERT INTO payment ( address, city, phone, country, delivery, delivery_date, payment_method) VALUES ('$address', '$city', '$phone', '$country', ' $delivery', '$deliverydate', '$paymentMethod')";
        
//----------------------------------Insert Payment Detail Query------------------------------------------------------------------       
 if ($conn->query($sql1))
        {
            $payment_id = $conn->insert_id;
            $cart = $_SESSION['cart'];

            $customer_id =  $_SESSION['customer_id'];
            $date = date('Y-m-d', time());
            $total = totalPrice();
            
     
             if( !empty($_SESSION['prescription_id']) )
             {
                  $status = "on process";
                  $prescription_id = $_SESSION['prescription_id'];
             }else
             {
                $status = "completed";
                  $prescription_id = 0; 
             }
           

            $sql2 = "INSERT INTO orders ( customer_id, payment_id, prescription_id ,order_date, status, total_price ) VALUES ( $customer_id, $payment_id ,$prescription_id , '$date', '$status' , $total )";



            if ($conn->query($sql2))
            {
                $order_id = $conn->insert_id;


                foreach( $cart as $key => $value )
                {
                    $item_id = $cart[$key]['Id'];
                    $qty = $cart[$key]['qty'];
                    $totalprice = $cart[$key]['qty'] * $cart[$key]['price'];

                    $sql3 = "INSERT INTO orderitems( order_id, item_id, qty, total_price) VALUES ( $order_id, $item_id, $qty, $totalprice)";
                    if ($conn->query($sql3))
                    {
                        $sql4 = "SELECT qty FROM item WHERE item_code =  $item_id";
                        $result = $conn->query($sql4);
                        $row = $result->fetch_array();
                        $newqty = $row['qty'];
                        $newqty = $newqty - $qty;
                        $sql5 = "UPDATE item SET qty = $newqty WHERE  item_code = $item_id";
                        if ($conn->query($sql5) )
                        {
                            
                        }else
                        {
                            echo "QTY update Error";
                        }
                    }else
                    {
                        echo "Item Placed Error";
                    }

                }

               unset($_SESSION['cart']);
                  unset($_SESSION['prescription_id']);
?>
<!DOCTYPE html>
<?php 
  
    require 'header.php' ?>
<html>
<head>
    <style>
     h2 {color:#006d96;
    padding-bottom: 0px;
        text-align:center;
        }
    
    </style>
   
<link rel="stylesheet" href="../styles/style.css" >
    <link rel="stylesheet" href="../styles/style3.css" >
    <link rel="stylesheet" href="../styles/style4.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    

</head>
<body width = "device-width">


    <div class = "main" >
	   <div class = "orderplaced" >
           <h2>Your Order is confirmed</h2>
           <h4 style="color:gray; float :left; margin:0px 5px;">Order No: <?php echo $order_id;  ?></h4>
            <h4 style="color:gray; float :right; margin:0px 5px;">Order Date: <?php echo $date; ?></h4><br>
            <hr>
           <br>
           <table>
           <?php
        $total = 0;
        require 'connection.php';
        $sql6 = "SELECT i.item_name, o.qty , o.total_price FROM orderitems o , item i WHERE o.order_id = $order_id AND o.item_id = i.item_code";
        $result6 = $conn->query($sql6);
        while ($row6 = $result6->fetch_array())
        {
            ?>
           
           <tr>
            <td><?php echo $row6['item_name'] ;?></td>
               <td>QTY <?php echo $row6['qty'] ;?></td>
               <td>Total Rs.<?php echo $row6['total_price'] ;?>.00</td>
            </tr>
              
               <?php
            $total +=  $row6['total_price'];
            
        }
            ?>
           </table>
           <h5 style="color:gray; margin : 0px 35px; float :left;" >Shipping Details : </h5>
           <h5 style="color:gray; margin : 0px 35px; float :right;" >Total : Rs.<?php echo $total;?>.00</h5><br>
           <h5 style="color:gray; margin : 0px 35px; float :left;" ><?php echo "$address,$city,$country"; ?></h5>
             <h5 style="color:gray; margin : 0px 35px; float :right;" >Status : <?php echo "$status"; ?></h5>
           
        </div>
        
    </div>
    <?php  require 'footer.php';  
      
               

            }else
            {
                echo "Order Error";
            }
    }else
            {
                echo "Payment Error";
            }
 }


}
    ?>
</body>
</html>