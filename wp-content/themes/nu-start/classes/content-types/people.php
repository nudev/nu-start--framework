<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'people',
	$name = 'People',
	$singular = 'Person',
	$rewrite = 'people',
	$hierarchical = false, 
	$dashicon = 'dashicons-groups'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'people-categories',
	$post_type = 'people',
	$name = 'Departments',
	$singular = 'Department',
	$rewrite = 'Departments'
);



?>