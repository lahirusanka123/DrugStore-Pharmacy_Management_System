<?php 
require 'myAccountFunction.php';
?>

<!DOCTYPE html>
<html>
<head>

<script src="../scripts/myAccount.js"></script>
<link rel="stylesheet" href="../styles/style.css" >
<link rel="stylesheet" href="../styles/style2.css" >
    
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
  <title>My Account</title>  
</head>
<body >
<div  width = "device-width">
    
<?php require 'header.php' ?>  
    
<!-------------------------------------------------------------------------------------------------------------------------------------------------                                                           body section 
--------------------------------------------------------------------------------------------------------------------------------------------------> 
    
    <div class ="pageBody1">
           
      <div id="wrap">  <!-- user account details area  -->  
       <form action="myAccountFunction.php" method="POST" onsubmit="return validateSignUp()">    
        <div id = "lDiv">  <!-- left side dive -->       
                     
                <table  >
                    
                    <tr >
                        <td  width="150px" ><lable class="Stext">  <b>First Name</b></lable>  </td> <td  ><p id="fnameErro"></p> 
                        <input name="fname" id="fname" class="mText"  type="text" value="<?php echo $row['f_name'];  ?>" >  </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Last Name</b></lable> </td> <td><p id="lnameErro"></p>
                        <input name="lname" id="lname" class="mText" type="text" value="<?php echo $row['l_name'];  ?>" > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Date of Birth</b></lable> </td> <td><p id="dateErro"></p>
                        <input name="dob" id="dob" class="mText" type="date" value="<?php echo $row['birthday'];  ?>" > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b> Gender </b> </lable></td> 
                        <td>
                            <p id="genderErro"></p>
                            
                            <input id="male" style="margin-top: 10px"  type="radio" name="gender" value="Male" <?php echo ($row['gender']=='Male')?'checked':''  ?> > 
                            <lable> Male </lable>
                            
                            <input id="female" class="" type="radio" name="gender" value="Female"  <?php echo ($row['gender']=='Female')?'checked':''  ?> > 
                            <label> Female </label> 
                        </td>
                    </tr>
                    <tr>
                        <td  ><lable class="Stext"><b>Phone Number</b></lable> </td> <td><p id="phoneErro"></p>
                        <input name="phoneNo" id="pNo" class="mText" type="number" value="<?php echo $row['phone_no'];  ?>" > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Email</b></lable> </td> <td><p id="emailErro"></p>
                        <input name="email" id="email" class="mText" type="email" value="<?php echo $row['email_address'];  ?>" > </td>
                    </tr>
                   
                </table> 
            
          </div>  
          <div id="rDiv"> <!-- right side dive  -->  
              
              <table >
                 
                    <tr>
                        <td width="150px" > </td> <td><label style="font-size: 12px; color: #006d96"> ------------------- Change password ---------------------- </label></td>
                    </tr>
                     
                    <tr>
                        <td><lable class="Stext"><b>Password</b></lable> </td> <td><p id="pwdErro"></p>
                        <input name="pwd" id="pwd" class="mText" type="password" > </td>
                    </tr>
                    <tr>
                        <td><lable class="Stext"><b>Re-Type Password</b></lable> </td> <td><p id="rePwdErro"></p>
                        <input name="rEpwd" class="mText" id="rePwd" type="password" > </td>
                    </tr>
                    
                    <tr>
                        <td></td><td><input id="signinButton" name="save" style="float: right" type="submit" onclick="validateSignUp()" value="Save">  </td>
                    </tr>
             </table>
       
          </div>
         </form> 
        </div>
           
<!------------------------------------------------------------------------------------------------------------------------------------------------                                                              order details area 
------------------------------------------------------------------------------------------------------------------------------------------------->          
          <div id="bDiv">  
              <table id="mTable"  class="table table-striped"  >
                  <caption>Your Orders </caption>
                  <tr >
                    <th > Order No </th>
                    <th >Orderd Date</th> 
                    <th > Total price</th> 
                    <th > Order Status</th>
                    <th > </th>
                </tr>
                  
                  <?php
                  include 'connection.php';
                  $sql2 = "SELECT o.id,o.status,o.order_date,o.total_price FROM orders o,customer c WHERE o.customer_id = c.id AND c.email_address = '$email' ";
                  $result = mysqli_query($conn,$sql2);          
                  $result->num_rows;
                  if ($result->num_rows > 0) {
                  while($row2 = $result->fetch_array()) 
                  {?>
                  
                <tr>
                    <td style="height: 50px; padding:10px 0px 10px 20px"> <?php echo $row2['id'] ?>  </td>
                    <td style="padding-left: 13px "><?php echo $row2['order_date'] ?></td>
                    <td style="padding-left: 40px ">Rs. <?php echo $row2['total_price'] ?>.00</td>
                    <td style="padding-left: 13px "><?php echo $row2['status'] ?></td>
                    <td style="padding-left: 13px "><a href="myOrders.php?orderID=<?php echo $row2['id'] ?>"> View <span class="glyphicon glyphicon-folder-open"></span></a> </td>
                </tr>
                  <?php 
                    }
                    }?>
              </table>
          </div>
        
        </div>
         
	
	
	<!-- footer area   --> 
		
	
	<div  >
         <?php require 'footer.php' ?>   
	</div>
</div>
</body>
</html>