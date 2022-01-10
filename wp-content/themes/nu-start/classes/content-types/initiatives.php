<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'initiatives',
	$name = 'Initiatives',
	$singular = 'Initiatives Item',
	$rewrite = 'initiatives',
	$hierarchical = false, 
	$dashicon = 'dashicons-smiley'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-categories',
	$post_type = 'initiatives',
	$name = 'Initiatives Categories',
	$singular = 'Initiatives Category',
	$rewrite = 'Initiatives Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-tags',
	$post_type = 'initiatives',
	$name = 'Initiatives Tags',
	$singular = 'Initiatives Tag',
	$hierarchical = false
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'initiatives-schools',
	$post_type = 'initiatives',
	$name = 'Initiatives Schools',
	$singular = 'Initiatives School',
	$hierarchical = false
);

?>