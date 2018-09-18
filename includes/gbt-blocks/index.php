<?php

// Shopkeeper Custom Gutenberg Blocks
 
add_filter( 'block_categories', function( $categories, $post ) {
	if ( $post->post_type !== 'post' && $post->post_type !== 'page' && $post->post_type !== 'portfolio' ) {
		return $categories;
	}
	return array_merge(
		array(
			array(
				'slug' => 'storesix',
				'title' => __( 'Storesix', 'gbt-blocks' ),
			),
		),
		$categories
	);
}, 10, 2 );

require_once 'latest_posts_grid/index.php';