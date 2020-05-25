

<?php 
    session_start();
 require 'connection.php';
    require 'header.php' ?>
<html>
<head>
<link rel="stylesheet" href="../styles/style.css" >
    <link rel="stylesheet" href="../styles/style3.css" >
    <link rel="stylesheet" href="../styles/style4.css" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart", "line"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Date', 'Orders'],
 <?php 
 $query = "SELECT order_date , COUNT(id) as 'orders' FROM orders GROUP BY order_date";
$result = $conn->query($query);
 
 while($row = $result->fetch_array() ){

 echo "['".$row['order_date']."',".$row['orders']."],";
 }
 ?>
 
 ]);

 var options = {
 title: 'Date wise Orders'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
 chart.draw(data, options);
 }
 </script>
</head>
<body width = "device-width">


    <div class = "main" >
	   <a href = "adding_item.php" >
		<div class = "box"  >
            <div class = "box1" id = "box1">
                <img class = "boximg" src ="../images/add-gold-ingots.png" >
            </div>
            <div class="box2" >
                <div class = "boxtext1" id = "b11" >Add Items</div>
                <div class = "boxtext2" id = "b12">More Info</div>
            </div>     
        </div></a>
        <a href = "RemainingItems.php" >
        <div class = "box"  >
            <div class = "box1" id = "box2">
                <img class = "boximg" src ="../images/asd.png" >
            </div>
            <div class="box2" >
                <div class = "boxtext1" id = "b21" >Item Details</div>
                <div class = "boxtext2" id = "b22">34</div>
            </div>     
        </div></a>
        <a href = "completeorders.php" >
        <div class = "box"  >
            <div class = "box1" id = "box3">
                <img class = "boximg" src ="../images/order.png" >
            </div>
            <div class="box2" >
                <div class = "boxtext1" id = "b21" >New Orders</div>
                <div class = "boxtext2" id = "b22">28</div>
            </div>
        </div></a>
        
        <div class = "box"  >
            <div class = "box1" id = "box4">
                <img class = "boximg" src ="../images/prescription.png" >
            </div>
            <div class="box2" >
                <div class = "boxtext1" id = "b31" >Prescriptions</div>
                <div class = "boxtext2" id = "b32">16</div>
            </div> 
        </div>
        
        	</div>
    <div class = "main" >
        <!-----------------------------------------------chart-------------------------------------------->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div" style="margin-left : 150px ;width: 1200px; height: 300px;"></div>
       
    
      

	</div>
    <!------------------------------------------------------------------------------------------------------------------------>
	
	
	

	
</body>
</html>