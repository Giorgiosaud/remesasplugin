<?php 
namespace giorgiosaud\tasaRemesas\shortcodes;

use giorgiosaud\tasaRemesas\Singleton;

/**
 * @property  tasa
 */
class tasaRemesasShortcode extends Singleton
{
    protected $view;
    private $tasa;

    public function __construct()
    {
        add_shortcode('tasaRemesas', array($this,'execute'));
    }
    public function execute($atts)
    {
        $atts = shortcode_atts(
            array(
                'class'=>'tasa'
            ),
            $atts,
            'slickwp'
        );
        $options=get_option('tasa_remesas_wp_plugin_general');
        $this->tasa=$options['tasa'];
        $this->prepareView();
        return $this->view;
    }
    protected function prepareView()
    {
        $html='<div class="tasaDelDia">';
        $tasa=number_format($this->tasa/10000, 4, ',', '.');
        $html.="<h2 style='text-align: center;'>Tasa $tasa Bs/Clp</h2>";
      //  $tasa=number_format($this->tasa/10000*10000, 2, ',', '.');
      //  $html.="<p style='text-align: center;'>10.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*20000, 4, ',', '.');
        $html.="<p style='text-align: center;'>20.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*40000, 4, ',', '.');
        $html.="<p style='text-align: center;'>40.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*50000, 4, ',', '.');
        $html.="<p style='text-align: center;'>50.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*100000, 4, ',', '.');
        $html.="<p style='text-align: center;'>100.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*500000, 4, ',', '.');
        $html.="<p style='text-align: center;'>500.000$=$tasa Bs.</p>";
        $tasa=number_format($this->tasa/10000*1000000, 4, ',', '.');
        $html.="<p style='text-align: center;'>1.000.000$=$tasa Bs.</p>";
        $html.="</div>";

        $this->view=$html;
    }
}
