<?php
require_once 'qa-tracking-config.php';
/*-- Init-processing --*/
// Connect to database
global $qa_db;
qa_base_db_connect(null);
mysql_set_charset('utf8', $qa_db); 

// Get params from the request
$params = array();
foreach($_REQUEST as $key=>$val){
  $params[$key] = $val;
}
if (!isset($params['cmd'])){
	return;
}
$cmd = $params['cmd'];
unset($params['cmd']);

// Register biz function
$function_array = array();

/*-- Init-processing --*/
/*-- Process registed commands --*/
function do_tracking_request_process(){
	global $function_array;
	global $cmd;
	// Find function and execute
	foreach($function_array as $key => $func){
		
	  if ($key == $cmd){
	    call_user_func($func['func'], $func['args']);
	    return true;
	  }
	}
  // If function not found or error, return NG
  return false; 
}
/*-- Process registed commands --*/


/*-- Shared functions --*/

/*-- Shared functions --*/

/*
  Omit PHP closing tag to help avoid accidental output
*/