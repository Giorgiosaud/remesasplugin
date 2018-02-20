<?php 
namespace giorgiosaud\tasaRemesas\shortcodes;
use giorgiosaud\tasaRemesas\Singleton;

/**
 * @property  tasa
 */
class tasaRemesasShortcode extends Singleton{
	protected $view;
    private $tasa;

    public function __construct()
	{
		add_shortcode('tasaRemesas',array($this,'execute'));
	}
	public function execute($atts){
		$atts = shortcode_atts(
			array(
				'class'=>'tasa'
			), $atts, 'slickwp' );
        $options=get_option('tasa_remesas_wp_plugin_general');
        $this->tasa=$options['tasa'];
        $this->prepareView();
		return $this->view;
	}
	protected function prepareView(){
        $tasa=$this->tasa/100;
        $html="<h2 style='text-align: center;'>Tasa $tasa</h2>";
        $html.='<p style="text-align: center;">20.000$=123bs</p>';
        $html.='<p style="text-align: center;">40.000$=123bs</p>';
        $html.='<p style="text-align: center;">50.000$=123bs</p>';
        $html.='<p style="text-align: center;">100.000$=123bs</p>';
        $html.='<p style="text-align: center;">200.000$=123bs</p>';
        $html.='<p style="text-align: center;">500.000$=123bs</p>';
        $html.='<p style="text-align: center;">1.000.000$=123bs</p>';
		$this->view=$html;
	}
}

