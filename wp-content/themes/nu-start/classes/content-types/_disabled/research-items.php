<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'research-items',
	$name = 'Research Items',
	$singular = 'Research Items Item',
	$rewrite = 'research-items',
	$hierarchical = false, 
	$dashicon = 'dashicons-index-card'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'research-items-categories',
	$post_type = 'research-items',
	$name = 'Research Items Categories',
	$singular = 'Research Items Category',
	$rewrite = 'Research Items Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'research-items-tags',
	$post_type = 'research-items',
	$name = 'Research Items Tags',
	$singular = 'Research Items Tag',
	$hierarchical = false
);

?>