<?php
/**
 * 		utility functions 
 * 		- 
 * 
 *
 */
//


add_filter( 'walker_nav_menu_start_el', 'add_icons_to_submenu_parents',10,4);


function add_icons_to_submenu_parents( $output, $item, $depth, $args ){
	//Only add class to 'top level' items on the 'primary' menu.
	if( 'header' == $args->theme_location || 'utility' == $args->theme_location ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output = $output.'<button aria-label="expand the '.esc_html(strtolower($item->title)).' submenu" class="navlinks-showsubmenu"></button>';
		}
	}
	return $output;
}




if( !function_exists('nu__get_nav_menu') ){

	/**
	 * 	Return or echo a nav menu from a location or by id
	 *
	 * @param boolean $echo
	 * @param [type] $location
	 * @param [type] $menu
	 * @return void
	 */
	function nu__get_nav_menu($location = '', $echo = false, $menu = ''){
	
		// dynamically set args
		$args = array(
			// static $args:
			'container' => 'nav'                   // all nav menus use nav.navlinks pattern
			,'container_class' => 'navlinks'        // all nav menus use nav.navlinks pattern
			,'link_before' => '<span class="link-text">'              // wrap link text in <span> for accentUnderlines
			,'link_after' => '</span>'              // wrap link text in <span> for accentUnderlines
			// dynamic $args:
			,'echo' => $echo
			,'theme_location' => $location
			,'menu' => $menu
		);
	
		// return the menu call
		return wp_nav_menu($args);
	}
}


if( function_exists('nu__getGoogleMapAddress') ){
	/**
	 * Undocumented function
	 *
	 * @param [type] $location
	 * @return void
	 */
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
}




if( !function_exists('nu__get_site_logo') ){

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function nu__get_site_logo(){
		$return = '';
		$guides = [];
		$guides['site-logo'] = '
			<a href="%1$s" title="Visit %2$s" class="logo%3$s">
				%4$s
			</a>
		';
	
		$return = sprintf(
			$guides['site-logo'],
			site_url(),
			get_bloginfo( 'name' ),
			!empty(NU__Starter::$themeSettings['header']['site_logo']) ? ' logo--image' : ' logo--text',
			!empty(NU__Starter::$themeSettings['header']['site_logo']) ? NU__Starter::$themeSettings['header']['site_logo'] : get_bloginfo( 'name' )
		);
	
		return $return;
	}

}





if( !function_exists('nu__get_pagination') ){

	/**
	 * Wrapper function for paginate_links for consistency
	 *
	 * @param string $custom_query
	 * @return void
	 */
	function nu__get_pagination( $custom_query = '' ){

		global $wp_query;

		if( !empty($custom_query) ){
			$wp_query = $custom_query;
		}

		$big = 999999; // need an unlikely integer
		$pagination = paginate_links(array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type' => 'list',
			'prev_text' => '<span class="prev"><</span>',
			'next_text' => '<span class="next">></span>',
			'before_page_number' => '<span class="pagenum">',
			'after_page_number' => '</span>',
			'mid_size' => 5
		));

		return $pagination;
	}

}

//
?>