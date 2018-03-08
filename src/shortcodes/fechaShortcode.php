<?php 
namespace giorgiosaud\tasaRemesas\shortcodes;

use giorgiosaud\tasaRemesas\Singleton;

/**
 * @property  tasa
 */
class fechaShortcode extends Singleton
{
    protected $view;

    public function __construct()
    {
        add_shortcode('fechaRemesas', array($this,'execute'));
    }
    public function execute($atts)
    {
        $atts = shortcode_atts(
            array(
                'class'=>'fecha'
            ),
            $atts,
            'remesas2017'
        );
        $this->prepareView();
        return $this->view;
    }
    protected function prepareView()
    {
        $html='<div class="Fecha" style="text-align:center">';
        $html .='Hoy ';
        $html.=date('d/m/Y', time());
        $html.="</div>";

        $this->view=$html;
    }
}
