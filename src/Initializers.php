<?php
namespace giorgiosaud\tasaRemesas;


use giorgiosaud\tasaRemesas\shortcodes\tasaRemesasShortcode;

class Initializers extends Singleton
{
	public $version="1.0";
	/**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     */
    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
	public function __construct()
	{

		$this->defineConstants();
        
		$this->initHooks();
		if (is_admin()) {
			$my_settings_page = new Options();
		}
		do_action('giorgioremesasplugin_loaded');
	}
	private function defineConstants()
	{
		$upload_dir = wp_upload_dir(null, false);
		$this->define('TASAREMESAS_ABSPATH', dirname(TASAREMESAS_FILE) . '/');
		$this->define('TASAREMESAS_BASENAME', plugin_basename(TASAREMESAS_FILE));
		$this->define('TASAREMESAS_VERSION', $this->version);
        $this->define('TASAREMESAS_CMB2PREFIX','SLICKWP_');
	}
    /**
     * Initialize Hooks
     */
    private function initHooks()
    {	
    	tasaRemesasShortcode::getInstance();
    	StylesAndScripts::getInstance();
    }
}