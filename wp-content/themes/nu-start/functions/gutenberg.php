<?php
/**
 * 
 */
// 

// add_action( 'after_setup_theme', function() {
// 	// Same args used for wp_enqueue_style().
// 	$args = array(
// 			'handle' => 'my-theme-site-title',
// 			'src'    => get_theme_file_uri( 'assets/blocks/site-title.css' ),
// 	);

// 	// Add "path" to allow inlining asset if the theme opts-in.
// 	$args['path'] = get_theme_file_path( 'assets/blocks/site-title.css' );

// 	// Enqueue asset.
// 	wp_enqueue_block_style( 'core/site-title', $args );
// } );



// Add frontend styles.
// add_action( 'wp_enqueue_scripts', 'nu__enqueue_each_block_styles' );
// Add editor styles.
// add_action( 'admin_init', 'nu__enqueue_each_block_styles' );


/**
 * Attach extra styles to multiple blocks.
 */
function nu__enqueue_each_block_styles() {
	// An array of blocks.
	$styled_blocks = [ 'button', 'column', 'cover', 'group', 'mediatext', 'navigation', 'paragraph', 'pullquote', 'separator', 'table' ];

	foreach ( $styled_blocks as $block_name ) {
		// Get the stylesheet handle. This is backwards-compatible and checks the
		// availability of the `wp_should_load_separate_core_block_assets` function,
		// and whether we want to load separate styles per-block or not.
		$handle = (
			function_exists( 'wp_should_load_separate_core_block_assets' ) &&
			wp_should_load_separate_core_block_assets()
		) ? "wp-block-$block_name" : 'wp-block-library';

		// Get the styles.
		$styles = file_get_contents( get_theme_file_path( "__precomp/build/css/blocks/$block_name.css" ) );

		// Add frontend styles.
		wp_add_inline_style( $handle, $styles );

		// Add editor styles.
		add_editor_style( "__precomp/build/css/blocks/$block_name.css" );
		if ( file_exists( get_theme_file_path( "__precomp/build/css/blocks/$block_name-editor.css" ) ) ) {
			add_editor_style( "__precomp/build/css/blocks/$block_name-editor.css" );
		}
	}
}




// add reusable blocks to the main menu
add_action( 'admin_menu', 'nu__reusable_blocks_in_admin_menu' );
if( !function_exists('nu__reusable_blocks_in_admin_menu') ){
	function nu__reusable_blocks_in_admin_menu() {
	
		add_menu_page(
			'Reusable Blocks',
			'Reusable Blocks',
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-editor-table',
			'3.1'
		);
	
	}
}




// add/remove block categories
add_filter( 'block_categories_all', 'nu__manage_block_categories', 10, 2 );
if( !function_exists('nu__manage_block_categories') ){
	function nu__manage_block_categories( $block_categories, $block_editor_context  ) {

		// create the nu-blocks category
		return array_merge(
			$block_categories,
			array(
				array(
					'slug' => 'nu-blocks',
					'title' => __( 'NU Blocks', 'nu-start' ),
					'icon'  => 'f131',
				)
			)
		);
	}
}












add_action( 'init', 'nu__register_block_styles' );
if( !function_exists( 'nu__register_block_styles' ) ){
	function nu__register_block_styles(){

		// register our styles onto Gutenslider block
		register_block_style(
			'eedee/block-gutenslider',
			array(
				'name'         => 'alternate',
				'label'        => __( 'Alternate', 'nu-start' ),
			)
		);


		// register our styles onto the EP tabs block
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