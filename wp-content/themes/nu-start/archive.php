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

echo 'TBD - Archive Pages are Broken :(';

echo '</div>';

get_footer(); // ?	close </main>


// 
?>