<?php
/*
Plugin Name:  Tasa Remesas 2017
Plugin URI:   https://giorgiosaud.com
Description:  Tasa Remesas 2017 for Wp
Version:      1.0
Author:       Giorgiosaud
Author URI:   https://giorgiosaud.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

use giorgiosaud\tasaRemesas\Initializers;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if (!defined('TASAREMESAS_FILE')) {
    define('TASAREMESAS_FILE', __FILE__);
}
if (!defined('TASAREMESAS_BASE_URL')) {
    define('TASAREMESAS_BASE_URL', plugin_dir_url( __FILE__ ));
}
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}
require_once 'vendor/autoload.php';
function tasaRemesasPlugin()
{
    return Initializers::getInstance();
}
$GLOBALS['tasaremesas'] = tasaRemesasPlugin();
tasaR