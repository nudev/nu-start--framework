<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'people',
	$name = 'People',
	$singular = 'Person',
	$rewrite = 'people',
	$hierarchical = false, 
	$dashicon = 'dashicons-groups'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'people-categories',
	$post_type = 'people',
	$name = 'People Categories',
	$singular = 'People Category',
	$rewrite = 'People Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'people-tags',
	$post_type = 'people',
	$name = 'People Tags',
	$singular = 'People Tag',
	$hierarchical = false
);

NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'people-type',
	$post_type = 'people',
	$name = 'People Types',
	$singular = 'Person Type',
	$hierarchical = false
);


$reusableHero = new  WP_Query([
	'post_type' => 'wp_block',
	'title' 	=> 'Hero: All People Items'
]);


// if( !empty( $reusableHero->posts ) ){
	
	$post_type_object = get_post_type_object( 'nu_people' );
	/**
	 * 		using array() for each block; and using [] for attr and innerblocks
	 * 		i.e., if you see array() that is the start of a new block / innerblock
	 * 				if you see [] that is attrs or should break to a new line of blocks
	 * 
	 */
	// $post_type_object->template = array(
	// 	array( 'acf/nu-person', [ 'align' => 'full' ], [
	// 		array( 'core/block', [ 'ref' => $reusableHero->posts[0]->ID ] ),
	// 		array( 'core/paragraph', [ 'placeholder' => 'Insert a pattern here?' ] ),
	// 	]),
	// );
	$post_type_object->template = array(
		array( 'core/paragraph', [ 'placeholder' => 'Insert a pattern here? PLEASE WORK KIM!!! PLEASE!!!' ] ),
	);
	
	$post_type_object->template_lock = '';
	$post_type_object->templateInsertUpdatesSelection = 'true';
	
// }


?>