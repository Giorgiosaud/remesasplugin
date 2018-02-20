<?php
namespace giorgiosaud\tasaRemesas;
class StylesAndScripts extends Singleton{
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this,'myplugin_scripts') );
	}	
	public function myplugin_scripts(){
		wp_register_style( 'slckwpGs',  SLICKWP_BASE_URL . 'slick/slick/slick.css' );
		wp_register_style( 'slckwpGsTheme',  SLICKWP_BASE_URL . 'slick/slick/slick-theme.css',array('slckwpGs') );
		wp_register_style( 'slickWpStyle',  SLICKWP_BASE_URL . 'css/slickwp.css',array('slckwpGsTheme') );
		wp_enqueue_script('slick_wp_gs_ms', SLICKWP_BASE_URL.'slick/slick/slick.js', array('jquery'), 'version', true);
		wp_enqueue_script('slick_wp_js', SLICKWP_BASE_URL.'js/slickwp.js', array('slick_wp_gs_ms'), 'version', true);
		wp_enqueue_style( 'slickWpStyle' );
		wp_enqueue_script('slick_wp_js');
	}
}