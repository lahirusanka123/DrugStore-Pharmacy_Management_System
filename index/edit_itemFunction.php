<?php
 
     
    require 'connection.php';
   session_start();
        $itemCODE = $_SESSION['itemcode'];
        
        $sql = "SELECT i.* , c.categoryName,c.categoryID FROM item i , categorylist c WHERE i.item_code = '$itemCODE' AND c.categoryID = i.main_category";
        $result = mysqli_query($conn,$sql); 
        $row1 = mysqli_fetch_assoc($result);
        $conn->query($sql);

    if(isset($_POST['update_item']))
    {
        $itemCode = $_POST['iCode'];
        $itemName = $_POST['iName'];
        $itemMaincategory = $_POST['mainCate'];
        $itemqty = $_POST['qty'];
        $itemSalePrice = $_POST['sPrice'];
        $itemPres = $_POST['prescription'];
        $itemDescrip = $_POST['descrip'];
        
        
        //to Get image name
        if(isset($_FILES['img']))
        {   
            $image = "../images/items/".$_FILES['img']['name'];
        }
        else
        {
            
            $image = $row1['image_text'];
        }
        // image file directory
        $target = "../images/items/".basename($image);
        
        
        // sql to upload item 
        $sql = "UPDATE item SET item_name = '$itemName', main_category = '$itemMaincategory', qty = '$itemqty' , sale_price = '$itemSalePrice', prescription = '$itemPres', description = '$itemDescrip', image_text= '$image' WHERE item_code = '$itemCode'";
        
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) 
            {
                $msg = "Image uploaded successfully";
            }
            else
            {
                $msg = "Failed to upload image";
            }
    
    
           if($conn->query($sql)==TRUE)
            {
               echo "New record created successfully";
               header("Location: adding_item.php");
               
            }
    
            else
            {
                    echo "Error :".$sql."<br>".$conn->error;
            }
 
       
    }
    if(isset($_POST['eddit_item']))
    {
        $_SESSION['itemcode'] = $_POST['iCode'];
        
        header('location: edit_item.php');

    }
           

     if(isset($_POST['delete_item']))
    {
         $itemCode = $_POST['iCode'];
        
        $sql = "DELETE FROM item WHERE item_code = $itemCode";
        
        if($conn->query($sql)==TRUE)
            {
               echo "New record created successfully";
               header("Location: adding_item.php");
               
            }
    
            else
            {
                    echo "Error :".$sql."<br>".$conn->error;
            }
        
    }
        
     
?>