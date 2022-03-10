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

    global $wpdb;

    

    $chronological_value = $_POST['chronological_value'];

    $current_page_number = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $wp_query_args = [
        'post_type' 		=> 		'nu_events',
        'post_status' 		=> 		'publish',
        // 'order'				=>		'ASC',
        // 'orderby'			=>		'title',
        'paged'				=>		$current_page_number,
        'posts_per_page' 	=> 		-1,
    ];
    $wp_query_args['meta_query'] = [];
    $wp_query_args['order'] = $chronological_value == "upcoming" ? 'ASC' : 'DESC';
    $wp_query_args['orderby'] = 'meta_value_num';
    $wp_query_args['meta_key'] = 'event_item_metadata_one_day_happens_on';

    $wp_query_args['meta_query'] = array(
        array(
            'key' 			=> 'event_item_metadata_one_day_happens_on',
            'compare' => $chronological_value == "upcoming" ? '>=' : '<',
            'value' => date("Ymd"),
            'type' => 'DATE'
        ),
    );

    $ajax_query = new WP_Query($wp_query_args);
    
    $response = '';
    if( $ajax_query->have_posts() ){
        while( $ajax_query->have_posts() ){
            $ajax_query->the_post();
            global $post;

            $post_type = $post->post_type;
            $fields = get_fields($post->ID);
            $event_item_metadata = !empty( $fields['event_item_metadata'] ) ? $fields['event_item_metadata'] : '';

            $will_open_new_tab = !empty($fields['custom_permalink_redirect']) ? ' [will open in a new tab/window]' : '';
            $the_title_attribute = ' title="Read More about '.get_the_title( ).$will_open_new_tab.'"';

            // This template is loaded by the post grid
            $guides['grid-item-event'] = '
                <li class="grid-item%1$s%8$s%9$s">
                    <a class="contains-clickable-area" href="%7$s"'.$the_title_attribute.' %10$s>
                        %2$s
                        <div class="grid-item-content">
                        <div>
                            %11$s
                            %4$s
                        </div>
                        <div class="date_time_container">
                            %3$s
                            %6$s
                            %12$s
                            %5$s
                        </div>
                        </div>
                        %13$s
                    </a>
                </li>
            ';
            

            $the_post_title = '<h2 class="post-title"><span>'.get_the_title( ).'</span></h2>';

            // ? either use a custom url redirect via a known custom field; or just the normal get_permalink
            $determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );
            $maybe_target = !empty($fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
            // $will_open_new_tab = !empty($fields['custom_permalink_redirect']) ? ' [will open in a new tab/window]' : '';



            $aspect_ratio_class = ' has-very-wide-cover-image';
            $orientationClass = ' has-layout-vertical';

            
            $the_basic_excerpt = '';

            $event_location = !empty($event_item_metadata['location']) ? '<p class="location"><span class="material-icons-outlined">place</span><span>'.$event_item_metadata['location'].'</span></p>' : '';

            $checkTerms = get_the_terms( $post, 'nu_events-types' );

            $event_topic = !empty( $checkTerms ) ? '<div class="event-type">'.$checkTerms[0]->name.'</div>' : '';


            $date_format = "M<\b\\r>d<\b\\r>Y";
            $time_format = 'g:i a';
            $guides['single-day'] = '
            <div class="nu__datetime">
                %2$s
                %1$s
            </div>
            ';
            $month = '<span class="month">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('M').'</span>';
            $day = '<br /><span class="day">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('d').'</span>';
            $year = '<br /><span class="year">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('Y').'</span>';

            $happensOn = !empty( $event_item_metadata['one_day']['happens_on'] ) ? '<p class="nu__datetime-dates has-smaller-font-size"><span class="nu__datetime-startsat">'. $month.$day.$year . '</span></p>' : '';
            $startsAt = !empty($event_item_metadata['one_day']['starts_at']) ? '<span class="nu__datetime-startson">'. DateTime::createFromFormat('H:i:s', $event_item_metadata['one_day']['starts_at'] )->format($time_format) . '</span>' : '';
            $endsAt = !empty($event_item_metadata['one_day']['ends_at']) ? ' - <span>'. DateTime::createFromFormat('H:i:s', $event_item_metadata['one_day']['ends_at'] )->format($time_format) . '</span>' : '';

            $happens_on_return = sprintf(
            $guides['single-day']
            ,''
            ,$happensOn
            );
            $happens_at_return = sprintf(
            $guides['single-day']
            ,!empty($startsAt) || !empty($endsAt) ? '<p class="nu__datetime-times has-smaller-font-size">'.$startsAt . $endsAt . '</p>' : ''
            ,''
            );

            $response .= sprintf(
                $guides['grid-item-event'],
                ' '.$post_type,
                // $the_cover_image,
                '<figure>'.get_the_post_thumbnail( ).'</figure>',
                // $the_date_time,
                '',
                $the_post_title,
                $event_location,
                $the_basic_excerpt,
                $determined_permalink,
                $aspect_ratio_class,
                $orientationClass,
                $maybe_target,
                $event_topic,
                $happens_at_return,
                $happens_on_return
            );
        }
    }

    echo $response;
    wp_die();
    exit;
}
add_action('wp_ajax_handle_postsgrid_filtering', 'handle_postsgrid_filtering');
add_action('wp_ajax_nopriv_handle_postsgrid_filtering', 'handle_postsgrid_filtering');

// 
?>