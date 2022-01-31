<?php
/**
 * 
 */
// 

// * the pattern is the pattern
$guides = [];
$return = '';


get_header(); // ?	open <main>

if( is_active_sidebar( 'alerts-sitewide' ) ){
	dynamic_sidebar( 'alerts-sitewide' );
}
echo '<div class="blocks--wrapper">';
the_content();
echo '</div>';


// $parsed_blocks = parse_blocks( get_the_content() );
// error_log(print_r($parsed_blocks, true));



get_footer(); // ?	close </main>


// 
?>