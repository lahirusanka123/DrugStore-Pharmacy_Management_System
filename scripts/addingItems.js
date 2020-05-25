var cart = [] ;
        var total = 0;
        var items = 0;
        loadCart();
        
        
        
        $(".addtocart").click(function(event){
            event.preventDefault();
            var name = $(this).attr("data-name");
            var price = Number($(this).attr("data-price"));
            var id = Number($(this).attr("data-id"));
            var imgsrc = $(this).attr("data-img");
            addItemToTheCart ( id, name, price, 1 ,imgsrc );
            
            calcarttotal();
           
        });
        
		
		
      //******************************************************************************************************

		var Item = function( id, name, price, count,imgsrc )
			{   
				this.id = id
				this.name = name
				this.price = price
				this.count = count
                this.imgsrc = imgsrc
			};
		
    //******************************************************************************************************
			
		   function addItemToTheCart (id, name, price, count, imgsrc )   //this function add items to cart 
		   {	
				for ( var i in cart )
				{
					if (cart[i].id === id )
					{
						cart[i].count += count;
                        saveCart();
                       
						return;
					}
				
				}
				
				var item = new Item(id, name, price, count ,imgsrc);
				cart.push(item);
               saveCart();
              
				
			}
        
    //******************************************************************************************************
			
			function calcarttotal(){
               
                if( cart.length > 0){
            for ( var i in cart)
                {
                    total += cart[i].price * cart[i].count; 
                }
            document.getElementById("cartBtn").innerHTML = cart.length + " ITEM - Rs. "+total.toFixed(2);
            total = 0;    
                }else
                    document.getElementById("cartBtn").innerHTML = " 0 ITEM - Rs.0.00";
            }
	//******************************************************************************************************		
		   
		   function saveCart()
        {
            localStorage.setItem("shoppingCart", JSON.stringify(cart));
        }
        
//******************************************************************************************************		
		   
		   function loadCart()
        {
            cartreturn = JSON.parse( localStorage.getItem("shoppingCart") );
            if (cartreturn == null )
                return ;
            else
                cart = cartreturn;
        }   
           
			calcarttotal();

//******************************************************************************************************
		 function removeCartItem(id)
            {
                     for (var i in cart)
                     {
                        if (cart[i].id == id )
                            {
                                cart.splice(i,1);
                                console.log(cart);
                                saveCart();
                                location.reload();
                                break;
                            }
                     }
            }	
	       