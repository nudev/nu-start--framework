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


// NU__ContentTypes::_register_custom_taxonomy(
// 	$literal = 'profiles-research-center',
// 	$post_type = 'profiles',
// 	$name = 'Profiles Research Center',
// 	$singular = 'Profile Research Center',
// 	$hierarchical = false
// );
// NU__ContentTypes::_register_custom_taxonomy(
// 	$literal = 'profiles-academic-title',
// 	$post_type = 'profiles',
// 	$name = 'Profiles Academic Titles',
// 	$singular = 'Profile Academic Title',
// 	$hierarchical = false
// );


?>