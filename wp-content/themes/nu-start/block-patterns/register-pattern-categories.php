<?php


// ? register our block categories

add_action( 'init', 'nu__register_block_pattern_categories');

function nu__register_block_pattern_categories(){
		
	$nu_pattern_categories = [
		// 
		'nu-sites' => ['label' => __('NU Sites - Safekeeping', 'nu-start')],
		// 
		'dev-helpers' => ['label' => __('Dev Helpers', 'nu-start')],
		// 
		'design-helpers' => ['label' => __('Design Helpers', 'nu-start')],
		// 
		'heroes' => ['label' => __('Heroes', 'nu-start')],
		'partners' => ['label' => __('Partners', 'nu-start')],
		// 
		'showcase-content' => ['label' => __('Showcase Content', 'nu-start')],
		// 
		'featured-items' => ['label' => __('Features', 'nu-start')],
		'stat-highlights' => ['label' => __('Stat Highlights', 'nu-start')],
		'case-studies' => ['label' => __('Case Studies', 'nu-start')],
		'testimonials' => ['label' => __('Testimonials', 'nu-start')],
		// 
		'content-types' => ['label' => __('Content Types', 'nu-start')],
		'event-templates' => ['label' => __('Event Templates', 'nu-start')],
		'person-templates' => ['label' => __('Person Templates', 'nu-start')],
		// 
		'landing-pages' => ['label' => __('Landing Pages', 'nu-start')],
		'interior-pages' => ['label' => __('Interior Pages', 'nu-start')],
		'collection-pages' => ['label' => __('Collection Pages', 'nu-start')],

	];

	foreach( $nu_pattern_categories as $category_name => $category_properties ) {
		register_block_pattern_category( $category_name, $category_properties );
	}
	
}


?>