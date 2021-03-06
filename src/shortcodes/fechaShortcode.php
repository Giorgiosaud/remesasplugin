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
        $this->fecha=$options['fecha_tasa'];
        $this->prepareView();
        return $this->view;
        
        $this->prepareView();
        return $this->view;
    }
    protected function prepareView()
    {
        $html='<div class="Fecha" style="text-align:center">';
        // $html .='Hoy ';
        
        $formato = 'Y-m-d';
        
        $fecha=\DateTime::createFromFormat($formato, $this->fecha);
        
        $html.=date_format($fecha, "d/m/Y");
        ;
        $html.="</div>";
        
        $this->view=$html;
    }
}
