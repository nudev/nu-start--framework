<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'partnerships',
	$name = 'Partnerships',
	$singular = 'Partnership Item',
	$rewrite = '',
	$hierarchical = false, 
	$dashicon = 'dashicons-bank'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'partnerships-categories',
	$post_type = 'partnerships',
	$name = 'Partnership Item Categories',
	$singular = 'Partnership Item Category',
	$rewrite = 'Partnership Item Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'partnerships-tags',
	$post_type = 'partnerships',
	$name = 'Partnership Item Tags',
	$singular = 'Partnership Item Tag',
	$hierarchical = false
);


?>