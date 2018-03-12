<?php 
namespace giorgiosaud\tasaRemesas\shortcodes;

use giorgiosaud\tasaRemesas\Singleton;

/**
 * @property  tasa
 */
class fechaShortcode extends Singleton
{
    protected $view;
    protected $fecha;

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
        $options=get_option('tasa_remesas_wp_plugin_general');
        $this->fecha=date_create($options['fecha_tasa']);
        die(var_dump($this->fecha));
        $this->prepareView();
        return $this->view;

        $this->prepareView();
        return $this->view;
    }
    protected function prepareView()
    {
        $html='<div class="Fecha" style="text-align:center">';
        // $html .='Hoy ';
        $html.=date('d/m/Y', $this->fecha);
        $html.="</div>";

        $this->view=$html;
    }
}
