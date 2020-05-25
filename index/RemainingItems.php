<?php 
    session_start();

    require 'header.php' ?>
<html>
<head>
<link rel="stylesheet" href="../styles/style.css" >
    <link rel="stylesheet" href="../styles/style3.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    

</head>
			
		
	<div class = "remainingitemscontent" >
​
 <div class="itemcodeAndSearch">
			<label style= float:left>Item Code </label>
			<input type="text" name="Item Code" placeholder="Item code" style= width:250px;float:left;border-radius:5px>
			<input type="text" name="search" placeholder="Search.." style= width:250px;float:right;border-radius:5px>	
			<label style= float:right>Search </label>
			</div><table>
                <tr>
                    <th>Item Code</th>
                    <th></th>
                     <th>Item Name</th>
                     <th>Category Name</th>
                     <th>Price</th>
                    <th>Quantity</th>
                     <th>Edit/Delete</th>
                </tr>

​<?php
        
  require 'connection.php';

$sql = "SELECT i.* , c.categoryName FROM item i, categorylist c WHERE i.main_category = c.categoryID";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc() )
{
?>
		
			<tr>
				<td><?php echo $row['item_code'];?></td>
                <td><img src="<?php echo $row['image_text'];?>" width = "50px"></td>
				<td><?php echo $row['item_name'];?></td>
                <td><?php echo $row['categoryName'];?></td>
				<td><?php echo $row['sale_price'].".00";?></td>
								<td><?php echo $row['qty'];?></td>
                <td><a style="color:white;margin-left:10px;text-decoration:none;padding:6px 10px;background-color: #4CAF50;border-radius:5px;font:helvetica;font-size:13px;" href ="edit_timetable.php?id=<?php echo $row['id']; ?>" ><b>Edit</b></a>
					<a style="color:white;margin-left:10px;text-decoration:none;padding:6px 10px;background-color: #ff4f4f;border-radius:5px;font:helvetica;font-size:13px;margin-right:10px;" href ="<?php echo $_SERVER['PHP_SELF'];?>?delete_id=<?php echo $row['id']; ?>" ><b>Delete</b></a>
                </td>
				 </tr>
			 
<?php
    
}
    ?>
			</table>
​		</div>
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
​

		