<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'faces',
	$name = 'Faces',
	$singular = 'Faces Item',
	$rewrite = 'faces',
	$hierarchical = false, 
	$dashicon = 'dashicons-groups'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'faces-categories',
	$post_type = 'faces',
	$name = 'Faces Categories',
	$singular = 'Faces Category',
	$rewrite = 'Faces Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'faces-tags',
	$post_type = 'faces',
	$name = 'Faces Tags',
	$singular = 'Faces Tag',
	$hierarchical = false
);

NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'faces-type',
	$post_type = 'faces',
	$name = 'Faces Types',
	$singular = 'Faces Item Type',
	$hierarchical = false
);


$reusableHero = new  WP_Query([
	'post_type' => 'wp_block',
	'title' 	=> 'Hero: All Faces Items'
]);


if( !empty( $reusableHero->posts ) ){
	
	$post_type_object = get_post_type_object( 'nu_faces' );
	/**
	 * 		using array() for each block; and using [] for attr and innerblocks
	 * 		i.e., if you see array() that is the start of a new block / innerblock
	 * 				if you see [] that is attrs or should break to a new line of blocks
	 * 
	 */
	$post_type_object->template = array(
		array( 'acf/nu-faces-item', [ 'align' => 'full' ], [
			array( 'core/block', [ 'ref' => $reusableHero->posts[0]->ID ] ),
			array( 'core/paragraph', [ 'placeholder' => 'Insert a pattern here?' ] ),
		]),
	);
	
	$post_type_object->template_lock = '';
	$post_type_object->templateInsertUpdatesSelection = 'true';
	
}


?>