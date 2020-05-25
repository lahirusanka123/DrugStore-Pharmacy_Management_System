<?php 
session_start();
require 'header.php'; 
require 'connection.php';
  if(isset($_POST['upload']))
{
    $image = $_FILES['file']['name'];
            
            // image file directory
            $target = "../images/prescriptions/".basename($image);

            $sql = "INSERT INTO prescriptions( image_text) VALUES ('$target')";
                          

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) 
            {
                $msg = "Image uploaded successfully";
                  if($conn->query($sql))
            {
                      $id = $conn->insert_id;
                $_SESSION['prescription_id'] = $id;
                 header('Location: payment.php');
               
               
            }
    
            else
            {
                    echo "Error :".$sql."<br>".$conn->error;
            }
            }
            else
            {
                $msg = "Failed to upload image";
            }
   
     
}
    
    
    
    
?>
<html>
    <style>
        .pre{
            width : 40%;
            float: left;
            height: auto;
            margin: 30px 30%;
        }
        
        #additemIMG1{
            border : 2px solid gray;
            float: left;
           margin: 30px 0px 0px 0px;
            width : 500px;
            
            
        }
        .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    font-size: 18px;
    padding: 10px 172px;
    cursor: pointer;
}
        input[type="file"] {
    display: none;
}
#submitbtn{
    margin-top: 20px;
    padding: 10px 223px;
    background-color: #27ae60;
    color: white;
    font-size: 18px;
        }
    </style>
<head>
   <script src="../scripts/adding_item.js"></script> 
    <link rel="stylesheet" href="../styles/style.css" >
	<link rel="stylesheet" href="../styles/style2.css" >
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
 
        
</head>
<body width = "device-width">

    <div class = "main" >
       
     <form method = "post" enctype = "multipart/form-data" >
         <div class = "pre" >
    <img id="additemIMG1"  src="../images/upload.png"     >
             <label  class="custom-file-upload">
                 <input  type="file" name="file" id ="file"  onchange="loadFile(event)" >
    Upload Prescription
</label>
         <input type = "submit" name = "upload" value = "Submit" class="custom-file-upload" id = "submitbtn">
             </div>
</form>


	</div>
    <!------------------------------------------------------------------------------------------------------------------------>
	
	
	

	
</body>
</html>
<?php require 'footer.php'; ?>