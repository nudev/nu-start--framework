<?php


// add/remove block categories
add_filter( 'block_categories_all', 'nu__manage_block_categories', 10, 2 );
if( !function_exists('nu__manage_block_categories') ){
	function nu__manage_block_categories( $block_categories, $block_editor_context  ) {
	
		// create the nu-blocks category
		return array_merge(
			$block_categories,
			array(
				array(
					'slug' => 'nu-blocks',
					'title' => __( 'NU Blocks', 'nu-start' ),
					'icon'  => 'f131',
				)
			)
		);
	}
}



?>