<?php
/**
 * 
 */
// 




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


		register_block_style(
			'core/paragraph',
			array(
				'name'         => 'links-have-arrows',
				'label'        => __( 'Links have arrows', 'nu-start' ),
			)
		);

		register_block_style(
			'core/post-title',
			array(
				'name'         => 'display',
				'label'        => __( 'Display', 'nu-start' ),
			)
		);

		register_block_style(
			'core/heading',
			array(
				'name'         => 'display',
				'label'        => __( 'Display', 'nu-start' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'         => 'card',
				'label'        => __( 'Card', 'nu-start' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'         => 'playhead',
				'label'        => __( 'Playhead', 'nu-start' ),
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
		register_block_style(
			'core/columns',
			array(
				'name'         => 'justify-space-between',
				'label'        => __( 'Space Between', 'nu-start' ),
			)
		);

	}
}


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