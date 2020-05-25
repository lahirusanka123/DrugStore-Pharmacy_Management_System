    <?php
    
   
   
//-----------------------------------------------------------------------------------------------------------------------------    
    function addItemToCart($item_code ,$qty, $item_name , $sale_price , $image )
    {
       if (isset($_SESSION['cart']))
                            $cart =  $_SESSION['cart'];
    
                if (!(empty($cart)))
            {      
                foreach ($cart as $key => $val )
            {
                 if ( $cart[$key]['Id'] == $item_code )
                 {    
                     $cart[$key]['qty'] += $qty; 
                     $_SESSION['cart'] = $cart;
                    
                     return;
                 }
            }
                array_push( $cart , array('Id' => $item_code , 'name' => $item_name, 'price' => $sale_price , 'qty' => $qty , 'image' => $image ));
                  $_SESSION['cart'] = $cart;
                    
            }else
            {
            $cart[] = array('Id' => $item_code , 'name' => $item_name, 'price' => $sale_price , 'qty' => $qty ,'image' => $image  );
            $_SESSION['cart'] = $cart;
                   
            }
    }
//----------------------------------------------------------------------------------------------------------------------------    
    
    function displayCart()
    {
        foreach( $_SESSION['cart'] as $row )
    {
        echo "ID = ".$row['Id']."<br>Name = ".$row['name']."<br>Price = ".$row['price']."<br>Quantity = ".$row['qty']."<br><br>";
    }
    }
    
//--------------------------------------------------------------------------------------------------------------------------------    
    function removeItemFromCart($item_code )
    {      $cart = $_SESSION['cart'];   
                foreach ($cart as $key => $val )
                {
                    if ( $cart[$key]['Id'] == $item_code )
                    {    
                        unset($cart[$key]);
                         $_SESSION['cart'] = $cart;
                    }
                }
    }
   
   //-----------------------------------------------------------------------------------------------------------------------
function totalPrice()
{   $total = 0;
    $cart = $_SESSION['cart']; 
         foreach ($cart as $key => $val )
                {
                    $total +=   $cart[$key]['price'] *  $cart[$key]['qty'];
                }
    
    return $total;
}
    ?>