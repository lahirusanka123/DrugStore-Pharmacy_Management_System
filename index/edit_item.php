<?php 
    require 'edit_itemFunction.php';
?>

                          
                
     
 
<!DOCTYPE html>
<html>
<head>
  
    
    <script src="../scripts/adding_item.js"></script> 
    <link rel="stylesheet" href="../styles/style.css" >
	<link rel="stylesheet" href="../styles/style2.css" >
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
    <title>Edit Item</title>
    
</head>
<body >
<div  width = "device-width">
    
<?php require 'header.php' ?>   
<!-------------------------------------------------------------------------------------------------------------------------------------------------                                                                body section 
--------------------------------------------------------------------------------------------------------------------------------------------------> 
       <div class ="pageBody1">
           <a id="back" class="btn btn btn-sm" href="adding_item.php"><span class="glyphicon glyphicon-arrow-left"> </span> Add Item</a>
        <div id = "add_itemGrop">  
           <form action="edit_itemFunction.php" method="POST" enctype="multipart/form-data" ><!---------add item form begin here------------->
            <table id="tLeft">
                <tr>
                    <td width="200px" ><label class="adingLable">Item code </label></td><td>
                    <input type="number" value="<?php echo $_SESSION['itemcode'];?>" name="iCode" class="addinform"  > </td>
                </tr>
               
                 <tr>
                    <td><label class="adingLable">Item Name</label></td><td><input class="addinform" value="<?php echo $row1['item_name'];  ?>" name="iName" type="text" > </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable"> Main category </label> </td>
                    <td><select class="addinform" name="mainCate"  >
                          
                        
                         <?php echo"<option value='".$row1['categoryID']."'>".$row1['categoryName']."</option>"; ?> 
                         <?php
                          $sql = "SELECT * FROM categorylist ";  
                          $result = mysqli_query($conn,$sql); 
                          $result -> num_rows;
                          if($result -> num_rows > 0)
                          {
                            while($row = $result->fetch_array())
                            {
                            echo"<option value='".$row['categoryID']."'>".$row['categoryName']."</option>";
                           
                            }
                          }
                         ?> 
                            
                        </select> 
                     </td>
                 </tr>
               
                     
               
                <tr>
                    <td><label class="adingLable">Quantity</label> </td><td><input class="addinform" name="qty" value="<?php echo $row1['qty'];  ?>" > </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable">Sale price</label> </td><td><input class="addinform" name="sPrice" type="number" value="<?php echo $row1['sale_price'];  ?>" > </td>
                 </tr>
                
                 <tr>
                    <td><label class="adingLable">Prescription</label> </td>
                     <td>
                         <input  type="radio" value="yes"  name="prescription" <?php echo ($row1['prescription']=='yes')?'checked':''  ?> > 
                         <label> Yes </label>
                         
                         <input type="radio" value="no" name="prescription" <?php echo ($row1['prescription']=='no')?'checked':''  ?> > 
                         <label> No </label>
                     </td>                                          
                 </tr>
                
                 <tr>
                    <td><label class="adingLable">Description</label> </td><td><textarea    class="tAddinform" name="descrip" maxlength="100" ><?php echo $row1['description'];  ?></textarea> </td>
                 </tr>
                
                     
                
            </table >    
            
             <table id="tRight" >
                <tr>
                    <td > <img id="additemIMG"  src="../images/<?php echo $row1['image_text'];  ?>" ></td>
                </tr>          
              
                <tr>
                   <td><br>
                       <input  type="file" name="img" id="brows" onchange="loadFile(event)" >
                
                   </td>
                </tr>
                 <tr height="30px">
                    <td></td>
                 </tr>
               
                <tr>
                    <td>
                        <button type="submit" name="update_item"   class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-repeat"></span> Update Item</button> 
                        <button type="submit" name="eddit_item"  class="btn btn-success btn-lg" ><b><span class="glyphicon glyphicon-search"></span> Find Item</b></button>
                        <button type="submit" name="delete_item" class="btn btn-danger btn-lg" ><b><span class="glyphicon glyphicon-trash"></span> Delete Item</b></button>
                    </td>
                </tr>
              
            </table>       
          </form> <!---------add item form end here------------->
        </div>
           
      </div>
         
	
	
	 
 
 
		
	
	<div  >
        <?php require 'footer.php' ?>   
	</div>
</div>
</body>
</html>