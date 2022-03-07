<?php

/**
 * 
 */
require_once(  get_template_directory() . '/functions/utilities.php');

/**
 * 		enqueues scripts / styles
 * 		cleans wp_head
 * 		...
 */
require_once(  get_template_directory() . '/classes/setup-theme.php');

/**
 * 		creates the theme settings
 * 		google maps api key
 * 		...
 * 
 * 		TODO: this really needs a lot of work
 */
// require_once(  get_template_directory() . '/classes/nu-start.php');
require_once(  get_template_directory() . '/classes/nu-starter.php');

/**
 * 
 * 		register all the option pages we will use for theme-settings
 * 
 */
require_once(  get_template_directory() . '/functions/options-pages.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/content-types.php');


/**
 * ? server-side functionality for gutenberg / block editor
 * ? - register block styles
 * ? - register custom ACF blocks
 */
require_once(  get_template_directory() . '/functions/gutenberg.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/acf-blocks.php');

/**
 * 		PIM Sync and auto-create posts
 * 
 */
require_once(  get_template_directory() . '/classes/pim-handler.php'); 			




require_once( get_template_directory().'/classes/vendors/class.taxonomy-single-term.php' );
$custom_tax_mb = new Taxonomy_Single_Term( 'nu_news-categories', 'nu_news' );
$custom_tax_mb = new Taxonomy_Single_Term( 'nu_events-types', 'nu_events' );



function add_my_icons($file) {
    $file = get_template_directory().'/__lib/icons/material-icons/config.json';
    return $file;
}

function add_my_css($cssfile) {
    $cssfile = get_template_directory_uri().'/__lib/icons/material-icons/css/fontello.css';
    return $cssfile;
}

add_filter( 'jvm_richtext_icons_iconset_file', 'add_my_icons');

add_filter( 'jvm_richtext_icons_css_file', 'add_my_css');


function handle_postsgrid_filtering(){

    $chronological_value = $_POST['chronological_value'];

    // $ajaxposts = new WP_Query([
    //   'post_type' => 'projecten',
    //   'posts_per_page' => -1,
    //   'category_name' => $catSlug,
    //   'orderby' => 'menu_order', 
    //   'order' => 'desc',
    // ]);

    $response = '';
  
    // if($ajaxposts->have_posts()) {
    //   while($ajaxposts->have_posts()) : $ajaxposts->the_post();
    //     $response .= get_template_part('templates/_components/project-list-item');
    //   endwhile;
    // } else {
    //   $response = 'empty';
    // }

    $placeholder = '
        <ul>
            <li class="grid-item broken"><p class="has-smaller-font-size">Sorry! We are developing AJAX support for filtering by: <strong>'.$chronological_value.'</strong></p></li>
        </ul>
    ';

    $response .= $placeholder;
  
    echo $response;
    exit;
}
// add_action('wp_ajax_handle_postsgrid_filtering', 'handle_postsgrid_filtering');
// add_action('wp_ajax_nopriv_handle_postsgrid_filtering', 'handle_postsgrid_filtering');

// 
?>