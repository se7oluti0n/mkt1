<?php
header("Content-type: text/html; charset=utf-8");
require_once 'qa-tracking-config.php';

$data;
// Register biz function
$function_array = array(
	'init' => array('func' => 'init_paging', 'args' => $params),
	'write_company_info' => array('func' => 'write_company_info', 'args' =>$params),
	'write_ads_plan' => array('func' => 'write_ads_plan', 'args' => $params),
	'write_tracking' => array('func' => 'write_tracking', 'args' => $params)
);

if (!do_tracking_request_process()) {
	echo '{"ret": "NG"}';
}

function write_ini_file($assoc_arr, $path, $has_sections=FALSE) {
	$content = "";
	if ($has_sections) {
		foreach ($assoc_arr as $key=>$elem) {
			$content .= "[".$key."]\n";
			foreach ($elem as $key2=>$elem2) {
				if(is_array($elem2))
				{
					for($i=0;$i<count($elem2);$i++)
					{
						$content .= $key2."[] = \"".$elem2[$i]."\"\n";
					}
				}
				else if($elem2=="") $content .= $key2." = \n";
				else $content .= $key2." = \"".$elem2."\"\n";
			}
		}
	}
	else {
		foreach ($assoc_arr as $key=>$elem) {
			if(is_array($elem))
			{
				for($i=0;$i<count($elem);$i++)
				{
					$content .= $key2."[] = \"".$elem[$i]."\"\n";
				}
			}
			else if($elem=="") $content .= $key2." = \n";
			else $content .= $key2." = \"".$elem."\"\n";
		}
	}

	if (!$handle = fopen($path, 'w')) {
		return false;
	}
	if (!fwrite($handle, $content)) {
		return false;
	}
	fclose($handle);
	return true;
}
/*-- Bussiness functions (public use) --*/
function init_paging(){
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
	$setting_template->set_data('tracking-setting', '{PR_TEL}', 'TEL: ');
	$setting_template->set_data('tracking-setting', '{PR_TEL_VAL}', '080 - 4252 - 2909');
	$setting_template->set_data('tracking-setting', '{PR_MOBILE}', 'MOBILE: ');
	$setting_template->set_data('tracking-setting', '{PR_MOBILE_VAL}', '080 - 4252 - 2909');
	$setting_template->set_data('tracking-setting', '{FAX}', 'Fax');
	$setting_template->set_data('tracking-setting', '{CITY_PREF}', 'City/ pref');
	$setting_template->set_data('tracking-setting', '{ADDRESS1}', 'Address 1');
	$setting_template->set_data('tracking-setting', '{ADDRESS2}', 'Address 2');
	$setting_template->set_data('tracking-setting', '{MEMO}', 'Memo');
	$setting_template->set_data('tracking-setting', '{ADS_PLAN}', 'Ads Plan');
	$setting_template->set_data('tracking-setting', '{TRACKING}', 'Tracking');
	$setting_template->set_data('tracking-setting', '{PLAN_TYPE}', 'Plan type');
	$setting_template->set_data('tracking-setting', '{ROOT_URL}', 'Root URL');
	$setting_template->set_data('tracking-setting', '{COOKIE}', 'Cookie');
	$setting_template->set_data('tracking-setting', '{COOKIE_3DAYS}', 'Cookie 3 days');
	$setting_template->set_data('tracking-setting', '{COOKIE_7DAYS}', 'Cookie 7 days');
	$setting_template->set_data('tracking-setting', '{COOKIE_30DAYS}', 'Cookie 30 days');
	$setting_template->set_data('tracking-setting', '{RETURNING_TIME}', 'Returning time');
	$setting_template->set_data('tracking-setting', '{SAVE}', 'SAVE');
	$setting_template->set_data('tracking-setting', '{CITY_PREF_VAL}',
	array( 'selected' => 25,
												'options' =>  array('都道府県を選択','北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'))
	);
	$setting_template->set_data('tracking-setting', '{PLAN_TYPE_VAL}',
	array( 'selected' => 0,
													'options' =>  array('%','monthly'))
	);
	$setting_template->set_data('tracking-setting', '{COOKIE_VAL}',
	array( 'selected' => 1,
														'options' =>  array('YES','NO'))
	);
	$html = $setting_template->get_html();
	echo $html; // return HTML code for setting page
}

/*-- /Bussiness functions (public use) --*/
function write_company_info(){

	$args = func_get_args();
	//	echo ("abc");
	//$sample_param = $args[0]['sample_param']; // just show how to get parame
	$company_name =$args[0]['company_name'];
	$department= $args[0]['department'];
	$contact= $args[0]['contact'];
	$email = $args[0]['email'];
	$mobile = $args[0]['mobile'];
	$tel= $args[0]['tel'];
	$fax = $args[0]['fax'];
	$city_pref= $args[0]['city_pref'];
	$address1= $args[0]['address1'];
	$address2= $args[0]['address2'];
	$memo= $args[0]['memo'];
	//qa_db_query_sub("INSERT INTO qa_company_info VALUES (NULL, '". "googleeeee". "', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11')");
	$query = ("INSERT INTO qa_company_info VALUES (NULL,'". $company_name. "','". $department. "','".$contact."','". $email. "','".$mobile. "','".$tel. "','".$fax. "','".$city_pref. "','".$address1. "','".$address2. "','".$memo."')");
	$result = qa_db_query_sub($query);
}

/*-- /Bussiness functions (public use) --*/
function write_ads_plan(){
	$args = func_get_args();
	global $data;
	//	echo ("abc");
	//$sample_param = $args[0]['sample_param']; // just show how to get parame
	$plan_type =$args[0]['plan_type'];
	$plan_type_input= $args[0]['plan_type_input'];
	
	$ini_array = parse_ini_file('setting.ini');
	$data = array	(
	'ads_plan' => array(
		'plan_type' => $plan_type,
		'plan_type_input' => $plan_type_input
	)
	);
	write_ini_file($data,'setting.ini', true);
	write_ini_file($ini_array, 'sample.ini', true);
}
/*-- /Bussiness functions (public use) --*/
function write_tracking(){
	$args = func_get_args();
	global $data;
	//	echo ("abc");
	//$sample_param = $args[0]['sample_param']; // just show how to get parame
	$root_url =$args[0]['root_url'];
	$cookie= $args[0]['cookie'];
	$cookie_day = $args[0]['cookie_day'];
	$returning_time = $args[0]['returning_time'];

	$data = array	(
	'tracking' => array(
		'root_url' => $root_url,
		'cookie' => $cookie,
		'cookie_day' => $cookie_day,
		'returning_time' => $returning_time
	)
	);
	write_ini_file($data,'setting.ini', true);
}
/*-- Private functions (local use) --*/


/*-- /Private functions (local use) --*/

/*
 Omit PHP closing tag to help avoid accidental output
*/