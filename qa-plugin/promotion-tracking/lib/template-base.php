<?php
abstract class template_base{
	/*
		template_name => array('html' => $html,
							'field' => array(field1, field2),
							'data' => array(data1, data2),
							)
	*/
	protected $main_template_html = '';
	protected $main_template_name = '';
	protected $webparts = array();
	protected $symbols;
	
	protected function init($template_ctp_file, $symbols = array('{', '}')){
		$this->main_template_html = file_get_contents($template_ctp_file);
		$this->symbols = $symbols;
		
		$pos = strrpos($template_ctp_file, '/');
		$template_name = substr($template_ctp_file, $pos + 1);
		$template_name = str_replace('.ctp', '', $template_name);
		
		$this->main_template_name = $template_name;
	}
	
	public function set_data($template_name, $field, $data){
		if ($template_name == $this->main_template_name){
			if (is_array($data)){
				if (isset($data['options'])){
					$data = $this->get_replace_options($data);
				}
			}
			$this->main_template_html 
							= str_replace($field, $data, $this->main_template_html);
			
			return;
		}
		$this->webparts[$template_name]['data'][$field] = $data;
	}
	
	public function load_part($template_file, $field_arr){
		// Find the position of the last occurrence of / character
		$pos = strrpos($template_file, '/');
		$template_name = substr($template_file, $pos + 1);
		$template_name = str_replace('.ctp', '', $template_name);
		if (file_exists($template_file)){
			$this->webparts[$template_name]['html'] = file_get_contents($template_file);
			$this->webparts[$template_name]['field'] = $field_arr;
		}
	}
	
	public function get_part_html($template_name){
		$field_arr = $this->webparts[$template_name]['field'];
		$html = $this->webparts[$template_name]['html'];
		
		if (empty($field_arr)){
			return $html;
		}
		
		foreach($field_arr as $key => $field){
			$func_name = str_replace($this->symbols[0], '', $field);
			$func_name = str_replace($this->symbols[1], '', $func_name);
			$func_name = 'replace_'.strtolower($func_name);
			$class_name = get_class($this);
			if (method_exists($class_name, $func_name)){
				$args = '';
				if (isset($this->webparts[$template_name]['data'][$field])){
					$args = $this->webparts[$template_name]['data'][$field];
				}
				$replace_arr[$field] = 
							call_user_func_array(array($this, $func_name), array($args)); 
			} else {
				$replace_arr[$field] = $this->webparts[$template_name]['data'][$field];
			}
		}
		
		if (!empty($replace_arr)){
			foreach($replace_arr as $field => $replace){
				if (is_array($replace)){
					error_log('DEBUG: Array to string conversion at: '.$field);
				} else {
					$html = str_replace($field, $replace, $html);
				}
			}
		}
		
		return $html;
	}
	
	public function get_html(){
		$html_arr = array();
		foreach($this->webparts as $template_name => $template){
			$html_arr[$this->symbols[0].$template_name.$this->symbols[1]] 
									= $this->get_part_html($template_name);
		}

		$html = $this->main_template_html;
		foreach($html_arr as $key => $replace){
			$search = strtoupper($key);
			$search = str_replace('-', '_', $search);
			$html = str_replace($search, $replace, $html);
		}
		return $html;

	}
	
	protected function get_replace_options($args){
		if (isset($args['selected'])){
			$selected_val = $args['selected'];
		}
		if (!isset($args['options'])){
			error_log('DEBUG: No [options] set for <select> tags');			
		} else {
			$options = $args['options'];
		}		
		
		$tmp = '';		
		foreach($options as $key => $option){
			if (isset($selected_val) && ($selected_val == $key)){
				$tmp .= '<option value="'.$key.'" selected>'.$option.'</option>';
			} else {
				$tmp .= '<option value="'.$key.'">'.$option.'</option>';
			}
		}
		
		return $tmp;
	}
}