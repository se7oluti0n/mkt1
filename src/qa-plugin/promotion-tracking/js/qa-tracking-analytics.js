$(document).ready(function (){
	var tracking_analytics_page = {
		
		init: function(){
			var cmd = "init";			
			$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", 
				{cmd: cmd, sample_param: 'some thing here'}, function(data){

				// Generate page
				$('.qa-main').html(data);
		
				// Bind event handler
				//$('#save_change').click(on_save_change_click);
				$('#view').click(on_view_click);
				$('#pdf').click(on_pdf_click);
				var d = new Date();
				$('#start_date').datepicker("setDate", d);
				$('#end_date').datepicker("setDate",d);
			//	$('#start_date').val($.datepicker.formatDate('yy-mm-dd', d ));
				//$('#end_date').val($.datepicker.formatDate('yy-mm-dd', d));
			});
		},
		get_data: function(){
		var cmd = "get_data";		
		var start_date = $( "#start_date" ).val();
		var end_date = $( "#end_date" ).val();
		$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", 
			{cmd: cmd, start_date: start_date, end_date: end_date}, function(data){

			// Generate page
			$('.qa-main').html(data);
	
			// Bind event handler
			//$('#save_change').click(on_save_change_click);
			//$('#save_change').click(on_save_change_click);
			$('#view').click(on_view_click);
			$('#pdf').click(on_pdf_click);
			
			$('#start_date').datepicker("setDate",start_date);
			$('#end_date').datepicker("setDate",end_date);
			
			//$('#start_date').val(start_date);
			//$('#end_date').val(end_date);
			
		});
		
	},
	get_pdf: function(){
		var cmd = "get_pdf";		
		var start_date = $( "#start_date" ).val();
		var end_date = $( "#end_date" ).val();
		
		$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", 
			{cmd: cmd, start_date: start_date, end_date: end_date}, function(data){

			// Generate page
			//$('.qa-main').html(data);
	
				//$.load(data);
			// Bind event handler
			//$('#save_change').click(on_save_change_click);
			//$('#save_change').click(on_save_change_click);
			//$('#view').click(on_view_click);
			//$('#pdf').click(on_pdf_click);
			
			//$('#start_date').datepicker("setDate",start_date);
			//$('#end_date').datepicker("setDate",end_date);
			//$('#start_date').val(start_date);
			//$('#end_date').val(end_date);
			
		});
		
	}
	}
	// Save change button click event handler
	
	tracking_analytics_page.init();
	
/*	var on_save_change_click = function(){
		alert('You have clicked on save change button!');
	}*/
	var on_view_click = function(){
		//alert('You have clicked on view button!');
		tracking_analytics_page.get_data();
	}
	var on_pdf_click = function(){
		//alert('You have clicked on PDF button!');
		tracking_analytics_page.get_pdf();
	}
	
	
});