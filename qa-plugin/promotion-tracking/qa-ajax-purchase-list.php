<?php
require_once 'qa-tracking-config.php';

// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
);

if (!do_tracking_request_process()) {
	echo '{"ret": "NG"}';
} 

/*-- Bussiness functions (public use) --*/
function init_paging(){
	global $qa_db;
	$args = func_get_args();
	
	$sample_param = $args[0]['sample_param']; // just show how to get parame 
	
	// Get template for the page
	$analytics_template = template_factory::create('purchase/purchase-list');
	
	$analytics_template->set_data('purchase-list', '{STATUS_VAL}', 
										array( 'selected' => 1,
												'options' => array( 1 => 'Status 1', 
																	2 => 'Status 2', 
																	3 => 'Status 3'))
										);	
	$analytics_template->set_data('purchase-list', '{SALE_METHOD_VAL}', 
										array( 'selected' => 1,
												'options' => array( 1 => 'Method 1', 
																	2 => 'Method 2', 
																	3 => 'Method 3'))
										);	
	
	$promotion_list_html = '<tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr><tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr><tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr>'; // create HTML code for promotion list here
	
	// then replace to replacing holder 
	$analytics_template->set_data('purchase-list', '{PROMOTION_LIST_VAL}', $promotion_list_html);
	
	$analytics_template->set_data('purchase-list', '{STATUS}', 'STATUS');
	$analytics_template->set_data('purchase-list', '{START_DATE}', 'START DATE');
	$analytics_template->set_data('purchase-list', '{END_DATE}', 'END DATE');
	$analytics_template->set_data('purchase-list', '{KEYWORD}', 'KEYWORD');
	$analytics_template->set_data('purchase-list', '{SALE_METHOD}', 'SALE METHOD');
	$analytics_template->set_data('purchase-list', '{RANKING}', 'RANKING');
	$analytics_template->set_data('purchase-list', '{SEARCH}', 'SEARCH');
		
	$analytics_template->set_data('purchase-list', '{SAVE_CHANGE_BTN}', 'SAVE CHANGE');	
	
	$html = $analytics_template->get_html();	
	echo $html; // return HTML code for analytics page
}

/*-- /Bussiness functions (public use) --*/

/*-- Private functions (local use) --*/


/*-- /Private functions (local use) --*/

/*
	Omit PHP closing tag to help avoid accidental output
*/