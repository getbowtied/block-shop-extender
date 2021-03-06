<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once 'functions/function-setup.php';
include_once 'functions/function-helpers.php';

//==============================================================================
//	Frontend Output
//==============================================================================
if ( ! function_exists( 'gbt_18_bs_render_frontend_posts_grid' ) ) {
	function gbt_18_bs_render_frontend_posts_grid( $attributes ) {

		extract( shortcode_atts( array(
			'number'				=> '12',
			'categoriesSavedIDs'	=> '',
			'align'					=> 'center',
			'orderby'				=> 'date_desc',
			'columns'				=> '3',
			'coverImage'			=> true,
			'coverImageSize'		=> 'landscape'
		), $attributes ) );

		$args = array(
	        'post_status' 		=> 'publish',
	        'post_type' 		=> 'post',
	        'posts_per_page' 	=> $number
	    );

	    switch ( $orderby ) {
	    	case 'date_asc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'asc';
				break;
			case 'date_desc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'desc';
				break;
			case 'title_asc' :
				$args['orderby'] = 'title';
				$args['order']	 = 'asc';
				break;
			case 'title_desc':
				$args['orderby'] = 'title';
				$args['order']	 = 'desc';
				break;
			default: break;
		}

	    if( substr($categoriesSavedIDs, - 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 0, -1);
		}

		if( substr($categoriesSavedIDs, 0, 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 1);
		}

	    if( $categoriesSavedIDs != '' ) $args['category'] = $categoriesSavedIDs;
	    
	    $recentPosts = get_posts( $args );

		ob_start();
		        
	    if ( !empty($recentPosts) ) : ?>
        <div class="gbt_18_bs_posts_grid align<?php echo $align; ?> <?php if ($coverImage==true) echo 'cover-' . $coverImageSize; ?>">
        	<div class="gbt_18_bs_posts_grid_wrapper columns-<?php echo $columns; ?>">
        		<?php foreach($recentPosts as $post) : ?><?php $post_format = get_post_format($post->ID); ?>
    			<div class="gbt_18_bs_posts_grid_item <?php echo $post_format ? $post_format: 'standard'; ?> <?php if ( !has_post_thumbnail($post->ID)) : ?>no_thumb<?php endif; ?>">
    				<div class="gbt_18_post_image"><a class="gbt_18_bs_posts_grid_item_link" href="<?php echo get_post_permalink($post->ID); ?>"><?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail');?></a>
					</div>
					<div class="gbt_18_posts_categories"><?php the_category(' ','',$post->ID); ?></div>
					<h2 class="gbt_18_bs_posts_grid_title"><a href="<?php echo get_post_permalink($post->ID); ?>" class="gbt_18_title_link"><?php echo $post->post_title; ?></a></h2>
					<div class="gbt_18_bs_post_excerpt"><p><?php echo get_the_excerpt( $post->ID );?></p></div>
					<div class="gbt_18_bs_read_more"><a class="gbt_18_bs_read_more" href="<?php echo get_post_permalink($post->ID); ?>"><?php _e("Read More", "block-shop"); ?></a></div>
				</div>
				<?php endforeach; // end of the loop. ?>
 			</div>
 		</div>
		<?php
		endif;
		wp_reset_query();
		return ob_get_clean();
	}
}