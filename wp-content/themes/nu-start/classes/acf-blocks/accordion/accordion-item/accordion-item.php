<?php
/**
 * 
 */
// 

if( function_exists('acf_register_block_type') ):
	acf_register_block_type(array(
		'name' => 'accordion-item',
		'title' => 'Accordion Item',
		'description' => '',
		'category' => 'nu-blocks',
		'keywords' => array(
		),
		'post_types' => array(
		),
		'mode' => 'preview',
		'align' => '',
		'align_content' => NULL,
		'render_template' => get_template_directory(  ) . '/acf-blocks/accordion/accordion-item/accordion-item.php',
		'render_callback' => '',
		'enqueue_style' => get_template_directory_uri() . '/acf-blocks/accordion/accordion-item/accordion.css',
		'enqueue_script' => get_template_directory_uri(  ) . '/acf-blocks/accordion/accordion-item/accordion-min.js',
		'enqueue_assets' => '',
		'icon' => '',
		'supports' => array(
			'align' => true,
			'mode' => true,
			'multiple' => true,
			'jsx' => true,
			'align_content' => false,
			'anchor' => false,
			'inserter' => false,
		),
		'active' => true,
		'parent' => ['acf/accordion'],
	));
endif;



// 
?>