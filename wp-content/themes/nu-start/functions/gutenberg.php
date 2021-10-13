<?php
/* 

*/


include_once( get_template_directory() . '/block-editor/add-reusable-blocks-to-menu.php' );
include_once( get_template_directory() . '/block-editor/add-remove-block-categories.php' );
include_once( get_template_directory() . '/block-patterns/register-pattern-categories.php' );
include_once( get_template_directory() . '/block-patterns/register-block-patterns.php' );
include_once( get_template_directory() . '/acf-blocks/register-acf-blocks.php' );
include_once( get_template_directory() . '/block-styles/register-block-styles.php' );


/**
 * 		this function is registered as the enqueue_assets callback for the carousel block
 */
if( !function_exists('nu__enqueueCarouselAssets') ){
	function nu__enqueueCarouselAssets(){
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick-theme-min.css' );
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick.css' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/acf-blocks/carousel/lib/slick.js', array('jquery'), '', true );
		wp_enqueue_script( 'carousel-editor', get_template_directory_uri() . '/acf-blocks/carousel/carousel-editor-min.js', array('jquery'), '', true );
	}
}

// 
?>