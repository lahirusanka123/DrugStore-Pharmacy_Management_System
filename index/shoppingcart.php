<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../styles/style.css" >
    <link rel="stylesheet" href="../styles/style3.css" >
   
<body>
<?php session_start();
    
    if (!(empty($_SESSION['login_user'])))
{    
    require 'shoppingCartFunctions.php'; 
    if( !empty($_GET['item_code']) )
        {       $item_code = $_GET['item_code'];
                removeItemFromCart($item_code );
                           
                            

        }
    ?>
<?php require 'header.php' ?>

    
    <div class="shopping-cart-Container">
        <div class = "cart-table" >
            <?php
                    
                    if (empty($_SESSION['cart']))
                    {
                        echo "<img src = '../images/emptySC.png' class = 'error-shoping-cart' width = '800px'>";
                    }
                    else
                    {    
                        $cart =  $_SESSION['cart'];
                       
                         foreach( $cart as $key => $val )
                            {
                                
                                ?>
                                    <div class = 'shopping-item-layer'>
                                        <img class = 'shopping-cart-image' src = '<?php echo $cart[$key]['image']; ?>' ></img> 
                                        <label class = 'shopping-cart-name' ><b>
                                            <?php echo $cart[$key]['name']; ?>
                                        </b></label>
                                        <label class = 'shopping-cart-quantity' >Qty
                                            <?php echo $cart[$key]['qty']; ?>
                                        </label>
                                        <label class = 'shopping-cart-price' ><b> Rs 
                                            <?php echo $cart[$key]['qty'] * $cart[$key]['price'] ; ?>.00</b></label>
                                        <a class ='closeBtn' href ='<?php  echo $_SERVER['PHP_SELF']."?item_code=".$cart[$key]['Id'];    ?>'>X</a> 
                                    </div>
                            <?php
                            
                         }
                    }?>
        </div>
        <div class = "shopping-cart-sidebar" >
            <div class = "shopping-cart-itemlabel" >
                
                
               <?php echo $items;?>
                 Items<br></div>
            
            <div id ="totaltext">Total :</div>
            <div id = "shoping-cart-total">Rs. 
                <?php echo $total;?>.00
                <br></div>
            <a href ="payment.php" class = "checkoutbtn">CHECKOUT</a>
            <div class = "shoping-cart-description" >WE ACCEPT CREDIT CARDS</div>
            <img class= "creditcard-img" id ="first-credit-cart" src ="../images/visa.png" >
             <img class= "creditcard-img" src ="../images/mastercard.png" >
             <img class= "creditcard-img"  src ="../images/american-express.png" >
        </div>
    
    </div>
    <?php require 'footer.php';
    }else
    {
        header("location:login.php");
    }
    
    
    ?>	
   
</body>
</html>