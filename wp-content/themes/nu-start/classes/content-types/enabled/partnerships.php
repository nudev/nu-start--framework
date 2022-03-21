<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'partnerships',
	$name = 'Partnerships',
	$singular = 'Partnership',
	$rewrite = '',
	$hierarchical = false, 
	$dashicon = 'dashicons-portfolio'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'partnerships-categories',
	$post_type = 'partnerships',
	$name = 'Partnership Categories',
	$singular = 'Partnership Category',
	$rewrite = 'Partnership Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'partnerships-tags',
	$post_type = 'partnerships',
	$name = 'Partnership Tags',
	$singular = 'Partnership Tag',
	$hierarchical = false
);


?>