<?php
/*
	Plugin Name: promotion-tracking
	Plugin URI: http://www.tenkana.vn/
	Plugin Description: promotion-tracking
	Plugin Version: 1.0
	Plugin Date: 2012-01-08
	Plugin Author: Tenkana
	Plugin Author URI: http://www.tenkana.vn/
	Plugin License: copyright by tenkana.vn
	Plugin Minimum Question2Answer Version: 1.4
*/

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}	
	
	qa_register_plugin_module('page', 'qa-tracking-analytics.php', 'qa_tracking_analytics', 'Tracking analytics');	
	qa_register_plugin_module('page', 'qa-purchase-list.php', 'qa_purchase_list', 'Purchase list');	
	qa_register_plugin_module('page', 'qa-tracking-setting.php', 'qa_tracking_setting', 'Tracking configuration');	

/*
	Omit PHP closing tag to help avoid accidental output
*/