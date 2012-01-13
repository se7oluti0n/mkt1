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
	
	$analytics_template->set_data('purchase-list', '{SEARCHING_TIME}', 
										array( 'selected' => 0,
												'options' => array( 1 => 'Buy Time', 
																	2 => 'Click Time'))
										);	
	$analytics_template->set_data('purchase-list', '{YEAR_VAL}', 
										array( 'selected' => 0,
												'options' => array(2012, 2013, 2014))
										);
	$analytics_template->set_data('purchase-list', '{MONTH_VAL}',
										array( 'selected' => 0,
												'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12))
										);
	
	$promotion_list_html = '<tr>
								<td width="20px">NO</td>
								<td width="400px">PRODUCT_NAME</td>
								<td width="100px">PRODUCT_EC_ID</td>
							</tr>
							<tr>
								<td width="20px">NO</td>
								<td width="400px">PRODUCT_NAME</td>
								<td width="100px">PRODUCT_EC_ID</td>
							</tr>
							<tr>
								<td width="20px">NO</td>
								<td width="400px">PRODUCT_NAME</td>
								<td width="100px">PRODUCT_EC_ID</td>
							</tr>'; // create HTML code for promotion list here
	
	// then replace to replacing holder 
	$analytics_template->set_data('purchase-list', '{PROMOTION_LIST_VAL}', $promotion_list_html);
	
	$analytics_template->set_data('purchase-list', '{PDF}', 'PDF');
	$analytics_template->set_data('purchase-list', '{CSV}', 'CSV');
	$analytics_template->set_data('purchase-list', '{REMUN_REPORT}', 'Remun report');
	$analytics_template->set_data('purchase-list', '{START_DATE}', 'From');
	$analytics_template->set_data('purchase-list', '{END_DATE}', 'To');
	$analytics_template->set_data('purchase-list', '{YEAR}', 'Year');
	$analytics_template->set_data('purchase-list', '{MONTH}', 'Month');
	$analytics_template->set_data('purchase-list', '{UID}', 'UID');
	$analytics_template->set_data('purchase-list', '{PID}', 'PID');
	$analytics_template->set_data('purchase-list', '{VIEW}', 'VIEW');
		
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