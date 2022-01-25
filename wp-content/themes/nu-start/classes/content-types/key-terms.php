<?php
/**
 * 
 * 
 */
// 

NU__ContentTypes::_register_custom_post_type(
	$literal = 'key-terms',
	$name = 'Key Terms',
	$singular = 'Key Term',
	$rewrite = 'key-terms',
	$hierarchical = false, 
	$dashicon = 'dashicons-smiley'
);

NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'key-terms-tags',
	$post_type = 'key-terms',
	$name = 'Key Terms Tags',
	$singular = 'Key Terms Tag',
	$hierarchical = false
);


?>