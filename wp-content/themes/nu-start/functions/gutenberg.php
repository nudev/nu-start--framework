<?php
/**
 * 
 */
// 
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
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-breadcrumbs', get_template_directory_uri() . '/__precomp/build/css/blocks/breadcrumbs.css' );
		},
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
			'multiple' => false,
			'jsx' => true,
			'align_text' => true,
			// 'align_content' => true,
			'anchor' => true,
		),
	));
	

	acf_register_block_type(array(
		'name' => 'posts-grid',
		'title' => 'Posts Grid',
		'description' => '',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_callback' => '',
		'render_template' => get_template_directory().'/acf-blocks/posts-grid/posts-grid.php',
		// 'enqueue_style' => get_template_directory_uri().'/acf-blocks/posts-grid/posts-grid.css',
		// 'enqueue_script' => get_template_directory_uri().'/acf-blocks/posts-grid/posts-grid-min.js',
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-posts-grid', get_template_directory_uri() . '/__precomp/build/css/blocks/posts-grid.css' );
			wp_enqueue_script( 'block-posts-grid', get_template_directory_uri() . '/__precomp/build/js/blocks/posts-grid-min.js', array('jquery'), '', true );
		},
		'icon' => '',
		'supports' => array(
			'anchor' => true,
			// enable/disable alignment toolbar (true by default)
			'align' => true,
			// hide/show text alignment toolbar.
			'align_text' => true,
			// hide/show content alignment toolbar.
			'align_content' => false,
			// disable preview/edit toggle
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
		),
		'active' => true,
	));

	acf_register_block_type(array(
		'name' => 'person-info',
		'title' => 'Person Info',
		'description' => 'Fetch and display info for a Person.',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/person-info/person-info.php',
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-person-info', get_template_directory_uri() . '/__precomp/build/css/blocks/person-info.css' );
		},
		'icon' => '',
		'supports' => array(
			'anchor' => true,
			// enable/disable alignment toolbar (true by default)
			'align' => true,
			// hide/show text alignment toolbar.
			'align_text' => true,
			// hide/show content alignment toolbar.
			'align_content' => false,
			// disable preview/edit toggle
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
		),
		'active' => true,
	));



	
	acf_register_block_type(array(
		'name' => 'beta-rest-api',
		'title' => '(beta) REST API',
		'description' => 'Discover how to integrate REST with Block Editor',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/beta-rest-api/beta-rest-api.php',
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-beta-rest-api', get_template_directory_uri() . '/__precomp/build/css/blocks/beta-rest-api.css' );
		},
		'icon' => '',
		'supports' => array(
			'anchor' => true,
			// enable/disable alignment toolbar (true by default)
			'align' => true,
			// hide/show text alignment toolbar.
			'align_text' => true,
			// hide/show content alignment toolbar.
			'align_content' => false,
			// disable preview/edit toggle
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
		),
		'active' => true,
	));



	acf_register_block_type(array(
		'name' => 'beta-postsgrid-filtering',
		'title' => '(beta) PostsGrid Filtering Discrete Block',
		'description' => 'PostsGrid Filtering Discrete Block',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/beta-postsgrid-filtering/beta-postsgrid-filtering.php',
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-beta-postsgrid-filtering', get_template_directory_uri() . '/__precomp/build/css/blocks/beta-postsgrid-filtering.css' );
		},
		'parent' => 'posts-grid',
		'icon' => '',
		'supports' => array(
			'anchor' => true,
			// enable/disable alignment toolbar (true by default)
			'align' => true,
			// hide/show text alignment toolbar.
			'align_text' => true,
			// hide/show content alignment toolbar.
			'align_content' => false,
			// disable preview/edit toggle
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
		),
		'active' => true,
	));


	acf_register_block_type(array(
		'name' => 'beta-postsgrid-pagination',
		'title' => '(beta) PostsGrid Pagination Discrete Block',
		'description' => 'PostsGrid Pagination Discrete Block',
		'category' => 'nu-blocks',
		'mode' => 'preview',
		'render_template' => get_template_directory().'/acf-blocks/beta-postsgrid-pagination/beta-postsgrid-pagination.php',
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-beta-postsgrid-pagination', get_template_directory_uri() . '/__precomp/build/css/blocks/beta-postsgrid-pagination.css' );
		},
		'parent' => 'posts-grid',
		'icon' => '',
		'supports' => array(
			'anchor' => true,
			// enable/disable alignment toolbar (true by default)
			'align' => true,
			// hide/show text alignment toolbar.
			'align_text' => true,
			// hide/show content alignment toolbar.
			'align_content' => false,
			// disable preview/edit toggle
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
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
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-person-info', get_template_directory_uri() . '/__precomp/build/css/blocks/date-time.css' );
		},
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
		'enqueue_assets' => function(){
			// wp_enqueue_style( 'block-program-item', get_template_directory_uri() . '/__precomp/build/css/blocks/program-item.css' );
		},
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