<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    Wp_Moxie_Raul
 * @subpackage Wp_Moxie_Raul/includes
 * @author     Raul Marrero
 */
class Wp_Moxie_Raul_Public {
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style(
            $this->plugin_name . '-moxie',
            plugin_dir_url( __FILE__ ) . 'css/moxie.css',
            array(),
            $this->version,
            false
        );

        wp_enqueue_style(
            $this->plugin_name . '-bootstrap',
            plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css',
            array(),
            $this->version,
            false
        );


    }
    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script(
            $this->plugin_name . '-react',
            plugin_dir_url( __FILE__ ) . 'js/build/react.min.js',
            array(),
            $this->version,
            false
        );

        wp_enqueue_script(
            $this->plugin_name . 'react-dom',
            plugin_dir_url( __FILE__ ) . 'js/build/react-dom.min.js',
            array(),
            $this->version,
            false
        );

        wp_enqueue_script(
            $this->plugin_name . 'babel',
            '//cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js',
            array(),
            $this->version,
            false
        );

        wp_enqueue_script(
            $this->plugin_name . 'jquery',
            plugin_dir_url( __FILE__ ) . 'js/build/jquery-2.1.4.min.js',
            array( 'jquery' ),
            $this->version,
            false
        );

        wp_enqueue_script(
            $this->plugin_name . 'bootstrap',
            plugin_dir_url( __FILE__ ) . 'js/build/bootstrap.min.js',
            array( 'jquery' ),
            $this->version,
            false
        );
/*
        wp_enqueue_script(
            $this->plugin_name . 'app',
            plugin_dir_url( __FILE__ ) . 'js/app.js',
            array(),
            $this->version,
            false
        );*/
    }

    /**
     * Set plugin specific homepage template.
     *
     * @since    1.0.0
     */
    function replace_home_page($template) {
        if ( is_front_page() ) {
            return plugin_dir_path( __FILE__ ) . 'templates/home.php';
        }
        return $template;
    }
}