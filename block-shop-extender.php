<?php

/**
 * Plugin Name:       		Block Shop Extender
 * Plugin URI:        		https://github.com/getbowtied/block-shop-extender
 * Description:       		Extends the functionality of Block Shop with Gutenberg elements.
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

function gbt_blockshop_gutenberg_blocks() {

	$theme = wp_get_theme();
	if ( $theme->template != 'block-shop') {
		return;
	}

	if( is_plugin_active( 'gutenberg/gutenberg.php' ) || is_wp_version('>=', '5.0') ) {
		include_once 'includes/gbt-blocks/index.php';
	} else {
		add_action( 'admin_notices', 'theme_warning' );
	}
}
add_action( 'init', 'gbt_blockshop_gutenberg_blocks' );

if( !function_exists('theme_warning') ) {
	function theme_warning() {

		echo '<div class="message error woocommerce-admin-notice woocommerce-st-inactive woocommerce-not-configured">';
		echo '<p>Block Shop Extender is enabled but not effective. Please activate Gutenberg plugin in order to work.</p>';
		echo '</div>';
	}
}

if( !function_exists('is_wp_version') ) {
	function is_wp_version( $operator = '>', $version = '4.0' ) {

		global $wp_version;

		return version_compare( $wp_version, $version, $operator );
	}
}

function gbt_customizer_extender() {
	if ( class_exists( 'Kirki' ) ) {
		require_once 'includes/customizer/_social_media.php';
	} else {
		return;
	}
}

add_action( 'init', 'gbt_customizer_extender' );
