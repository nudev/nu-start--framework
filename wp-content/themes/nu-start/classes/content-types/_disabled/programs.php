<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'programs',
	$name = 'Partner Programs',
	$singular = 'Partner Program',
	$rewrite = '',
	$hierarchical = false, 
	$dashicon = 'dashicons-bank'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'programs-categories',
	$post_type = 'programs',
	$name = 'Partner Programs Categories',
	$singular = 'Partner Program Category',
	$rewrite = 'Partner Programs Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'programs-tags',
	$post_type = 'programs',
	$name = 'Partner Programs Tags',
	$singular = 'Partner Program Tag',
	$hierarchical = false
);


?>