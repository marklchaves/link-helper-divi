<?php

/**
 * Link Helper Divi
 *
 * @link              https://github.com/chavesm/link-helper-divi
 * @since             0.1.0
 * @package           Link_Helper_Divi_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Link Helper Divi
 * Plugin URI:        https://github.com/chavesm/link-helper-divi
 * Description:       Insert missing title attributes for image links. This will help Google Analytics link tracking for themes like Divi.
 * Version:           1.0.0
 * Author:            mark l chaves
 * Author URI:        https://www.caughtmyeye.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       link-helper-divi
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('LINK_HELPER_DIVI_PLUGIN_NAME', 'link-helper-divi');
define('LINK_HELPER_DIVI_PLUGIN_VERSION', '1.0.0');
define('LINK_HELPER_SELECTOR', '.et_pb_image_wrap'); // Default to Divi.

/**
 * Enqueue the Link Helper JavaScript Library
 * and Inline Script
 * 
 * This supports the link_helper_selector filter.
 */

function enqueue_link_helper_divi_javascript()
{	
    wp_register_script( LINK_HELPER_DIVI_PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'public/js/' . LINK_HELPER_DIVI_PLUGIN_NAME . '.js', '', LINK_HELPER_DIVI_PLUGIN_VERSION, true ); // Put in the footer ~mlc
    wp_enqueue_script( LINK_HELPER_DIVI_PLUGIN_NAME );

    $script = 'addDiviLinkTitles();';
    wp_add_inline_script( LINK_HELPER_DIVI_PLUGIN_NAME, $script, 'after' );

    $query_selector = LINK_HELPER_SELECTOR;
    $query_selector = apply_filters( 'link_helper_selector', $query_selector );
    $php_vars = array(
        'querySelector' => $query_selector
    );
    wp_localize_script( LINK_HELPER_DIVI_PLUGIN_NAME, 'php_vars', $php_vars );
}
add_action( 'wp_enqueue_scripts', 'enqueue_link_helper_divi_javascript' );
