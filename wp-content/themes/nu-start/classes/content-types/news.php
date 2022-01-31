<?php
/**
 *
 *
 */
//
NU__ContentTypes::_register_custom_post_type(
	$literal = 'news',
	$name = 'News',
	$singular = 'News Item',
	$rewrite = 'news',
	$hierarchical = false,
	$dashicon = 'dashicons-format-status'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'news-categories',
	$post_type = 'news',
	$name = 'News Categories',
	$singular = 'News Category',
	$rewrite = 'News Categories'
);
NU__ContentTypes::_register_custom_taxonomy(
	$literal = 'news-tags',
	$post_type = 'news',
	$name = 'News Tags',
	$singular = 'News Tag',
	$hierarchical = false
);


$reusableHero = new  WP_Query([
	'post_type' => 'wp_block',
	'title' 	=> 'Hero: All News Items'
]);

if( !empty( $reusableHero->posts ) ){

	$post_type_object = get_post_type_object( 'nu_news' );

	/**
	 * 		using array() for each block; and using [] for attr and innerblocks
	 * 		i.e., if you see array() that is the start of a new block / innerblock
	 * 				if you see [] that is attrs or should break to a new line of blocks
	 *
	 */
	$post_type_object->template = array(
		array( 'acf/nu-news', [ 'align' => 'full' ], [
			array( 'core/block', [ 'ref' => $reusableHero->posts[0]->ID ] ),
			array( 'core/paragraph', [ 'placeholder' => 'Insert a pattern here?' ] ),
		]),
	);

	$post_type_object->template_lock = '';
	$post_type_object->templateInsertUpdatesSelection = 'true';

}



?>
