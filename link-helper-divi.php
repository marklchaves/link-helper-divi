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
 * Description:       Insert missing title attributes for image links. This will help Google Analytics link tracking for Divi themes.
 * Version:           0.1.0
 * Author:            MonsterInsights
 * Author URI:        https://www.monsterinsights.com
 * License:           TBD
 * License URI:       https://www.monsterinsights.com
 * Text Domain:       link-helper-divi
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('LINK_HELPER_DIVI_PLUGIN_NAME', 'link-helper-divi');
define('LINK_HELPER_DIVI_PLUGIN_VERSION', '0.1.0');

/**
 * Enqueue the Link Helper JavaScript Library
 */

function enqueue_link_helper_divi_javascript()
{	
    wp_register_script( LINK_HELPER_DIVI_PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'public/js/' . LINK_HELPER_DIVI_PLUGIN_NAME . '.js', '', LINK_HELPER_DIVI_PLUGIN_VERSION, true ); // Put in the footer ~mlc

    wp_enqueue_script( LINK_HELPER_DIVI_PLUGIN_NAME );

    $script = 'addDiviLinkTitles();';
    wp_add_inline_script( LINK_HELPER_DIVI_PLUGIN_NAME, $script, 'after' );

    $query_selector = '.et_pb_image_wrap';
    $query_selector = apply_filters( 'link_helper_selector', $query_selector );
    $php_vars = array(
        'querySelector' => $query_selector
    );
    wp_localize_script( LINK_HELPER_DIVI_PLUGIN_NAME, 'php_vars', $php_vars );
}
add_action( 'wp_enqueue_scripts', 'enqueue_link_helper_divi_javascript' );
