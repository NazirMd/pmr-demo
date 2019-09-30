$(document).ready(function(){  
	$('.enable_menu').click(function(e){   
	   e.preventDefault();   
	   var menuid = $(this).attr('data-menu-id');
	   var parent = $(this).parent("td").parent("tr");   
	   bootbox.dialog({
			message: "Are you sure you want to Enable this Menu Item ?",
			title: "Enable !",
			buttons: {
				success: {
					  label: "No",
					  className: "btn-danger",
					  callback: function() {
					  $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Enable!",
				  className: "btn-success",
				  callback: function() {       
				   $.ajax({        
						type: 'POST',
						url: 'updatestatus_enable.php',
						data: 'menuid='+menuid        
				   })
				   .done(function(response){        
						//bootbox.alert(response);
						parent.fadeOut('slow');        
				   })
				   .fail(function(){        
						bootbox.alert('Error....');               
				   })              
				  }
				}
			}
	   });   
	});  
 });