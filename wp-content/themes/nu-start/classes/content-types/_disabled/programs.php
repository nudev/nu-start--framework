<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'programs',
	$name = 'Programs',
	$singular = 'Program',
	$rewrite = '',
	$hierarchical = false, 
	$dashicon = 'dashicons-clipboard'
);


NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'programs-subjects',
	$post_type = 'programs',
	$name = 'Programs Subjects',
	$singular = 'Program Subject',
	$rewrite = 'Programs Subjects'
);


// NU__ContentTypes::_register_custom_taxonomy(
// 	$literal = 'programs-tags',
// 	$post_type = 'programs',
// 	$name = 'Programs Tags',
// 	$singular = 'Program Tag',
// 	$hierarchical = false
// );


?>