$(document).ready(function (){
	var purchase_list_page = {
		
		init: function(){
			var cmd = "init";			
			$.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
				{cmd: cmd, sample_param: 'some thing here'}, function(data){

				// Generate page
				$('.qa-main').html(data);
		     });
		}
	}
	
	purchase_list_page.init();
	
});

