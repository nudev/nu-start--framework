<?php
/**
 * 
 */
// 

if( function_exists('acf_register_block_type') ):

	acf_register_block_type(array(
		'name' => 'accordion',
		'title' => 'Accordion',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/accordion/accordion.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri() . '/acf-blocks/accordion/accordion.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/accordion/accordion-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => true,
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => false,
		),
		'active' => true,
	));
	
endif;





// 
?>