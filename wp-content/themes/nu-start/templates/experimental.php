<?php
/**
 * 	Template Name: Experimental
 */
//  


// * the pattern is the pattern
$guides = [];
$return = '';


get_header(); // ?	open <main>

if( is_active_sidebar( 'alerts-sitewide' ) ){
	dynamic_sidebar( 'alerts-sitewide' );
}
echo '<div class="blocks--wrapper experimental-sidebar-layout">';

	echo '<div class="is-the-sidebar-area">';
		echo has_nav_menu('sidebar_menu_1') ? '<div class="sidebar_menu_1">'.nu__getMenu('sidebar_menu_1').'</div>' : '';
	echo '</div>';
	
	echo '<div class="is-the-content-area">';
		the_content();
	echo '</div>';
	
echo '</div>';

get_footer(); // ?	close </main>



//  
//  
?>