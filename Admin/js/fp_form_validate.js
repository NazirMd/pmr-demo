
$(function(){
    
$("#fp_form").validate({

  rules: {  
      
      admin_user_name:
              {
                  required:true,
                  email:true
              }           
   },
   messages:{
   		'admin_user_name':{
                    
   			required:'Please enter registered Email Id',
                        email:'Please enter valid Email Id'
                        
   		}
  } 
});

 }); 

