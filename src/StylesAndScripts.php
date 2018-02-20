<?php
namespace giorgiosaud\tasaRemesas;
class StylesAndScripts extends Singleton{
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this,'myplugin_scripts') );
	}	
	public function myplugin_scripts(){

	}
}