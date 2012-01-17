<?php
class tracking_setting_template extends template_base{
	public function __contructs(){
		parent::__contructs();
	}
	
	public function init($template_ctp_file){
		parent::init($template_ctp_file);
	}
	
	public function replace_promotion_list_val($args){
		return $args;
	}
	
	public function replace_sale_method_val($args){		
		return $this->get_replace_options($args);
	}
	
	public function replace_status_val($args){
		return $this->get_replace_options($args);
	}
}