<?php
class template_factory{
	public static function create($template_path){
		if (empty($template_path)){
			return null;
		}
		$path_arr = explode('/', $template_path);
		if (empty($path_arr)){
			return null;
		}
		
		if (count($path_arr) > 1){
			$class_name = str_replace('-', '_', $path_arr[1].'_template');
			$template_class_file = QAEC_LIB_DIR.$path_arr[1].'-template.php';
			$template_ctp_file = QAEC_TEMPLATE_DIR.$path_arr[0].'/'.$path_arr[1].'.ctp';
		} else {
			$class_name = str_replace('-', '_', $path_arr[0].'_template');
			$template_class_file = QAEC_LIB_DIR.$path_arr[0].'-template.php';
			$template_ctp_file = QAEC_TEMPLATE_DIR.$path_arr[0].'.ctp';
		}
			
		if (!file_exists($template_class_file) || !file_exists($template_ctp_file)){
			error_log('Class file or template file are not existed.');
			return null;
		}
		
		require_once $template_class_file;
		$class_name = str_replace('qa-', '', $class_name);
		$class_name = str_replace('qaec-', '', $class_name);
		
		$new_tmpl = new $class_name();
		$new_tmpl->init($template_ctp_file);
		return $new_tmpl;
	}
}