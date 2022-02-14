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
add_action( 'wp_enqueue_scripts', 'nu__enqueue_each_block_styles' );
// Add editor styles.
add_action( 'admin_init', 'nu__enqueue_each_block_styles' );


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

		register_block_style(
			'eedee/block-gutenslider',
			array(
				'name'         => 'alternate',
				'label'        => __( 'Alternate', 'nu-start' ),
			)
		);



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

		// 
		register_block_style(
			'core/group',
			array(
				'name'         => 'card-outlined',
				'label'        => __( 'Outlined Card', 'nu-start' ),
			)
		);


		
		// 
		// register_block_style(
		// 	'core/columns',
		// 	array(
		// 		'name'         => 'justify-space-between',
		// 		'label'        => __( 'Space Between', 'nu-start' ),
		// 	)
		// );

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
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/breadcrumbs/breadcrumbs.css',
		// 'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/breadcrumbs/breadcrumbs-min.js',
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
		'name' => 'nu--content-query',
		'title' => 'Content Query',
		'description' => 'Query the DB for items of a content type; with related functionality like filtering and pagination.',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/content-query/content-query.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/content-query/content-query.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/content-query/content-query-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'mode' => false,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => true,
		),
		'active' => true,
	));

	acf_register_block_type(array(
		'name' => 'nu--content-query-item',
		'title' => 'Content Query Item',
		'description' => 'Wrapper for the item template returned by the Content Query',
		'category' => 'nu-blocks',
		'parent' => ['nu--content-query'],
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/content-query-item/content-query-item.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri(  ) . '/acf-blocks/content-query-item/content-query-item.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/content-query-item/content-query-item-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'mode' => false,
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

	
endif;


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