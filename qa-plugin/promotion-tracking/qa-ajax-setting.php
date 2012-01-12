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
												'options' =>  array('�s���{����I��','�k�C��','�X��','��茧','�{�錧','�H�c��','�R�`��','������','��錧','�Ȗ،�','�Q�n��','��ʌ�','��t��','�����s','�_�ސ쌧','�R����','���쌧','�V����','�x�R��','�ΐ쌧','���䌧','�򕌌�','�É���','���m��','�O�d��','���ꌧ','���s�{','���{','���Ɍ�','�ޗǌ�','�a�̎R��','���挧','������','���R��','�L����','�R����','������','���쌧','���Q��','���m��','������','���ꌧ','���茧','�F�{��','�啪��','�{�茧','��������','���ꌧ'))
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