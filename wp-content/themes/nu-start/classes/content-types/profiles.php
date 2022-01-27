<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'profiles',
	$name = 'Profiles',
	$singular = 'Profile',
	$rewrite = '',
	$hierarchical = false, 
	$dashicon = 'dashicons-index-card'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'profiles-categories',
	$post_type = 'profiles',
	$name = 'Profiles Categories',
	$singular = 'Profile Category',
	$rewrite = 'Profiles Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'profiles-tags',
	$post_type = 'profiles',
	$name = 'Profiles Tags',
	$singular = 'Profile Tag',
	$hierarchical = false
);


?>