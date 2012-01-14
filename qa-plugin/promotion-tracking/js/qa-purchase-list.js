$(document).ready(function (){
	var purchase_list_page = {
		
		init: function(){
			var cmd = "init";			
			$.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
				{cmd: cmd, sample_param: 'some thing here'}, function(data){

				// Generate page
				$('.qa-main').html(data);
				
				//Event binder
				$('#save_change').click(on_save_change_click);
				$('#view').click(on_view_click);
    		});
		}
	}
	
	purchase_list_page.init();
	
	// Save change button click event handler
	var on_save_change_click = function(){
        alert('You have clicked on me!');
    };
    
    var on_view_click = function() {
        var cmd = "load-content";
        $.get("qa-plugin/promotion-tracking/qa-ajax-purchase-list.php", 
            {cmd : cmd, sample_param : 'nothing'}, function(data) {
            $('.qa-form-content').html(data);
        });
    }
});