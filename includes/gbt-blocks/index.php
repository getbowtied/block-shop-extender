<?php

//==============================================================================
//	Main Editor Styles
//==============================================================================
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_style(
		'getbowtied-bs-editor-styles',
		plugins_url( 'assets/css/editor.css', __FILE__ ),
		array( 'wp-edit-blocks' )
	);
});

//==============================================================================
//	Main JS
//==============================================================================
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_script(
		'getbowtied-bs-editor-scripts',
		plugins_url( 'assets/js/main.js', __FILE__ ),
		array( 'wp-blocks', 'jquery' )
	);
});

include_once 'posts_grid/block.php';
include_once 'slider/block.php';