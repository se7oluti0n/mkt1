$(document).ready(function() {
	var tracking_analytics_page = {
		init : function() {
			var cmd = "init";
			$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", {
				cmd : cmd,
				sample_param : 'some thing here'
			}, function(data) {

				// Generate page
				$('.qa-main').html(data);

				// Bind event handler
				// $('#save_change').click(on_save_change_click);
				$('company_info_save').click(write_company_info);
				$('ads_plan_save').click(write_ads_plan);
				$('tracking_save').click(write_tracking);

			});
		},
		write_company_info : function() {
			var cmd = "write_company_info";
			var company_name = $('#company_name').val();
			var department = $('#department').val();
			var contact = $('#contact').val();
			var email = $('email').val();
			var mobile = $('mobile').val();
			var tel = $('tel').val();
			var fax = $('fax').val();
			var city_pref = $('#city_pref').val();
			var address1 = $('#address1').val();
			var address2 = $('#address2').val();
			var memo = $('#memo').val();

			$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", {
				cmd : cmd,
				company_name : company_name,
				department : department,
				contact : contact,
				email : email,
				mobile : mobile,
				tel : tel,
				fax : fax,
				city_pref : city_pref,
				address1 : address1,
				address2 : address2,
				memo : memo
			}, function(data) {

				// Generate page
				// $('.qa-main').html(data);

				// Bind event handler
				$('#company_info_save').click(on_save_change_click);

			});
		},
		write_ads_plan : function() {
			var cmd = "write_ads_plan";
			var company_name = $('#company_name').val();
			var department = $('#department').val();
			var contact = $('#contact').val();
			var email = $('email').val();
			var mobile = $('mobile').val();
			var tel = $('tel').val();
			var fax = $('fax').val();
			var city_pref = $('#city_pref').val();
			var address1 = $('#address1').val();
			var address2 = $('#address2').val();
			var memo = $('#memo').val();

			$.get("qa-plugin/promotion-tracking/qa-ajax-analytics.php", {
				cmd : cmd,
				company_name : company_name,
				department : department,
				contact : contact,
				email : email,
				mobile : mobile,
				tel : tel,
				fax : fax,
				city_pref : city_pref,
				address1 : address1,
				address2 : address2,
				memo : memo
			}, function(data) {

				// Generate page
				// $('.qa-main').html(data);

				// Bind event handler
				$('#ads_plan_save').click(on_save_change_click);

			});
		}

	}

	tracking_analytics_page.init();

	// Save change button click event handler
	var on_save_change_click = function() {
		alert('You have clicked on me!');
	}

});