<?php
/**
 * 
 */
// 

if( function_exists('acf_register_block_type') ):

	acf_register_block_type(array(
		'name' => 'nu-program',
		'title' => 'Program',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			'nu_programs',
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/programs/program.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/programs/program.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/programs/program-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'left',
				'right',
				'center',
				'wide',
				'full',
			),
			'mode' => true,
			'multiple' => false,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));

	acf_register_block_type(array(
		'name' => 'carousel',
		'title' => 'Carousel',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => 'full',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/carousel/carousel.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/carousel/carousel.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/carousel/carousel-min.js',
		'enqueue_assets' => 'nu__enqueueCarouselAssets',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'left',
				'center',
				'right',
				'wide',
				'full',
			),
			'mode' => true,
			'multiple' => true,
			'jsx' => false,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));
	

	acf_register_block_type(array(
		'name' => 'posts-grid',
		'title' => 'Posts Grid',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'edit',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/posts-grid/posts-grid.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/posts-grid/posts-grid.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/posts-grid/posts-grid-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));
	
	acf_register_block_type(array(
		'name' => 'nu-datetime-range',
		'title' => 'Date and Time Range',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory().'/acf-blocks/datetime-range/datetime-range.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/datetime-range/datetime-range.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/datetime-range/datetime-range-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'left',
				'center',
				'right',
				'wide',
				'full',
			),
			'mode' => true,
			'multiple' => true,
			'jsx' => false,
			'align_content' => false,
			'anchor' => false,
		),
		'active' => true,
	));
	

	
endif;


// 
?>