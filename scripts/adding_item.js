 

var loadFile = function(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('additemIMG');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

 
function validateAddItems() {
    document.getElementById("codeErro").innerHTML = ""; 
    document.getElementById("nameErro").innerText = ""; 
    document.getElementById("categoryErro").innerHTML = "";
    document.getElementById("qtyErro").innerHTML = "";
    document.getElementById("priceErro").innerHTML = "";
    document.getElementById("presErro").innerHTML = "";
    document.getElementById("desErro").innerHTML = "";
    document.getElementById("imgErro").innerHTML = "";
    
    var itemCode =document.getElementById("iCode");
    var itemName  =document.getElementById("iName");
    var mainCategory = document.getElementById("mainCate");
    var Quantity = document.getElementById("qty");
    var salePrice =document.getElementById("sPrice");
    var PrescriptionYes  =document.getElementById("prescription");
    var PrescriptionNo  =document.getElementById("prescriptionNo");
    var Description = document.getElementById("descrip");
    var image = document.getElementById("brows");
    
 
    var numerValidate = /^[0-9]+$/; 
    var alphaValidate = /^[a-zA-Z]+$/; 
    
//  item code  part
    
    if (itemCode.value.length == 0)
        {
            document.getElementById("codeErro").innerHTML = "*oh! no! Please Enter Item Code*";
            itemCode.focus();
            return false;
                
        }
           
//  item name  part    
/*    
    if (itemName.value.length == 0)
        {
            document.getElementById("nameErro").innerHTML = "*Please enter item name*";
            itemName.focus();
            return false;
        }
    if(itemName.value.length != 0 && itemName.value.length < 8 )
        {
            document.getElementById("nameErro").innerHTML = "*please enter lengthy Name*";
            itemName.focus();
            return false;
        }
    
//  main Category   part
    
    if (mainCategory.value.length == 0)
        {
            document.getElementById("categoryErro").innerHTML = "*Please select one*";
            mainCategory.focus();
            return false;
        }
    
//  Quantity   part
    
    if (Quantity.value.length == 0)
        {
            document.getElementById("qtyErro").innerHTML = "*Please enter item Quantity*";
            Quantity.focus();
            return false;
        }
    
    if (Quantity.value.length != 0 && !Quantity.value.match(numerValidate))
        {
            document.getElementById("qtyErro").innerHTML = "*Please enter valid Quantity*";
            Quantity.focus();
            return false;
        }
    
 //  salePrice  part
    
    if (salePrice.value.length == 0)
        {
            document.getElementById("priceErro").innerHTML = "*Please enter item price*";
            salePrice.focus();
            return false;
        }
    if(salePrice.value.length != 0 && !salePrice.value.match(numerValidate) )
        {
            document.getElementById("priceErro").innerHTML = "*please enter valid sale price*";
            salePrice.focus();
            return false;
        }
    
 // Prescription  part
    
    if (PrescriptionYes.checked==false && PrescriptionNo.checked==false)
        {
            document.getElementById("presErro").innerHTML = "*Please select prescription status*";
            PrescriptionYes.focus();
            return false;
        }
    
     
    
    
 //  Description  part
    
    if (Description.value.length == 0)
        {
            document.getElementById("desErro").innerHTML = "*Please write some description*";
            Description.focus();
            return false;
        }
    
    
 //  image  part
    
    if (image.value.length == 0)
        {
            document.getElementById("imgErro").innerHTML = "*please select item image*";
            image.focus();
            return false;
        }
    
    
 */     
    
    
    
    
}





