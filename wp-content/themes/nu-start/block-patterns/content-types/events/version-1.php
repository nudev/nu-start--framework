<?php

	/**
	 * title (required): A human-readable title for the pattern.
	 * content (required): Block HTML Markup for the pattern.
	 * description (optional): A visually hidden text used to describe the pattern in the inserter. A description is optional but it is strongly encouraged when the title does not fully describe what the pattern does. The description will help users discover the pattern while searching.
	 * categories (optional): An array of registered pattern categories used to group block patterns. Block patterns can be shown on multiple categories. A category must be registered separately in order to be used here.
	 * keywords (optional): An array of aliases or keywords that help users discover the pattern while searching.
	 * viewportWidth (optional): An integer specifying the intended width of the pattern to allow for a scaled preview of the pattern in the inserter.
	 */
	register_block_pattern(
		'nu-blocks/event-templates/version-1',
		array(
			'title'       => 'Event Item --- Version 1',
			'description' => 'Lorem description ipsum',
			'categories'  => ['event-templates'],
			'keywords'  => ['event', 'event-item', 'item', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"event-content-container","layout":{"inherit":true}} -->
				<div class="wp-block-group alignfull event-content-container"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading -->
				<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:group {"className":"event-item-sidebar is-style-card"} -->
				<div class="wp-block-group event-item-sidebar is-style-card"><!-- wp:acf/nu-datetime-range {"id":"block_61158737ef488","name":"acf/nu-datetime-range","data":{"start_date":"","_start_date":"field_6107e7ce62726","start_time":"","_start_time":"field_6107e80662728","end_date":"","_end_date":"field_6107e7ff62727","end_time":"","_end_time":"field_6107e81b62729","datetime_range":"","_datetime_range":"field_611587cf9d174"},"align":"","mode":"preview","wpClassName":"wp-block-acf-nu-datetime-range"} /-->
				
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button {"width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link">Book</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Placeholder for <strong><em>"Content Type Prev/Next/Back"</em></strong> Block</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>