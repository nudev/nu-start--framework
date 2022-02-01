<?php
/**
 * 		? a sample registration ( real )
 * 
 */
// 

// ? register the post type itself (note, the class loader will prefix $literal with "nu_".$literal )
NU__ContentTypes::_register_custom_post_type(
	$literal = 'initiatives',
	$name = 'Initiatives',
	$singular = 'Initiatives Item',
	$rewrite = 'initiatives',
	$hierarchical = false, 
	$dashicon = 'dashicons-smiley'
);

// ? register a custom category taxonomy for this post type to avoid mixing
// ? copy this to add new taxonomies that are categories (hierarchical is true)
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-categories',
	$post_type = 'initiatives',
	$name = 'Initiatives Categories',
	$singular = 'Initiatives Category',
	$rewrite = 'Initiatives Categories'
);

// ? register a custom tags taxonomy for this post type to avoid mixing
// ? copy this to add new taxonomies that are tags (hierarchical is false)
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-tags',
	$post_type = 'initiatives',
	$name = 'Initiatives Tags',
	$singular = 'Initiatives Tag',
	$hierarchical = false
);



// ? further extend this post type with additional custom taxonomies
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-schools',
	$post_type = 'initiatives',
	$name = 'Initiatives Schools',
	$singular = 'Initiatives School',
	$hierarchical = false
);

?>