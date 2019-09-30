
$(function(){
    
$("#register-form").validate({

  rules: {      
      'Owner_name' :"required",
      
      email: 
              {
            required:true,
            email:true
              },
                  
      'user_password':"required",
      'confirm_password':"required",
      'Restaurant_Name':"required",
      'Address':"required",
      'Google_Longitude':"required",
      'Google_Latitude':"required", 
      'restaurant_type':"required", 
      'country' : "required", 
      'state' :"required",
      'city_name':"required", 
      'zipcode': "required", 
      'contact_no':"required"      
   },
   messages:{
   		'Owner_name':{
   			required:'Please enter Owner name'
                        
   		},
   		'email':{
   			required:'Please enter Emali address',
                        email:'Please enter valid Email address'
   			
   		},
                'user_password':{
   			required:'Please enter password'
   			
   		},
                
                'confirm_password':{
   			required:'Please confirm password'
   			
   		},
                
                'Restaurant_Name':{
   			required:'Please Restaurant name'
   			
   		},
                
                'Address':{
   			required:'Please enter Address'   			
   		},
                
                
                'Google_Longitude':{
   			required:'Please enter Google Map longitude value'   			
   		},
                'Google_Latitude':{
   			required:'Please enter Google Map Latitude value'   			
   		},
                
                'restaurant_type':{
   			required:'Please select Restaurant type'   			
   		},
                
                'country':{
   			required:'Please enter Country'   			
   		},
                 'state':{
   			required:'Please enter State'   			
   		},
                  'city_name':{
   			required:'Please enter City'   			
   		},
                  'zipcode':{
   			required:'Please enter zip code'   			
   		},
                 'contact_no':{
   			required:'Please enter contact number'   			
   		}
  } 
});

 }); 

