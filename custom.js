$(document).ready(function(){

 cartNoti();
 showTable();

$('.addtocartBtn').on('click',function(){


	var id= $(this).data('id');
	var name= $(this).data('name');
	var codeno=$(this).data('codeno');
	var photo=$(this).data('photo');
	var price=$(this).data('price');
	var discount =$(this).data('discount');
	var qty=1;

	var mycart= {id:id,codeno:codeno,name:name,photo:photo,price:price,discount:discount,qty:qty};
	var cart=localStorage.getItem('cart');

	var cartArray;

	if(cart==null)
	{
		cartArray = Array();
	}
	else
	{
       cartArray = JSON.parse(cart);
	}
     
       var status= false;

       $.each(cartArray ,function(i,v)
       {
       		if(id==v.id)
       		{
       			v.qty++;
       			status=true;
       		}
       })

       if(!status)
       {
       	cartArray.push(mycart);

       }
       var cartData= JSON.stringify(cartArray);
       localStorage.setItem("cart",cartData);

       cartNoti();
	// if(!cart)
	// {
 //        var cart = '{"mycart":[]}';
	// }

 //      cart = JSON.parse(cart);
 //      var mycart= cart.mycart;
 //      var length = mycart.length;

 //      //increase qty when
 //      //localStorage-id new-id same

 //      for (var i=0; i<length ; i++) 
 //      {
 //          if(id == mycart[i].id) 
 //          {
 //          	mycart[i].qty +=1;
 //          	var exit=1;
 //          }
 //      }

	console.log("ID:"+id+
		        "Name:"+name+
		        "Codeno:"+codeno+
		        "Photo:"+photo+
		        "Price:"+price+
		        "Discount:"+discount);
});


       function cartNoti()
       {
       		var cart = localStorage.getItem('cart');
       		var total=0;
       		var noti=0;
       		if (cart)
       		 {
       		 	var cartArray = JSON.parse(cart);

       		 	$.each(cartArray,function(i,v){

       		 		var unitprice=v.price;
       		 		var discount=v.discount;
       		 		var qty= v.qty;
       		 		if(discount){
       		 			var price = discount;
       		 		}
       		 		else{
       		 			var price= unitprice;
       		 		}
       		 		var subtotal = price * qty;

       		 		noti += qty++;
       		 		total += subtotal ++;
       		 	})

       		 	$('.cartNoti').html(noti);
       		 	$('.cartTotal').html(total+'Ks');

       		 }
       		 else
       		 {
       		 	$('.cartNoti').html(0);
       		 	$('.cartTotal').html(0+'Ks');
       		 }
       }


       function showTable(){
       	var cart = localStorage.getItem('cart');

       	if(cart)
       	{
       		$('.shoppingcart_div').show();
       		$('.noneshoppingcart_div').hide();

       		var cartArray = JSON.parse(cart);
       		var shoppingcartData='';

       		if(cartArray.length >0 )
       		{
       			var total=0;

       			$.each(cartArray, function(i,v){
       				var id= v.id;
       				var codeno = v.codeno;
       				var name= v.name;
       				var unitprice= v.price;
       				var discount= v.discount;
       				var photo= v.photo;
       				var qty=v.qty;

       				if(discount)
       				{
       					var price=discount;
       				}
       				else
       				{
       					var price = unitprice;
       				}
       				var subtotal= price * qty;

       				 shoppingcartData += `<tr>
       				 							<td>
       				 							<button 
class="btn btn-outline-danger remove btn-sm"  
style="border-radius:
 50%" data-id="${i}"> 
														<i class="icofont-close-line"></i> 
								                </button> 
								                </td>

       				 							<td>
       				 							<img src="${photo}" class="cartImg">
       				 							</td>

       				 							<td>
       				 							<p> ${name} </p>
												<p> ${codeno}</p>
       				 							</td>

       				 							<td>
       	<button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
														<i class="icofont-plus"></i> 
												</button>
       				 							</td>

       				 							<td>
       				 							<p> ${qty} </p>
       				 							</td>

       				 							<td>
       <button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
														<i class="icofont-minus"></i>
												</button>
       				 							</td>

       				 							<td>`;

       				 					if(discount>0)
       				 					{
       				 						shoppingcartData += `<p class="text-danger"> ${discount} </p>
       				 						<p class="font-weight-lighter">
       				 						<del> ${unitprice} </del>
       				 						</p>
       				 						`;

       				 					 }
       				 					 else
       				 					   {
       				 				shoppingcartData +=`<p class="text-danger">
       				 									${unitprice} Ks
       				 									</p>

       				 				                    `;
       				 					     }



       				 		  shoppingcartData+=`</td>

       				 							<td>
       				 							  <p> ${subtotal} </p>
       				 							</td>



       				                     </tr>`;
       				    total+=subtotal++;
       			});
       			$('#shoppingcart_table').html(shoppingcartData);
            $('.cartTotal').html(total + 'Ks');
       		}
       		else
       		{

       		$('.shoppingcart_div').hide();
       		$('.noneshoppingcart_div').show();
       		}

       	}
       	else
       	{
       		$('.shoppingcart_div').hide();
       		$('.noneshoppingcart_div').show();
       	}
       }





     $('#shoppingcart_table').on('click','.minus_btn',function ()
 {
        var id=$(this).data('id');
        var cart=localStorage.getItem('cart');
        var cartArray=JSON.parse(cart);
        $.each(cartArray,function (i,v) {
               if (i==id)
                {
                      v.qty--;
                        if(v.qty==0){
                            cartArray.splice(id,1);
                        }
                }
        })
        var cartData=JSON.stringify(cartArray);
        localStorage.setItem('cart',cartData);
        showTable();
        cartNoti();  
        
        })






    $('#shoppingcart_table').on('click','.plus_btn',function ()
{
       var id=$(this).data('id');
       var cart=localStorage.getItem('cart');
       var cartArray=JSON.parse(cart);
       $.each(cartArray,function (i,v) {
              if (i==id)
               {
                     v.qty++;
               }
       })
      var cartData=JSON.stringify(cartArray);
       localStorage.setItem('cart',cartData);
       showTable();
       cartNoti();
       })

    $('#shoppingcart_table').on('click','.remove',function ()
{
       var id=$(this).data('id');
       var cart=localStorage.getItem('cart');
       var cartArray=JSON.parse(cart);
       $.each(cartArray,function (i,v) {
              if (i==id)
               {
                     cartArray.splice(id,1);
               }
       })
      var cartData=JSON.stringify(cartArray);
       localStorage.setItem('cart',cartData);
       showTable();
       cartNoti();
       })

    $('.checkoutbtn').on('click',function ()
     {
      var cart=localStorage.getItem('cart');
      var cartArray=JSON.parse(cart);
      var note=$('#notes').val();
      $.post('storeorder.php',{

        cart:cartArray,
        note:note},function (response) {
          localStorage.clear();
          location.href="ordersuccess.php";
        
      })
      console.log(note);
    });


});