<?php
/**
 * 		NU Custom Post Type Registration Class
 * 
 * 
 * 
 * 	?		Handle any Custom Post Type registration
 * 	?		Handle any Custom Taxonomy and Term creation
 * 
 * 
 */
class NU__ContentTypes
{


	// "what are the types literals"
	public static $activeTypes = [];
	

	public static function _init(){

		$files = glob(get_template_directory()."/classes/content-types/*.php");
		foreach($files as $file){
			include_once($file);
		}

	}

	public static function _add_taxonomy_terms($taxonomy = '', $terms = [] ){
		$taxonomy = sanitize_title( 'nu_'.$taxonomy );	
		if( !empty($terms) ){
			foreach($terms as $term ){
				if( !term_exists( $term, $taxonomy )	 ){
					wp_insert_term( $term, $taxonomy );
				}
			}
		}
	}

	public static function _register_custom_taxonomy($literal = '',$post_type = '', $name = '', $singular = '', $rewrite = '', $hierarchical = true, $ui = true){

		// check that the post type to attach this taxonomy to exists
		if( post_type_exists( sanitize_title('nu_'.$post_type) ) ){
			
			$labels = array(
				'name' => _x( $name, 'taxonomy general name' ),
				'singular_name' => _x( $singular, 'taxonomy singular name' ),
				'search_items' =>  __( 'Search '.$name ),
				'all_items' => __( 'All '.$name ),
				'parent_item' => __( 'Parent '.$singular ),
				'parent_item_colon' => __( 'Parent '.$name.':' ),
				'edit_item' => __( 'Edit '.$singular ), 
				'update_item' => __( 'Update '.$singular ),
				'add_new_item' => __( 'Add New '.$singular ),
				'new_item_name' => __( 'New '.$singular.' Name' ),
				'menu_name' => __( $name ),
			);
		
			$taxObj = register_taxonomy( sanitize_title( 'nu_'.$literal ) ,[sanitize_title('nu_'.$post_type)], array(
				'hierarchical' => $hierarchical,
				'public' => true,
				'labels' => $labels,
				'show_ui' => $ui,
				'show_in_rest' =>  true,
				'show_in_menu' =>  true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => empty($rewrite) ? sanitize_title( $name ) : sanitize_title( $rewrite ) ),
			));
		

			// https://developer.wordpress.org/reference/functions/register_taxonomy/
			register_taxonomy_for_object_type('nu_'.$post_type, 'nu_'.$literal);

		}

	}

	public static function _register_custom_post_type( $literal = '', $name = '', $singular = '', $rewrite = '',  $hierarchical = false, $dashicon = '' ){

		// check if this post type already exists
		if( !post_type_exists( sanitize_title( 'nu_'.$literal ) ) ){


			
			$labels = array(
				'name'                  => _x( $name, 'Post type general name', 'textdomain' ),
				'singular_name'         => _x( $singular, 'Post type singular name', 'textdomain' ),
				'menu_name'             => _x( $name, 'Admin Menu text', 'textdomain' ),
				'name_admin_bar'        => _x( $singular, 'Add New on Toolbar', 'textdomain' ),
				'add_new'               => __( 'Add New '.$singular, 'textdomain' ),
				'add_new_item'          => __( 'Add New '.$singular, 'textdomain' ),
				'new_item'              => __( 'New '.$singular, 'textdomain' ),
				'edit_item'             => __( 'Edit '.$singular, 'textdomain' ),
				'view_item'             => __( 'View '.$singular, 'textdomain' ),
				'all_items'             => __( 'All '.$name, 'textdomain' ),
				'search_items'          => __( 'Search '.$name, 'textdomain' ),
				'parent_item_colon'     => __( 'Parent '.$name.':', 'textdomain' ),
				'not_found'             => __( 'No '.$name.' found.', 'textdomain' ),
				'not_found_in_trash'    => __( 'No '.$name.' found in Trash.', 'textdomain' ),
				'featured_image'        => _x( $singular.' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'archives'              => _x( $singular.' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
				'insert_into_item'      => _x( 'Insert into '.$singular.'', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
				'uploaded_to_this_item' => _x( 'Uploaded to this '.$singular.'', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
				'filter_items_list'     => _x( 'Filter '.$name.' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
				'items_list_navigation' => _x( $name.' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
				'items_list'            => _x( $name.' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
			);
	
			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'       => true,
				'query_var'          => true,
				'template' 			 => '',
				'template_lock'      => '',
				'rewrite'            => array( 'slug' => (empty($rewrite) ? sanitize_title( $name ) : sanitize_title( $rewrite )), 'with_front' => false ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => $hierarchical,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'jsx' ),
			);

			if( !empty($dashicon) ){
				$args['menu_icon'] = $dashicon;
			}
	
			register_post_type( sanitize_title( 'nu_'.$literal ), $args );

			NU__ContentTypes::$activeTypes[] = 'nu_'.$literal;

		}
	}
	
	
	public static function _buildFiltersForTaxonomies($post_type = '', $which = ''){

		// error_log(print_r(NU__ContentTypes::$activeTypes, true));
		
		foreach( NU__ContentTypes::$activeTypes as $activeType ){
			

			// Apply this only on a specific post type
			if ( $activeType == $post_type ) {

				// return;
				// A list of taxonomy slugs to filter by
				$taxonomies = array( $post_type.'-categories', $post_type.'-tags' );
	
				foreach ( $taxonomies as $taxonomy_slug ) {
	
					// Retrieve taxonomy data
					$taxonomy_obj = get_taxonomy( $taxonomy_slug );
					$taxonomy_name = $taxonomy_obj->labels->name;
	
					// Retrieve taxonomy terms
					$terms = get_terms( $taxonomy_slug );
	
					// Display filter HTML
					echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
					echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
					foreach ( $terms as $term ) {
						printf(
							'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
							$term->slug,
							( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
							$term->name,
							$term->count
						);
					}
					echo '</select>';
				}
			}


		}
		

	}
	

}

add_action('init', 'NU__ContentTypes::_init' );
add_action( 'restrict_manage_posts', 'NU__ContentTypes::_buildFiltersForTaxonomies');

?>