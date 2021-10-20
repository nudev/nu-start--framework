<?php
/**
 * 
 */
// 

if( function_exists('acf_register_block_type') ):

	acf_register_block_type(array(
		'name' => 'breadcrumbs',
		'title' => 'Breadcrumbs',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/breadcrumbs/breadcrumbs.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/breadcrumbs/breadcrumbs.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/breadcrumbs/breadcrumbs-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				0 => 'left',
				1 => 'center',
				2 => 'right',
				3 => 'wide',
				4 => 'full',
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
		'name' => 'nu-program',
		'title' => 'Program',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			0 => 'nu_programs',
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
				0 => 'left',
				1 => 'right',
				2 => 'center',
				3 => 'wide',
				4 => 'full',
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
		'name' => 'nav-menu',
		'title' => 'Nav Menu',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/nav-menu/nav-menu.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/nav-menu/nav-menu.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/nav-menu/nav-menu-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => true,
			'mode' => true,
			'multiple' => true,
			'jsx' => false,
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
				0 => 'left',
				1 => 'center',
				2 => 'right',
				3 => 'wide',
				4 => 'full',
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
				0 => 'left',
				1 => 'center',
				2 => 'right',
				3 => 'wide',
				4 => 'full',
			),
			'mode' => true,
			'multiple' => true,
			'jsx' => false,
			'align_content' => false,
			'anchor' => false,
		),
		'active' => true,
	));

	acf_register_block_type(array(
		'name' => 'nu-event',
		'title' => 'Event',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			0 => 'nu_events',
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/events/event.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/events/event.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/events/event-min.js',
		'enqueue_assets' => '',
		'icon' => 'event',
		'supports' => array(
			'align' => array(
				0 => 'left',
				1 => 'right',
				2 => 'center',
				3 => 'wide',
				4 => 'full',
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
		'name' => 'nu-news',
		'title' => 'News',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			0 => 'nu_news',
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/news/news.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/news/news.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/news/news-min.js',
		'enqueue_assets' => '',
		'icon' => 'news',
		'supports' => array(
			'align' => array(
				0 => 'left',
				1 => 'right',
				2 => 'center',
				3 => 'wide',
				4 => 'full',
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
		'name' => 'nu-person',
		'title' => 'Person',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			0 => 'nu_people',
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/people/person.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/people/person.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/people/person-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				0 => 'left',
				1 => 'right',
				2 => 'center',
				3 => 'wide',
				4 => 'full',
			),
			'mode' => true,
			'multiple' => false,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));
	
endif;


// 
?>