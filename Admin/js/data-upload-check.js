$(function(){
 
 
$("#contact_form").validate({

  rules: {      
      'menu_item_name' :"required",
      'menu_item_price':"required",
      'order_type':"required"
      
      
   },
   messages:{
   		'menu_item_name':{
   			required:'Please enter menu item name'
                        
   		},
                'menu_item_price':{
   			required:'Please enter menu item price'
                        
   		}
                ,
                'order_type':{
   			required:'Please select order type'
                        
   		}
                
  } 
});

 }); 

