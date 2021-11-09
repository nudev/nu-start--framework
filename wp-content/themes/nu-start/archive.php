<?php
/**
 * 
 */
// 

// ! hard redirect for the moment just to make this safe to work on
wp_safe_redirect( home_url() );


// ? this is the start of juggling data to build up this auto-template
global $wp_query;
$archive_query = $wp_query;
$tax = $archive_query->query_vars['taxonomy'];
$term_slug = $archive_query->query_vars['term'];
$term_obj = get_term_by( 'slug', $term_slug, $tax );
$term_id = $term_obj->term_id;

$hero_markup = '
<!-- wp:group {"align":"full","className":"nu_pattern-is_hero_banner\u002d\u002dtype-c"} -->
<div class="wp-block-group alignfull nu_pattern-is_hero_banner--type-c" id="banner-type-c"><!-- wp:cover {"url":"https://ea-kernl-ui.local/wp-content/themes/nu-start/__lib/img/1920x1080.png","id":295,"dimRatio":0,"focalPoint":{"x":"0.50","y":0.5},"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:20vw"><img class="wp-block-cover__image-background wp-image-295" alt="" src="https://ea-kernl-ui.local/wp-content/themes/nu-start/__lib/img/1920x1080.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"gradient":"linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"}},"layout":{"inherit":true}} -->
<div class="wp-block-group has-background" style="background:linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"><!-- wp:heading {"className":"is-style-display"} -->
<h2 class="is-style-display">Curated Collection of Person Items</h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
';

// ? this needs to be passed the data to build itself; not the built data 
$grid_markup = '
<!-- wp:acf/posts-grid {"id":"block_61657a47301a7","name":"acf/posts-grid","data":{"options_columns":"3","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_people","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_stop_after":"0","_autoselect_posts_stop_after":"field_61620e12a5c26","autoselect_posts_allowed_terms":["6"],"_autoselect_posts_allowed_terms":"field_61620d7fa5c24","autoselect_posts_allowed_operator":"any","_autoselect_posts_allowed_operator":"field_616302eec35dd","autoselect_posts_disallowed_terms":"","_autoselect_posts_disallowed_terms":"field_61620dd2a5c25","autoselect_posts_disallowed_operator":"any","_autoselect_posts_disallowed_operator":"field_61630383c35de","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635","item_style_display_featured_image":"1","_item_style_display_featured_image":"field_612e302ed48ae","item_style_image_dimensions":"tall","_item_style_image_dimensions":"field_611e8ce3f2594","item_style_orientation":"vertical","_item_style_orientation":"field_611e8c98f2593","item_style":"","_item_style":"field_611e8c90f2592"},"align":"","mode":"preview","wpClassName":"acf-posts-grid"} /-->
';


// * the pattern is the pattern
$guides = [];
$return = '';


get_header(); // ?	open <main>

if( is_active_sidebar( 'alerts-sitewide' ) ){
	dynamic_sidebar( 'alerts-sitewide' );
}
echo '<div class="blocks--wrapper">'.$hero_markup;



if ( $archive_query->have_posts() ) {

	while ( $archive_query->have_posts() ) {
        
		$archive_query->the_post(); 

        echo '<h2>'.$post->post_title.'</h2>';
        
	}
}




// the_content();

echo '</div>';

get_footer(); // ?	close </main>


// 
?>