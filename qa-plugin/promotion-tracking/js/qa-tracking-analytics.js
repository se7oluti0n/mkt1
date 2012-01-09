$(document).ready(function (){
	var tracking_analytics_page = {
		
		init: function(){
			var cmd = "init";			
			$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", 
				{cmd: cmd, sample_param: 'some thing here'}, function(data){

				// Generate page
				$('.qa-main').html(data);
		
				// Bind event handler
				$('#save_change').click(on_save_change_click);
				
			});
		}
	}
	
	tracking_analytics_page.init();
	
	// Save change button click event handler
	var on_save_change_click = function(){
		alert('You have clicked on me!');
	}
	
});