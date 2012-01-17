<?php
require_once 'qa-tracking-config.php';

// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
	'load-content' => array('func' => 'load_content', 'args' => $params),
	'max-date' => array('func' => 'maxDateEcho', 'args' => $params),
	'load-page-number' => array('func' => 'gen_page_number', 'args' => $params),
	'load-detail' => array('func' => 'load_detail', 'args' => $params)
);

if (!defined('RECORDS_PER_PAGE'))
define('RECORDS_PER_PAGE', 1);
if (!defined('MAX_PAGE'))
define('MAX_PAGE', 3);

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
	$val = qa_db_read_one_value(qa_db_query_sub($query));
	if ($val == null) $val = '2011-12-31';
	return $val;
}

function maxDateEcho() {
	$args = func_get_args();
	echo getMaxDate($args[0]['type']);
}

function search_data($type, $uid, $pid, $start, $end) 
{
	switch ($type) {
		case 0:
			$query = 'SELECT order_id, amount, order_detail, uid, pid, datetime, order_datetime, qaec_buy_count.sid as sid, user_agent, user_ip, url
							FROM qaec_buy_count, qaec_promotion_click
							WHERE qaec_buy_count.sid = qaec_promotion_click.sid
								AND uid = $ AND pid = $	
								AND (DATE( order_datetime ) BETWEEN  $ AND  $)';
			break;
		case 1:
			$query = 'SELECT order_id, amount, order_detail, uid, pid, datetime, order_datetime, qaec_buy_count.sid as sid, user_agent, user_ip, url
							FROM qaec_buy_count, qaec_promotion_click
							WHERE qaec_buy_count.sid = qaec_promotion_click.sid
								AND uid = $ AND pid = $	
								AND (DATE(datetime ) BETWEEN  $ AND  $)';
			break;
	}
	$result = qa_db_query_sub($query, $uid, $pid, $start, $end);
	return qa_db_read_all_assoc($result);
}

function genPageBar($curPage, $maxPage)
{
	$page_bar = '';
	if ($curPage == 0) $page_bar .= '<span class="qa-pr-nextprev">«</span>';
	else $page_bar .= '<a class="qa-pr-nextprev" onclick = "page_click('.($curPage - 1).')">«</a>';
	
	$lowerpage = max($curPage - MAX_PAGE>>1, 0 );
	$upperpage = min($lowerpage + MAX_PAGE, $maxPage);
	for ($i = $lowerpage; $i < $upperpage; $i++) {
		if ($i == $curPage) $page_bar .= '<span class="qa-pr-current">'.($i+1).'</span>';
		else $page_bar .= '<a id = "page_'.($i+1).'" onclick = "page_click('.$i.')">'.($i + 1).'</a>';
	}
	 
	if ($curPage == $maxPage - 1) $page_bar .= '<span class="qa-pr-nextprev" id="next_page_u">»</span>';
	else $page_bar .= '<a class="qa-pr-nextprev" onclick = "page_click('.($curPage + 1).')">»</a>';
	return $page_bar;
}

function gen_page_number()
{
	if (!isset($_SESSION['purchase_list_result']) || !isset($_SESSION['purchase-list-sum'])) {
		echo '';
		return;
	}
	
	$args = func_get_args();
	$page = $args[0]['page'];
	$content = $_SESSION['purchase_list_result'];
	$size = sizeof($content);
	$analytics_template = template_factory::create('purchase/purchase-list-content');
	
	$page_bar = genPageBar($page, floor(($size - 1)/RECORDS_PER_PAGE) + 1);
	$promotion_list_html = '';
	
	$sum = $_SESSION['purchase-list-sum'];
	
	$c_sum = array('amount' => 0, 'remun' => 0);
	for ($i = $page * RECORDS_PER_PAGE, $maxRec = min($i + RECORDS_PER_PAGE, $size); $i < $maxRec; $i++) {
		$promotion_list_html .= '<tr>
									<td>'.($i + 1).'</td>
									<td>'.qa_html($content[$i]['order_id']).'</td>
									<td>'.qa_html($content[$i]['amount']).'</td>
									<td>'.qa_html($content[$i]['amount'] * 0.1).'</td>
									<td>'.qa_html($content[$i]['order_detail']).'</td>
									<td>'.qa_html($content[$i]['uid']).'</td>
									<td>'.qa_html($content[$i]['pid']).'</td>
									<td>'.qa_html($content[$i]['datetime']).'</td>
									<td>'.qa_html($content[$i]['order_datetime']).'</td>
									<td><a onclick = "purchaseDetail('.$i.')">Detail<a></td>
								</tr>';
		$c_sum['amount'] += $content[$i]['amount'];
		$c_sum['remun'] += $content[$i]['amount'] * 0.1;
	}
	$promotion_list_html .= '<tr>
								<td>&nbsp;</td>
								<th>Current page</th>
								<td>'.$c_sum['amount'].'</td>
								<td>'.$c_sum['remun'].'</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<th>Total (All pages)</th>
								<td>'.$sum['amount'].'</td>
								<td>'.$sum['remun'].'</td>
							</tr>';
	
	
	// then replace to replacing holder
	$analytics_template->set_data('purchase-list-content', '{PROMOTION_LIST_VAL}', $promotion_list_html);
	$analytics_template->set_data('purchase-list-content', '{PAGE_BAR}', $page_bar);
	
	$html = $analytics_template->get_html();
	echo $html; // return HTML code for analytics page
}

