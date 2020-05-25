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
                    <th>Order Number</th>
                    <th>Date</th>
                     <th>Delevery Date</th>
                     <th>Status</th>
                     <th>Total</th>
                    <th></th>
                    
                </tr>

​<?php
        
  require 'connection.php';

$sql = "SELECT *  FROM orders o , payment p WHERE p.id = o.payment_id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc() )
{
?>
		
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['order_date'];?></td>
                <td><?php echo $row['delivery_date'];?></td>
				<td><?php echo $row['status']?></td>
								<td><?php echo "Rs.".$row['total_price'].".00";?></td>
                
				 </tr>
			 
<?php
    
}
    ?>
			</table>
​		</div>
       
</body>
</html>
​

		