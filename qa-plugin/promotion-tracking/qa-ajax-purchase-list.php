<?php
require_once 'qa-tracking-config.php';

// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
	'load-content' => array('func' => 'load_content', 'args' => $params)
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
		
	$html = $analytics_template->get_html();	
	echo $html; // return HTML code for analytics page
}

function load_content(){
	global $qa_db;
	$args = func_get_args();

	$sample_param = $args[0]['sample_param']; // just show how to get parame

	// Get template for the page
	$analytics_template = template_factory::create('purchase/purchase-list-content');

	$promotion_list_html = '<tr>
								<td>NO</td>
								<td>3453453546354633KH4</td>
								<td>￥2345</td>
								<td>￥2345</td>
								<td>Prodld_units_price, Prodld_unit_price</td>
								<td>user id</td>
								<td>promotion id</td>
								<td>promotion click time</td>
								<td>buy time</td>
								<td>Detail</td>
							</tr>
							<tr>
								<td>NO</td>
								<td>3453453546354633KH4</td>
								<td>￥2345</td>
								<td>￥2345</td>
								<td>Prodld_units_price, Prodld_unit_price</td>
								<td>user id</td>
								<td>promotion id</td>
								<td>promotion click time</td>
								<td>buy time</td>
								<td>Detail</td>
							</tr>
							<tr>
								<td>NO</td>
								<td>3453453546354633KH4</td>
								<td>￥2345</td>
								<td>￥2345</td>
								<td>Prodld_units_price, Prodld_unit_price</td>
								<td>user id</td>
								<td>promotion id</td>
								<td>promotion click time</td>
								<td>buy time</td>
								<td>Detail</td>
							</tr>'; // create HTML code for promotion list here

	// then replace to replacing holder
	$analytics_template->set_data('purchase-list-content', '{PROMOTION_LIST_VAL}', $promotion_list_html);

	$analytics_template->set_data('purchase-list-content', '{SAVE_CHANGE_BTN}', 'SAVE CHANGE');

	$html = $analytics_template->get_html();
	echo $html; // return HTML code for analytics page
}
/*-- /Bussiness functions (public use) --*/

/*-- Private functions (local use) --*/


/*-- /Private functions (local use) --*/

/*
	Omit PHP closing tag to help avoid accidental output
*/