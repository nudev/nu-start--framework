<?php

NU__ContentTypes::_register_custom_post_type(
	$literal = 'component-demos',
	$name = 'Component Demos',
	$singular = 'Component Demo',
	$rewrite = false,
	$hierarchical = false,
	$dashicon = 'dashicons-admin-post'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'component-demos-categories',
	$post_type = 'component-demos',
	$name = 'Component Demos Categories',
	$singular = 'Component Demo Category',
	$rewrite = false,
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'component-demos-tags',
	$post_type = 'component-demos',
	$name = 'Component Demos Tags',
	$singular = 'Component Demo Tag',
	$hierarchical = false
);

?>