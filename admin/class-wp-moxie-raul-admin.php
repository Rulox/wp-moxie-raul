<?php
/**
 * Admin features for the plugin
 *
 * Defines the plugin name, version, and hooks for
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Moxie_Raul_Test
 * @subpackage Wp_Moxie_Raul_Test/admin
 * @author     Raul Marrero
 */
class Wp_Moxie_Raul_Admin {

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties. And hook ACF plugin with this plugin.
     *
     * @since    1.0.0
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

    }


}