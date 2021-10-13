<?php

NU__ContentTypes::_register_custom_post_type(
	$literal = 'locations',
	$name = 'Locations',
	$singular = 'Location',
	$rewrite = 'tour',
	$hierarchical = false, 
	$dashicon = 'dashicons-admin-post'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'locations-categories',
	$post_type = 'locations',
	$name = 'Locations Categories',
	$singular = 'Location Category',
	$rewrite = 'for-guests'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'locations-tags',
	$post_type = 'locations',
	$name = 'Locations Tags',
	$singular = 'Location Tag',
	$hierarchical = false
);

?>