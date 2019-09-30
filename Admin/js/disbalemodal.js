$(document).ready(function(){  
	$('.disbale_menu').click(function(e){   
	   e.preventDefault();   
	   var menuid = $(this).attr('data-menu-id');
	   var parent = $(this).parent("td").parent("tr");   
	   bootbox.dialog({
			message: "Are you sure you want to Disable this Menu Item ?",
			title: "Disable !",
			buttons: {
				success: {
					  label: "No",
					  className: "btn-success",
					  callback: function() {
					  $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Disable!",
				  className: "btn-danger",
				  callback: function() {       
				   $.ajax({        
						type: 'POST',
						url: 'updatestatus.php',
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