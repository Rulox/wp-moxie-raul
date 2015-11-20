<?php
/**
 * Plugin Name:     WP Moxie Raul
 * Plugin URI:      https://github.com/Rulox/wp-moxie-raul
 * Version:         1.0.0
 * Author:          Raul Marrero
 * Description:     Basic plugin that implements a simple JSON API for a WordPress Custom Post Type (Movies) and
 *                  a basic layout that works as a demo of the plugin, built in ReactJS. Moxie test.
 * Date:            18/11/2015
 *
 * Note:            A WordPress plugin boilerplate was used for the basic structure.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-moxie-raul-activator.php
 */
function activate_wp_moxie_raul() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-moxie-raul-activator.php';
    Wp_Moxie_Raul_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-moxie-raul-deactivator.php
 */
function deactivate_wp_moxie_raul() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-moxie-raul-deactivator.php';
    Wp_Moxie_Raul_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_moxie_raul' );
register_deactivation_hook( __FILE__, 'deactivate_wp_moxie_raul' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-wp-moxie-raul.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_wp_moxie_raul() {
    $plugin = new Wp_Moxie_Raul();
    $plugin->run();
}

run_wp_moxie_raul();