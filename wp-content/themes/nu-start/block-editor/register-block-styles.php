<?php 
/**
 * 
 */
// 

add_action( 'init', 'nu__register_block_styles' );
if( !function_exists( 'nu__register_block_styles' ) ){
	function nu__register_block_styles(){

		register_block_style(
			'eedee/block-gutenslider',
			array(
				'name'         => 'alternate',
				'label'        => __( 'Alternate', 'nu-start' ),
			)
		);



		register_block_style(
			'ep/tabs',
			array(
				'name'         => 'underlined',
				'label'        => __( 'Underlined', 'nu-start' ),
			)
		);
		register_block_style(
			'ep/tabs',
			array(
				'name'         => 'floating',
				'label'        => __( 'Floating', 'nu-start' ),
			)
		);
		register_block_style(
			'ep/tabs',
			array(
				'name'         	=> 'bordered',
				'label'        	=> __( 'Bordered', 'nu-start' ),
				'is_default'	=> true
			)
		);


		register_block_style(
			'core/paragraph',
			array(
				'name'         => 'links-have-arrows',
				'label'        => __( 'Links have arrows', 'nu-start' ),
			)
		);

		register_block_style(
			'core/post-title',
			array(
				'name'         => 'display',
				'label'        => __( 'Display', 'nu-start' ),
			)
		);

		register_block_style(
			'core/heading',
			array(
				'name'         => 'display',
				'label'        => __( 'Display', 'nu-start' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'         => 'card',
				'label'        => __( 'Card', 'nu-start' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'         => 'playhead',
				'label'        => __( 'Playhead', 'nu-start' ),
			)
		);

		// 
		register_block_style(
			'core/group',
			array(
				'name'         => 'card-outlined',
				'label'        => __( 'Outlined Card', 'nu-start' ),
			)
		);
		// 
		register_block_style(
			'core/columns',
			array(
				'name'         => 'justify-space-between',
				'label'        => __( 'Space Between', 'nu-start' ),
			)
		);

	}
}



// 
?>