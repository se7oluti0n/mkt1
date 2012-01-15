<?php
require_once 'qa-tracking-config.php';

// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
	'load-content' => array('func' => 'load_content', 'args' => $params),
	'max-date' => array('func' => 'maxDateEcho', 'args' => $params)
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
												'options' => array( 0 => 'Buy Time', 
																	1 => 'Click Time'))
										);	
	$analytics_template->set_data('purchase-list', '{PDF}', 'PDF');
	$analytics_template->set_data('purchase-list', '{CSV}', 'CSV');
	$analytics_template->set_data('purchase-list', '{REMUN_REPORT}', 'Remun report');
	$analytics_template->set_data('purchase-list', '{START_DATE}', 'From');
	$analytics_template->set_data('purchase-list', '{END_DATE}', 'To');
	$analytics_template->set_data('purchase-list', '{UID}', 'UID');
	$analytics_template->set_data('purchase-list', '{PID}', 'PID');
	$analytics_template->set_data('purchase-list', '{VIEW}', 'VIEW');
	
	$maxDate = getMaxDate(0);
	$analytics_template->set_data('purchase-list', '{MAX_DATE}', $maxDate);
		
	$html = $analytics_template->get_html();	
	echo $html; // return HTML code for analytics page
}

function getMaxDate($type) {
	
	switch ($type){
		case 0: $query = 'SELECT DATE(MAX(order_datetime)) FROM qaec_buy_count'; break;
		case 1: $query = 'SELECT DATE(MAX(datetime)) FROM qaec_promotion_click'; break;
	}
	$result = qa_db_query_sub($query);
	return qa_db_read_one_value($result);
}

function maxDateEcho() {
	$args = func_get_args();
	echo getMaxDate($args[0]['type']);
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