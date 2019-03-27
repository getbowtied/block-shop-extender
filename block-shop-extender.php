<?php

/**
 * Plugin Name:       		Block Shop Extender
 * Plugin URI:        		https://github.com/getbowtied/block-shop-extender
 * Description:       		Extends the functionality of Block Shop with theme specific shortcodes and page builder elements.
 * Version:           		1.0
 * Author:            		GetBowtied
 * Author URI:        		https://getbowtied.com
 * Text Domain:				block-shop-extender
 * Domain Path:				/languages/
 * Requires at least: 		5.0
 * Tested up to: 			5.0.3
 *
 * @package  Block Shop Extender
 * @author   GetBowtied
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

// Plugin Updater
require 'core/updater/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/getbowtied/block-shop-extender/master/core/updater/assets/plugin.json',
	__FILE__,
	'block-shop-extender'
);

// Blocks
function gbt_blockshop_blocks() {

	if( is_plugin_active( 'gutenberg/gutenberg.php' ) || is_wp_version('>=', '5.0') ) {
		include_once 'includes/gbt-blocks/index.php';
	} else {
		add_action( 'admin_notices', 'theme_warning' );
	}
}
add_action( 'init', 'gbt_blockshop_blocks' );

// Customizer Extender
function gbt_customizer_extender() {
	if ( class_exists( 'Kirki' ) ) {
		require_once 'includes/customizer/_social_media.php';
	} else {
		return;
	}
}
add_action( 'init', 'gbt_customizer_extender' );

if( !function_exists('theme_warning') ) {
	function theme_warning() {
		?>
		<div class="error">
			<p><?php _e("Block Shop Extender plugin couldn't find the Block Editor (Gutenberg) on this site. It requires WordPress 5+ or Gutenberg installed as a plugin.","block-shop-extender"); ?></p>
		</div>
		<?php
	}
}

if( !function_exists('is_wp_version') ) {
	function is_wp_version( $operator = '>', $version = '4.0' ) {

		global $wp_version;

		return version_compare( $wp_version, $version, $operator );
	}
}


function blockshop_social_media() {
	if ( class_exists('GBT_Opt')) {
		$socmed_platforms = GBT_Opt::getOption('social_media_platforms');
		if (!empty($socmed_platforms)) {
		    foreach ($socmed_platforms as $p) {
		        if (isset($p['platform']) && isset($p['url']) && !empty($p['platform']) && !empty($p['url'])) {
		            echo '<a href="' . esc_url( $p['url'] ) . '"><i class="icon-social-' . $p['platform'] . '"></i></a>';
		        }
		    }
		}
	}
}

add_action('blockshop_social_media', 'blockshop_social_media');