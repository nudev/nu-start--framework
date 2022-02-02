<?php
/**
 * 
 * 
 */
// 
NU__ContentTypes::_register_custom_post_type(
	$literal = 'events',
	$name = 'Events',
	$singular = 'Event',
	$rewrite = 'events',
	$hierarchical = false, 
	$dashicon = 'dashicons-calendar'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'events-categories',
	$post_type = 'events',
	$name = 'Events Categories',
	$singular = 'Events Category',
	$rewrite = 'Events Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'events-tags',
	$post_type = 'events',
	$name = 'Events Tags',
	$singular = 'Events Tag',
	$hierarchical = false
);



NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'events-topics',
	$post_type = 'events',
	$name = 'Events Topics',
	$singular = 'Events Topic',
	$rewrite = 'Events Topics'
);


NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'events-audiences',
	$post_type = 'events',
	$name = 'Events Audiences',
	$singular = 'Events Audience',
	$rewrite = 'Events Audiences'
);






$reusableHero = new  WP_Query([
	'post_type' => 'wp_block',
	'title' 	=> 'Hero: All Event Items'
]);

if( !empty( $reusableHero->posts ) ){
	
	$post_type_object = get_post_type_object( 'nu_events' );
	
	/**
	 * 		using array() for each block; and using [] for attr and innerblocks
	 * 		i.e., if you see array() that is the start of a new block / innerblock
	 * 				if you see [] that is attrs or should break to a new line of blocks
	 * 
	 */
	$post_type_object->template = array(
		array( 'core/block', [ 'ref' => $reusableHero->posts[0]->ID ] ),
		array( 'core/paragraph', [ 'placeholder' => 'Insert a pattern here?' ] ),
	);

	$post_type_object->template_lock = '';
	$post_type_object->templateInsertUpdatesSelection = 'true';
	
}



?>