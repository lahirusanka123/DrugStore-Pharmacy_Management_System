<?php
     
    require 'connection.php';
    require 'adding_ItemFunction.php';

                          
                
     
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
</head>
<body width = "device-width">
 <?php require 'header.php' ?>   
 
  

<!-------------------------------------------------------------------------------------------------------------------------------------------------                                                                body section 
-------------------------------------------------------------------------------------------------------------------------------------------------->   
       <div class ="pageBody1">
        <div id = "add_itemGrop">  
            <!---------add item form begin here------------->
           <form action="adding_ItemFunction.php" method="POST" enctype="multipart/form-data" onsubmit="return validateAddItems();" >
            <table id="tLeft">
                <tr>
                    <td width="200px" ><label class="adingLable">Item code </label></td>
                    <td>
                        <p id="codeErro"></p>
                        <input type="number" value="<?php echo $row['item_code']+1;  ?>" name="iCode" id="iCode" class="addinform"  > 
                    </td>
                </tr>
                 <tr>
                     <td><label class="adingLable">Item Name</label></td>
                     <td>
                         <p id="nameErro"></p>
                         <input class="addinform"  name="iName" id="iName" type="text" > 
                     </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable"> Main category </label> </td>
                    <td>
                        <p id="categoryErro"></p>
                        <select class="addinform" name="mainCate" id="mainCate"  >
                         <option></option>
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
                         
                         
                           
                        </select> </td>
                 </tr>
               
                     
               
                 <tr>
                     <td><label class="adingLable">Quantity</label> </td>
                    
                     <td>
                         <p id="qtyErro"></p>
                         <input class="addinform" name="qty" id="qty" > 
                     </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable">Sale price</label> </td>                     
                    <td>
                         <p id="priceErro"></p>
                        <input class="addinform" name="sPrice" id="sPrice" > 
                    </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable">Prescription</label> </td>
                    <td>
                        <p id="presErro"></p>
                        <input  type="radio" value="yes"  name="prescription" id="prescription"> yes 
                        <input type="radio" value="no" name="prescription" id="prescriptionNo"> no 
                    </td>
                 </tr>
                 <tr>
                    <td><label class="adingLable">Description</label> </td>
                    <td>
                        <p id="desErro"></p>
                        <textarea   class="tAddinform" name="descrip" id="descrip" maxlength="100" ></textarea> 
                    </td>
                 </tr>
                
        
                
            </table >    
            
             <table id="tRight" >
                <tr>
                    <td > 
                        <p id="imgErro"></p>
                        <img id="additemIMG"  src="../images/396915-200.png" >
                    </td>
                </tr>          
              
                <tr>
                   <td><br><input  type="file" name="img" id="brows" onchange="loadFile(event)" > </td>
                </tr>
                 <tr height="30px">
                    <td></td>
                 </tr>
               
                <tr>
                    <td>
                        <button type="submit" name="add_item"  id="btn-primary" onclick="validateAddItems()" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-plus"></span> Add item</button> 
                        
                        <button  id="editItem"  type="submit" name="eddit_item"  class="btn btn-success btn-lg" ><b><span class="glyphicon glyphicon-edit"></span> Edit Item</b></button>
                        
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
 
</body>
</html>