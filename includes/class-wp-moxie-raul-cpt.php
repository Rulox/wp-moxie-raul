<?php
/**
 * Registration of CPT and related taxonomies if any.
 *
 * @since      1.0.0
 * @package    Wp_Moxie_Rau
 * @subpackage Wp_Moxie_Raul/includes
 * @author     Raul Marrero
 */


class Movie_Post_Type {
    /**
     * @var string  $cpt_name   Movie CPT Name
     */
    public $cpt_name;
    /**
     * The Custom Post Type labels
     *
     * @var array $cpt_labels   Movie CPT labels
     */
    public $cpt_labels;

    /**
     * Parameters for the Custom Post Type
     * @var array   $cpt_args   Stores parameters for the CPT
     */
    public $cpt_args;

    /**
     * Movie_Post_Type constructor.
     * @param string $name  Set parameters for the CPT
     * @param array $args   Set the labels for the CPT
     * @param array $labels Set the name for the CPT
     */
    public function __construct($name='movie_post_type', $args=array(), $labels=array()) {
        $this->cpt_name = $name;
        $this->cpt_args = $args;
        $this->cpt_labels = $args;

        // Call the register_post_type function when init
        add_action( 'init', array( $this, 'register_post_type' ) );

        //$this->save();
    }

    public function register_post_type() {
        // Load plugin text domain for translation
        $this->load_plugin_textdomain();

        // Merge default labels with labels passed to the constructor.
        $name = ucwords(str_replace('_', ' ', $this->cpt_name));
        $labels = array_merge(
            array(
                'name'                  => __($name . 's', 'post custom type name'),
                'singular_name'         => __($name, 'singular post custom type name'),
                'add_new'               => __('Add New', $name),
                'add_new_item'          => __('Add New ' . $name ),
                'edit_item'             => __('Edit ' . $name ),
                'new_item'              => __('New ' . $name ),
                'all_items'             => __('All ' . $name . 's' ),
                'view_item'             => __('View ' . $name ),
                'search_items'          => __('Search ' . $name . 's' ),
                'not_found'             => __('No ' . $name . ' found'),
                'not_found_in_trash'    => __('No ' . $name . ' found in Trash'),
                'parent_item_colon'     => '',
                'menu_name'             => $name . 's'
            ),
            $this->cpt_labels
        );

        // Merge default args with args passed to the constructor
        $args = array_merge(
            array(
                'label'                 => $name . 's',
                'labels'                => $labels,
                'public'                => true,
                'show_ui'               => true,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'show_in_nav_menus'     => true,
                '_builtin'              => false,
            ),

            $this->cpt_args
        );

        // Register the CPT
        register_post_type($this->cpt_name, $args);

    }


    /**
     * Load the plugin text domain for translation.
     *
     * @since 0.1.0
     */
    public function load_plugin_textdomain() {
        $domain = $this->cpt_name . 'plugin';
        $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
        load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
        load_plugin_textdomain( $domain, FALSE, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages' );
    }
}