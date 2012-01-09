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

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	//header('Location: ../../');
	//exit;
}
// define directory constants
if (!defined('WEBROOT_DIR'))
  define('WEBROOT_DIR', dirname(dirname(dirname(__FILE__))).'/');
if (!defined('QAEC_PLUGIN_DIR'))
  define('QAEC_PLUGIN_DIR', WEBROOT_DIR . 'qa-plugin/promotion-tracking/');

if (!defined('QAEC_TEMPLATE_DIR'))
define('QAEC_TEMPLATE_DIR', QAEC_PLUGIN_DIR.'tmpl/');
if (!defined('QAEC_LIB_DIR'))
define('QAEC_LIB_DIR', QAEC_PLUGIN_DIR.'lib/');
if (!defined('QAEC_JS_DIR'))
define('QAEC_JS_DIR', QAEC_PLUGIN_DIR.'js/');
if (!defined('QAEC_CSS_DIR'))
define('QAEC_CSS_DIR', QAEC_PLUGIN_DIR.'css/');
if (!defined('QAEC_IMG_DIR'))
define('QAEC_IMG_DIR', QAEC_PLUGIN_DIR.'img/');

// Include all neccessary 
require_once WEBROOT_DIR."qa-include/qa-base.php"; 
require_once QA_INCLUDE_DIR."qa-app-format.php";
require_once QA_INCLUDE_DIR."qa-app-users.php";
require_once QA_INCLUDE_DIR."qa-db.php";
require_once QA_INCLUDE_DIR."qa-db-selects.php";
require_once QA_INCLUDE_DIR.'qa-app-admin.php';

require_once QAEC_PLUGIN_DIR . 'qa-functions.php';
require_once QAEC_LIB_DIR.'template-factory.php';
require_once QAEC_LIB_DIR.'template-base.php';
require_once "qa-ajax-base.php";

// define qaec requests
define('TRACKING_HOME', 'tracking');
define('CONFIGURATION', TRACKING_HOME.'/config');
define('ANALYTICS', TRACKING_HOME.'/analytics');
define('PURCHASE_LIST', TRACKING_HOME.'/purchase_list');
define('PURCHASE_EDIT', TRACKING_HOME.'/purchase_edit');

/*
	Omit PHP closing tag to help avoid accidental output
*/