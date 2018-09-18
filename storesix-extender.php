<?php

/**
 * Plugin Name:       		Storesix Extender
 * Plugin URI:        		https://github.com/getbowtied/storesix-extender
 * Description:       		Extends the functionality of Storesix with Gutenberg elements.
 * Version:           		1.0
 * Author:            		GetBowtied
 * Author URI:        		https://getbowtied.com
 * Requires at least: 		4.9
 * Tested up to: 			4.9.8
 *
 * @package  Storesix Extender
 * @author   GetBowtied
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

add_action( 'init', 'github_plugin_updater' );
function github_plugin_updater() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) {

		$config = array(
			'slug' 				 => plugin_basename(__FILE__),
			'proper_folder_name' => 'storesix-extender',
			'api_url' 			 => 'https://api.github.com/repos/getbowtied/storesix-extender',
			'raw_url' 			 => 'https://raw.github.com/getbowtied/storesix-extender/master',
			'github_url' 		 => 'https://github.com/getbowtied/storesix-extender',
			'zip_url' 			 => 'https://github.com/getbowtied/storesix-extender/zipball/master',
			'sslverify'			 => true,
			'requires'			 => '4.9',
			'tested'			 => '4.9.8',
			'readme'			 => 'README.txt',
			'access_token'		 => '',
		);

		new WP_GitHub_Updater( $config );

	}
}

function gbt_storesix_gutenberg_blocks() {

	$theme = wp_get_theme();
	if ( $theme->template != 'storesix') {
		return;
	}

	if( is_plugin_active( 'gutenberg/gutenberg.php' ) || is_wp_version('>=', '5.0') ) {
		include_once 'includes/gbt-blocks/index.php';
	} else {
		add_action( 'admin_notices', 'theme_warning' );
	}
}
add_action( 'init', 'gbt_storesix_gutenberg_blocks' );

if( !function_exists('theme_warning') ) {
	function theme_warning() {

		echo '<div class="message error woocommerce-admin-notice woocommerce-st-inactive woocommerce-not-configured">';
		echo '<p>Storesix Extender is enabled but not effective. Please activate Gutenberg plugin in order to work.</p>';
		echo '</div>';
	}
}

if( !function_exists('is_wp_version') ) {
	function is_wp_version( $operator = '>', $version = '4.0' ) {

		global $wp_version;

		return version_compare( $wp_version, $version, $operator );
	}
}