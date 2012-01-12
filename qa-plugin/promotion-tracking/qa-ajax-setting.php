<?php
header("Content-type: text/html; charset=utf-8");
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
	$setting_template = template_factory::create('config/tracking-setting');
	
	
	$setting_template->set_data('tracking-setting', '{COMPANY_INFO}', 'Company info');
	$setting_template->set_data('tracking-setting', '{COMPANY_NAME}', 'Company name');
	$setting_template->set_data('tracking-setting', '{DEPARTMENT}', 'Department');
	$setting_template->set_data('tracking-setting', '{CONTACT}', 'Contact');
	$setting_template->set_data('tracking-setting', '{EMAIL}', 'Email');
	$setting_template->set_data('tracking-setting', '{MOBILE}', 'Mobile');
	$setting_template->set_data('tracking-setting', '{TEL}', 'Tel');
	$setting_template->set_data('tracking-setting', '{FAX}', 'Fax');
	$setting_template->set_data('tracking-setting', '{CITY_PREF}', 'City/ pref');
	$setting_template->set_data('tracking-setting', '{ADDRESS1}', 'Address 1');
	$setting_template->set_data('tracking-setting', '{ADDRESS2}', 'Address 2');
	$setting_template->set_data('tracking-setting', '{MEMO}', 'Memo');
	$setting_template->set_data('tracking-setting', '{ADS_PLAN}', 'Ads Plan');
	$setting_template->set_data('tracking-setting', '{TRACKING}', 'Tracking');
	$setting_template->set_data('tracking-setting', '{PLAN_TYPE}', 'Plan Type');
	$setting_template->set_data('tracking-setting', '{ROOT_URL}', 'Root URL');
	$setting_template->set_data('tracking-setting', '{COOKIE}', 'Cookie');
	$setting_template->set_data('tracking-setting', '{COOKIE_3DAYS}', 'Cookie 3 days');
	$setting_template->set_data('tracking-setting', '{COOKIE_7DAYS}', 'Cookie 7 days');
	$setting_template->set_data('tracking-setting', '{COOKIE_30DAYS}', 'Cookie 30 days');
	$setting_template->set_data('tracking-setting', '{RETURNING_TIME}', 'Returning time');
	$setting_template->set_data('tracking-setting', '{SAVE}', 'Save');
	$setting_template->set_data('tracking-setting', '{CITY_PREF_VAL}', 
										array( 'selected' => 1,
												'options' =>  array('都道府県を選択','北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'))
										);		
	
	$promotion_list_html = '<tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr><tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr><tr><td width="20px">NO</td><td width="400px">PRODUCT_NAME</td><td width="100px">PRODUCT_EC_ID</td></tr>'; // create HTML code for promotion list here
	
	// then replace to replacing holder 
//	$setting_template->set_data('tracking-setting', '{PROMOTION_LIST_VAL}', $promotion_list_html);
	
	//$setting_template->set_data('tracking-setting', '{STATUS}', 'STATUS');
	$setting_template->set_data('tracking-setting', '{START_DATE}', 'START DATE');
	$setting_template->set_data('tracking-setting', '{END_DATE}', 'END DATE');
	$setting_template->set_data('tracking-setting', '{KEYWORD}', 'KEYWORD');
	$setting_template->set_data('tracking-setting', '{SALE_METHOD}', 'SALE METHOD');
	$setting_template->set_data('tracking-setting', '{RANKING}', 'RANKING');
	$setting_template->set_data('tracking-setting', '{SEARCH}', 'SEARCH');
		
	$setting_template->set_data('tracking-setting', '{SAVE_CHANGE_BTN}', 'SAVE CHANGE');	
	
	$html = $setting_template->get_html();	
	echo $html; // return HTML code for setting page
}

/*-- /Bussiness functions (public use) --*/

/*-- Private functions (local use) --*/


/*-- /Private functions (local use) --*/

/*
	Omit PHP closing tag to help avoid accidental output
*/