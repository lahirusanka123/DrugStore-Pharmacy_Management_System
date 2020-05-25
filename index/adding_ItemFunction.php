<?php 
require 'connection.php';
session_start();


  //-----------to select last item number-------------
  $sql = "SELECT item_code FROM item ORDER BY item_code DESC";
  $result = mysqli_query($conn,$sql); 
  $row = mysqli_fetch_assoc($result);
  $conn->query($sql);
      


  //-------- for add item to the data base-----------------------------

    // check if add item button click            
    if(isset($_POST['add_item']))
    {
        $itemCode = $_POST['iCode'];
        $itemName = $_POST['iName'];
        $itemMaincategory = $_POST['mainCate'];
        $itemqty = $_POST['qty'];
        $itemSalePrice = $_POST['sPrice'];
        $itemPres = $_POST['prescription'];
        $itemDescrip = $_POST['descrip'];
     
    
    
         

            //to Get image name
            $image = $_FILES['img']['name'];
            
            // image file directory
            $target = "../images/".basename($image);

            $sql = "INSERT INTO item (item_code,item_name,main_category,qty,sale_price,prescription,description, image_text) VALUES ('$itemCode','$itemName','$itemMaincategory','$itemqty','$itemSalePrice','$itemPres','$itemDescrip','$image')";
                          

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
               
               
            }
    
            else
            {
                    echo "Error :".$sql."<br>".$conn->error;
            }
 
          
           header('location: adding_item.php'); 
            
    }

    //-------- for edit item-----------------------------

     
     
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