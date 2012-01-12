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
require_once 'qa-tracking-config.php';

class qa_purchase_list {
	public function match_request($request){
		if (qa_get_logged_in_userid() == null){
			return(false);
		}
		
		//	Check admin privileges (do late to allow one DB query)
		if (qa_get_logged_in_level() < QA_USER_LEVEL_MODERATOR){
			return false;
		}
		
		if ($request == PURCHASE_LIST){
			return(true);
		}			
		return(false);
	}
	
	public function process_request($request){
		$qa_content=qa_content_prepare();
		$qa_content["script_rel"][] = 'qa-plugin/promotion-tracking/js/expand_qa_main.js';
		$qa_content["script_rel"][] = 'qa-plugin/promotion-tracking/js/qa-purchase-list.js';
		
		$qa_content["custom"] = '<p>Welcome to tracking purchase list</p>';
		
		return($qa_content);		
	}
	
};
	

/*
	Omit PHP closing tag to help avoid accidental output
*/