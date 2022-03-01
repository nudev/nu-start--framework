<?php
/**
 *
 */
//



/**
 * 	Return or echo a nav menu from a location or by id
 *
 * @param boolean $echo
 * @param [type] $location
 * @param [type] $menu
 * @return void
 */



 class Child_Wrap extends Walker_Nav_Menu {
     function start_lvl(&$output, $depth = 0, $args = array())
     {
         $indent = str_repeat("\t", $depth);
         $output .= "\n$indent<div class=\"mega-menu-col\"><ul class=\"sub-menu\">\n";
     }
     function end_lvl(&$output, $depth = 0, $args = array())
     {
         $indent = str_repeat("\t", $depth);
         $output .= "$indent</ul></div>\n";
     }
 }







function nu__getMenu($location = '', $echo = false, $menu = ''){

	// dynamically set args
	$args = array(
		// static $args:
		'container' => 'nav'                   // all nav menus use nav.navlinks pattern
		,'container_class' => 'navlinks'        // all nav menus use nav.navlinks pattern
		,'link_before' => '<span>'              // wrap link text in <span> for accentUnderlines
		,'link_after' => '</span>'              // wrap link text in <span> for accentUnderlines
		// dynamic $args:
		,'echo' => $echo
		,'theme_location' => $location
		,'menu' => $menu
		//, 'walker' => new Child_Wrap()

	);

	// return the menu call
	return wp_nav_menu($args);
}









function posts_orderby_lastname ($orderby_statement)
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
	return $orderby_statement;
}

function get_featured_tagstring($post){

	$post = get_post($post);


	$featuredTag = '';
	$catString = '';
	$tagString = '';

	if( $post->post_type == 'post' ){

		$theseCatsArray = get_the_terms( $post, 'category' );
		$theseTagsArray = get_the_terms( $post, 'post_tag' );

	} else {

		$theseCatsArray = get_the_terms( $post, $post->post_type . '-categories' );
		$theseTagsArray = get_the_terms( $post, $post->post_type . '-tags' );

	}



	if( !empty($theseCatsArray) && !is_wp_error( ($theseCatsArray) ) ){
		$diffOut = [];
		$theseCatsArray = array_diff(wp_list_pluck($theseCatsArray, 'name'), $diffOut);
		$catString = join(' - ', $theseCatsArray);
	}

	if( !empty($theseTagsArray) && !is_wp_error( ($theseTagsArray) ) ){
		$tagString = join(' - ', wp_list_pluck($theseTagsArray, 'name'));
	}

	if( !empty($catString) || !empty($tagString) ){
		$featuredTag = sprintf(
			'%1$s%2$s%3$s'
			,!empty($tagString) ? '<span class="tags">'.$tagString.'</span>' : ''
			,!empty($tagString) && !empty($catString) ? ' | ' : ''
			,!empty($catString) ? '<span class="cats">'.$catString.'</span>' : ''
		);
	}

	return '<p class="featured-tags has-smaller-font-size">'.$featuredTag.'</p>';
}



function nu__getGoogleMapAddress( $location ){


	if( $location && !empty($location['address'])) {

		$return = '';
		$guides['address'] = '
			<a href="https://maps.google.com/maps/search/'.$location['address'].'" title="opens location in google maps" target="_blank">%1$s%2$s%3$s%4$s%5$s%6$s</a>
		';

		$return .= sprintf(
			$guides['address']
			,!empty($location['street_number']) ? $location['street_number'] : ''
			,!empty($location['street_name']) ? ' '.trim($location['street_name']) : ''
			,!empty($location['city']) ? '<br />'.$location['city'] : ''
			,!empty($location['state']) ? ', '.$location['state'] : ''
			,!empty($location['post_code']) ? ' '.$location['post_code'] : ''
			// ,!empty($location['country']) ? '' : '' // ? this tends to be disabled but ill leave it here
			,'' // ? this is just kind of placeholding a nothing for the country code (may be needed)
		);

		return $return;
	}

}



/**
 *	get either a text or image logo for use in the header and/or footer
 *
 * @return string
 */
function nu__getLogo(){

	return !empty(NU__Starter::$themeSettings['header']['site_logo']) ? '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'" class="logo logo--image">'.NU__Starter::$themeSettings['header']['site_logo'].'</a>' : '<a href="'.site_url().'" title="Visit '.get_bloginfo('name').'" class="logo logo--text"><span>'.get_bloginfo('name').'</span></a>';

}





// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function nu__do_pagination(){
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'prev_text' => '<span><</span>',
		'next_text' => '<span>></span>',
		'before_page_number' => '<span>',
		'after_page_number' => '</span>',
	));
	wp_reset_postdata();
}



// ? this is a hacky solution to pagination not working for secondary loops and/or on the component-demo pages
add_action( 'template_redirect', function() {
    if ( is_singular( 'nu_component-demos' ) ) {
        global $wp_query;
        $page = ( int ) $wp_query->get( 'page' );
        if ( $page > 1 ) {
            // convert 'page' to 'paged'
            $wp_query->set( 'page', 1 );
            $wp_query->set( 'paged', $page );
        }
        // prevent redirect
        remove_action( 'template_redirect', 'redirect_canonical' );
    }
}, 0 ); // on priority 0 to remove 'redirect_canonical' added with priority 10



//
?>
