<?php

namespace giorgiosaud\tasaRemesas;

class Options
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'addPluginPage'));
        add_action('admin_init', array($this, 'pageInit'));
    }

    /**
     * Add options page
     */
    public function addPluginPage()
    {
        add_menu_page(
            'Tasa Remesas Settings', // Page Title
            'Tasa Remesas', // Menu Title
            'manage_options', //Capability
            'tasa_remesas_wp_plugin', // Menu Slug
            array($this, 'createAdminPage'), // callable function,
            '',//Icon URL
            null //Position
        );
        add_submenu_page(
            'tasa_remesas_wp_plugin', //Parent Slug
            'Slick Wp Settings', // Page Title
            'Slick Wp Main Settings', // Menu Title
            'manage_options', //capability
            'tasa_remesas_wp_plugin', // menu slug
            array($this, 'createAdminPage') // Callable
        );
        add_submenu_page(
            'tasa_remesas_wp_plugin', //Parent Slug
            'Remesas Wp Webhook Settings',// Page Title
            'Remesas Wp Webhook Setup', // Menu Title
            'manage_options',//capability
            'tasa_remessas_wp_plugin_webhook',// menu slug
            array($this, 'createWebhookAdminPage') // Callable
        );
    }

    /**
     * Options page callback
     */
    public function createWebhookAdminPage()
    {
        // Set class property
        $this->options = get_option('tasa_remesas_wp_plugin_webhook');
        ?>
        <div class="wrap">
            <h1>My Webhook Settings</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('tasa_remesas_wp_plugin_webhhok_settings');
                do_settings_sections('tasa_remesas_wp_plugin_webhook');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function pageInit()
    {
        register_setting(
            'tasa_remesas_wp_plugin_webhhok_settings', // Option group
            'tasa_remesas_wp_plugin_webhook', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'tasa_remesas_wp_plugin_webhook_settings', // ID
            'Giorgio Plugin My Webhook Settings', // Title
            array($this, 'printSectionInfo'), // Callback
            'tasa_remesas_wp_plugin_webhook' // Page
        );
        add_settings_field(
            'secret', //ID
            'Secret', //Title
            array($this, 'webhookCallback'), // callback
            'tasa_remesas_wp_plugin_webhook', //Page
            'tasa_remesas_wp_plugin_webhook_settings' //Section
        );
        register_setting(
            'tasa_remesas_wp_plugin_general_settings', // Option group
            'tasa_remesas_wp_plugin_general', // Option name
            array($this, 'sanitize_general_settings') // Sanitize
        );
        add_settings_section(
            'tasa_remesas_wp_plugin_general_settings', // ID
            'Slick Settings', // Title
            array($this, 'printSectionSlick'), // Callback
            'tasa_remesas_wp_plugin_general' // Page
        );
        add_settings_field(
            'tasa_del_dia', //ID
            __('Ingrese la tasa Actual', 'tasa_remesas_wp_plugin'), //Title
            array($this, 'tasa_actual'), // callback
            'tasa_remesas_wp_plugin_general', //Page
            'tasa_remesas_wp_plugin_general_settings' //Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        // if( isset( $input['id_number'] ) )
        //  $new_input['id_number'] = absint( $input['id_number'] );

        if (isset($input['secret'])) {
            $new_input['secret'] = sanitize_text_field($input['secret']);
        }

        return $new_input;
    }


    public function webhookCallback()
    {
        printf(
            '<input type="text" id="secret" name="tasa_remesas_wp_plugin_webhook[secret]" value="%s" />',
            isset($this->options['secret']) ? esc_attr($this->options['secret']) : ''
        );
    }


    public function sanitize_general_settings($input)
    {
        $new_input = array();
        if( isset( $input['tasa'] ) )
            $new_input['tasa'] = absint( $input['tasa'] );
        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function printSectionInfo()
    {
        _e('Enter your Webhook Settings below:', 'tasa_remesas_wp_plugin');
    }

    /**
     * Print the Section text
     */
    public function printSectionSlick()
    {
        _e('Enter your Slick Settings below:', 'tasa_remesas_wp_plugin');
    }


    public function tasa_actual()
    {
        var_dump($this->options);
        printf(
            '<input type="number" id="tasa" name="tasa_remesas_wp_plugin_general[tasa]" value="%i" />',
            isset($this->options['tasa']) ? esc_attr($this->options['tasa']) : ''
        );


    }

    /**
     * Options page callback
     */
    public function createAdminPage()
    {
        // Set class property
        $this->options = get_option('tasa_remesas_wp_plugin_general');
        ?>
        <div class="wrap">
            <h1>My Settings</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('tasa_remesas_wp_plugin_general_settings');
                do_settings_sections('tasa_remesas_wp_plugin_general');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
