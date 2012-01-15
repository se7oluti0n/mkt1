$(document).ready(
		function() {
			var tracking_setting_page = {
				init : function() {
					var cmd = "init";
					$.get("qa-plugin/promotion-tracking/qa-ajax-setting.php", {
						cmd : cmd,
						sample_param : 'some thing here'
					}, function(data) {

						// Generate page
						$('.qa-main').html(data);

						// Bind event handler
						// $('#company_info_save').click(on_save_change_click);
						$('#company_info_save').click(on_company_info_save);
						$('#ads_plan_save').click(on_ads_plan_save);
						$('#tracking_save').click(on_tracking_save);
						$('#cookie').change(function() {
							if ($(this).val() == 0) {
								$('#cookies').show('slow', function() {
								});
								$('#tracking').height(160);
							} else {
								$('#cookies').hide('slow', function() {
								});
								$('#tracking').height(137);
							}

						});

					});
				},
				write_company_info : function() {
					var cmd = "write_company_info";
					var company_name = $('#company_name').val();
					var department = $('#department').val();
					var contact = $('#contact').val();
					var email = $('#email').val();
					var mobile = $('#mobile').val();
					var tel = $('#tel').val();
					var fax = $('#fax').val();
					var city_pref = $('#city_pref').val();
					var address1 = $('#address1').val();
					var address2 = $('#address2').val();
					var memo = $('#memo').val();

					$.get("qa-plugin/promotion-tracking/qa-ajax-setting.php", {
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
						// $('#company_info_save').click(on_save_change_click);

					});
				},
				write_ads_plan : function() {
					var cmd = "write_ads_plan";
					var plan_type = $('#plan_type').val();
					var plan_type_input = $('#plan_type_input').val();

					$.get("qa-plugin/promotion-tracking/qa-ajax-setting.php", {
						cmd : cmd,
						plan_type : plan_type,
						plan_type_input : plan_type_input
					}, function(data) {

						// Generate page
						// $('.qa-main').html(data);

						// Bind event handler
						// $('#company_info_save').click(on_save_change_click);

					});
				},
				write_tracking : function() {
					var cmd = "write_tracking";
					var root_url = $('#root_url').val();
					var cookie = $('#cookie').val();
					var cookie_day = $('input:radio[name=cookie_day]:checked')
							.attr('id');
					var returning_time = $('#returning_time').val();
					$.get("qa-plugin/promotion-tracking/qa-ajax-setting.php", {
						cmd : cmd,
						root_url : root_url,
						cookie : cookie,
						cookie_day : cookie_day,
						returning_time : returning_time
					}, function(data) {

						// Generate page
						// $('.qa-main').html(data);

						// Bind event handler
						// $('#company_info_save').click(on_save_change_click);

					});
				}

			}

			tracking_setting_page.init();

			// Save change button click event handler
			var on_company_info_save = function() {
				tracking_setting_page.write_company_info();
				alert('Saved company info to database!');
			}
			var on_ads_plan_save = function() {
				tracking_setting_page.write_ads_plan();
				alert('Saved ads plan to database!');
			}
			var on_tracking_save = function() {
				tracking_setting_page.write_tracking();
				alert('Saved tracking info to database!');
			}

		});