function load_content()
{
	global $qa_db;
	$args = func_get_args();

	$search_type = $args[0]['search_type']; // just show how to get parame
	$uid = $args[0]['uid'];
	$pid = $args[0]['pid'];
	$start = $args[0]['start'];
	$end = $args[0]['end'];
	$_SESSION['purchase_list_result'] =  $content = search_data($search_type, $uid, $pid, $start, $end);
	$size = sizeof($content);
	// Get template for the page
	$analytics_template = template_factory::create('purchase/purchase-list-content');
	
	$page_bar = genPageBar(0, ($size - 1)/RECORDS_PER_PAGE + 1);
	$promotion_list_html = '';
	
	$sum = array('amount' => 0, 'remun' => 0);
	for ($i = 0; $i < $size; $i++) {
		$sum['amount'] += $content[$i]['amount'];
		$sum['remun'] += $content[$i]['amount'] * 0.1;
	}
	$_SESSION['purchase-list-sum'] = $sum;
	
	$c_sum = array('amount' => 0, 'remun' => 0);
	for ($i = 0, $maxRec = min(RECORDS_PER_PAGE, $size); $i < $maxRec; $i++) {
		$promotion_list_html .= '<tr>
									<td>'.($i + 1).'</td>
									<td>'.qa_html($content[$i]['order_id']).'</td>
									<td>'.qa_html($content[$i]['amount']).'</td>
									<td>'.qa_html($content[$i]['amount'] * 0.1).'</td>
									<td>'.qa_html($content[$i]['order_detail']).'</td>
									<td>'.qa_html($content[$i]['uid']).'</td>
									<td>'.qa_html($content[$i]['pid']).'</td>
									<td>'.qa_html($content[$i]['datetime']).'</td>
									<td>'.qa_html($content[$i]['order_datetime']).'</td>
									<td><a onclick = "purchaseDetail('.$i.')">Detail<a></td>
								</tr>';
		$c_sum['amount'] += $content[$i]['amount'];
		$c_sum['remun'] += $content[$i]['amount'] * 0.1;
	}
	$promotion_list_html .= '<tr>
								<td>&nbsp;</td>
								<th>Current page</th>
								<td>'.$c_sum['amount'].'</td>
								<td>'.$c_sum['remun'].'</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<th>Total (All pages)</th>
								<td>'.$sum['amount'].'</td>
								<td>'.$sum['remun'].'</td>
							</tr>';
	
	// then replace to replacing holder
	$analytics_template->set_data('purchase-list-content', '{PROMOTION_LIST_VAL}', $promotion_list_html);
	$analytics_template->set_data('purchase-list-content', '{PAGE_BAR}', $page_bar);

	$html = $analytics_template->get_html();
	echo $html; // return HTML code for analytics page
}

function load_detail() {
	if(!isset($_SESSION['purchase_list_result'])) {
		echo '';
		return;
	}
	
	global $qa_db;
	$args = func_get_args();
	
	$content = $_SESSION['purchase_list_result'];
	$id = $args[0]['num'];
	
	$analytics_template = template_factory::create('purchase/purchase-list-detail');
	
	$analytics_template->set_data('purchase-list-detail', '{OID}', qa_html($content[$id]['order_id']));
	$analytics_template->set_data('purchase-list-detail', '{ORDER_TIME}', qa_html($content[$id]['order_datetime']));
	$analytics_template->set_data('purchase-list-detail', '{AMOUNT}', qa_html($content[$id]['amount']));
	$analytics_template->set_data('purchase-list-detail', '{DETAIL}', qa_html($content[$id]['order_detail']));
	$analytics_template->set_data('purchase-list-detail', '{UID}', qa_html($content[$id]['uid']));
	$analytics_template->set_data('purchase-list-detail', '{PID}', qa_html($content[$id]['pid']));
	$analytics_template->set_data('purchase-list-detail', '{CLK_TIME}', qa_html($content[$id]['datetime']));
	$analytics_template->set_data('purchase-list-detail', '{SID}', qa_html($content[$id]['sid']));
	$analytics_template->set_data('purchase-list-detail', '{USER_AGENT}', qa_html($content[$id]['user_agent']));
	$analytics_template->set_data('purchase-list-detail', '{IP}', qa_html($content[$id]['user_ip']));
	$analytics_template->set_data('purchase-list-detail', '{URL}', qa_html($content[$id]['url']));
	
	$analytics_template->set_data('purchase-list-detail', '{PDF}', 'PDF');
	$analytics_template->set_data('purchase-list-detail', '{BACK}', 'BACK');
	
	$html = $analytics_template->get_html();
	echo $html; // return HTML code for analytics page
}

/*-- /Bussiness functions (public use) --*/

/*-- Private functions (local use) --*/


/*-- /Private functions (local use) --*/

/*
	Omit PHP closing tag to help avoid accidental output
*/