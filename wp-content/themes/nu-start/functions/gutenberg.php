<?php
/**
 * 
 */
// 
add_action( 'init', 'remove_vendor_blocks_and_patterns' );
if( !function_exists( 'remove_vendor_blocks_and_patterns' ) ){
	function remove_vendor_blocks_and_patterns(){

		if (!function_exists('unregister_block_pattern')) {
			return;
		}

		// ? below is to help debugging
		// $reg = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
		// error_log(print_r($reg,true));
		// ? above is to help with debugging


		unregister_block_pattern('gutenslider/pattern-testimonial-slider');
	
	}
}

add_action( 'init', 'nu__register_block_styles' );
if( !function_exists( 'nu__register_block_styles' ) ){
	function nu__register_block_styles(){
	
		// ? custom styles for Gutenslider block --- vendor plugin
		register_block_style(
			'eedee/block-gutenslider',
			array(
				'name'         => 'alternate',
				'label'        => __( 'Alternate', 'nu-start' ),
			)
		);
		// ? custom styles for the EP tabs block --- vendor plugin
		register_block_style(
			'ep/tabs',
			array(
				'name'         => 'underlined',
				'label'        => __( 'Underlined', 'nu-start' ),
			)
		);
		register_block_style(
			'ep/tabs',
			array(
				'name'         => 'floating',
				'label'        => __( 'Floating', 'nu-start' ),
			)
		);
		register_block_style(
			'ep/tabs',
			array(
				'name'         	=> 'bordered',
				'label'        	=> __( 'Bordered', 'nu-start' ),
				'is_default'	=> true
			)
		);
	}
}



/**
 * 
 * 
 * ?		register all our ACF Blocks
 * 
 */
if( function_exists('acf_register_block_type') ):


	$supports = [
		'anchor' => true,
		'align' => array( 'left', 'center', 'right', 'wide', 'full' ),
		'mode' => false,
		'jsx' => true,
		// 'align' => false,
		// 'align_text' => true,
		// 'align_content' => true,
		// 'align_content' => matrix,
		// 'full_height' => true,
		// 'multiple' => false,
	];
	

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
		'icon' => '',
		'supports' => $supports,
	));
	

	acf_register_block_type(array(
		'name' => 'posts-grid',
		'title' => 'Posts Grid',
		'description' => '',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/posts-grid/posts-grid.php',
		'icon' => '',
		'supports' => $supports,
	));
	
	

	acf_register_block_type(array(
		'name' => 'person-info',
		'title' => 'Person Info',
		'description' => 'Fetch and display info for a Person.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/person-info/person-info.php',
		'icon' => '',
		'supports' => $supports,
	));

	
	
	acf_register_block_type(array(
		'name' => 'event-info',
		'title' => 'Event Info',
		'description' => 'Fetch and display info for an Event.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/event-info/event-info.php',
		'icon' => '',
		'supports' => $supports,
	));

	acf_register_block_type(array(
		'name' => 'news-info',
		'title' => 'News Info',
		'description' => 'Fetch and display info for a News Item.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/news-info/news-info.php',
		'icon' => '',
		'post_types' => ['nu_news'],
		'supports' => $supports,
	));

	
	acf_register_block_type(array(
		'name' => 'beta-rest-api',
		'title' => '(beta) REST API',
		'description' => 'Discover how to integrate REST with Block Editor',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/beta-rest-api/beta-rest-api.php',
		'icon' => '',
		'supports' => $supports,
	));

	acf_register_block_type(array(
		'name' => 'tabbed-content',
		'title' => 'Tabs',
		'description' => 'Tabs container.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/tabbed-content/tabbed-content.php',
		'icon' => '',
		'supports' => $supports,
		'enqueue_script' => get_template_directory_uri() . '/__precomp/build/js/blocks/tabbed-content-min.js',
	));
	acf_register_block_type(array(
		'name' => 'tabbed-content-item',
		'title' => 'Tabs Tab',
		'description' => 'Tabs Tab!',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/tabbed-content/tabbed-content-item/tabbed-content-item.php',
		'parent' => ['tabbed-content'],
		'icon' => '',
		'supports' => $supports,
	));


	acf_register_block_type(array(
		'name' => 'content-query',
		'title' => 'Content Query',
		'description' => 'Query for and display your sites content.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/content-query/content-query.php',
		'icon' => '',
		'supports' => $supports,
	));

	$supports['multiple'] = false;
	// 
	acf_register_block_type(array(
		'name' => 'content-query-filter',
		'title' => 'Content Query Filter',
		'description' => 'Content query filter description',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/content-query/filter/filter.php',
		'parent' => ['content-query'],
		'icon' => '',
		'supports' => $supports,
	));

	// 
	acf_register_block_type(array(
		'name' => 'content-query-showmore',
		'title' => 'Content Query Show More',
		'description' => 'Content query showmore description',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/content-query/showmore/showmore.php',
		'parent' => ['content-query'],
		'icon' => '',
		'supports' => $supports,
	));

	$supports['multiple'] = true;
	
	/**
	 * 
	 */
	acf_register_block_type(array(
		'name' => 'nu-datetime-range',
		'title' => 'Date and Time Range',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/datetime-range/datetime-range.php',
		'icon' => '',
		'supports' => $supports,
	));
	



	/**
	 * deprecated legacy code for refactoring
	 */
	acf_register_block_type(array(
		'name' => 'nu-program',
		'title' => 'Program',
		'description' => 'legacy code do not use',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
			'nu_programs',
		),
		'mode' => 'preview',
		'render_template' => get_template_directory(  ) . '/acf-blocks/programs/program.php',
		'icon' => '',
		'supports' => $supports,
	));

	
endif;


// 
?>