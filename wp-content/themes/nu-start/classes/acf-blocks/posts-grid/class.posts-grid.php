<?php 
/**
 * 
 */
// 

/**
 * *	include the FilteringForm class extension 
 */
if( !is_admin()){
	include_once(  get_template_directory().'/classes/acf-blocks/posts-grid/filtering-form.php' );
	include_once(  get_template_directory().'/classes/acf-blocks/posts-grid/pg.pagination.php' );
}



/**
 * 
 * PostsGrid class destructures the *massive* complexity of this feature
 * ? note - the furthest vision of this feature is to slowly ride alongside then jump onto the wp core version of this (query/post-list/post-template blocks)
 */
class PostsGrid
{

	/**
	 * TODO: start refactoring this parent class to utilize extends
	 * ? referencing "shared" variables as public static var seems to be the best way at this time
	 */

	// ? variables that we always need
	public static $post_fields, $block, $post_object, $is_preview, $post_id;

	// ? variables we may or may not use
	public static $allowed_terms, $disallowed_terms, $the_post_type, $the_associated_taxonomies;

	// ? DRY destructured data 
	public static $the_wp_query, $grid_items_str;

	// ? partial return strings
	public static $the_filtering_form_return_string;

	// internal methods will hoist data to these properties to avoid repetitive calls
	public $wp_query, $wp_query_args, $httpAPI, $queried_posts;

	// store various return strings or null values to handle these optional components
	public $pagination_str, $filtering_str;


	/**
	 * PostsGrid Class Constructor
	 * takes the exact same variables / args as an ACF block
	 *
	 * @param [type] $block
	 * @param [type] $content
	 * @param [type] $is_preview
	 * @param [type] $post_id
	 */
	function __construct( $block, $content, $is_preview, $post_id ){


		// ? hoist all of the ACF Block variables
		self::$block = $block;
		self::$post_id = $post_id;
		self::$is_preview = $is_preview;

		// ? hoist the $fields for this post (contains this posts-grid block)
		self::$post_fields = get_fields();

		// determine auto/manual selection
		$is_autoselect = !empty( self::$post_fields['options']['autoselect'] ) ? true : false;

		// todo: refactor these methods
		if( !empty($is_autoselect) ){
			$this->_build_auto_query( self::$post_fields['autoselect_posts']['post_type'] );
		}
		else if( !$is_autoselect && !empty(self::$post_fields['select_posts']) ){
			$this->_build_manual_query();
		}

		// do the WP Query
		$this->wp_query = new WP_Query($this->wp_query_args);
		self::$the_wp_query = $this->wp_query;
		

		// maybe build pagination
		if( !empty( self::$post_fields['options']['pagination'] ) ){
			$pagination = nu__get_pagination($this->wp_query);
			$this->pagination_str = '<div class="pagination">'.$pagination.'</div>';
		}

		
		if( !empty( self::$post_fields['options']['show_filter'] ) && !is_admin() ){
			FilteringForm::_handle_get_query();
			FilteringForm::_build_form_return_string(self::$post_fields);
		}

		
		// build all grid items
		$this->_build_griditems_return_string();

		
		// build entire block
		$this->_build_acf_block_output();
		
	}

	/**
	 * 
	 * 
	 * 
	 */
	private function _build_acf_block_output(){

		$guides['acf-block-container'] = '
			%4$s
			<div class="nu__grid cols-%1$s">
				<ul>
					%2$s
				</ul>
				%3$s
			</div>
		';

		$return = sprintf(
			$guides['acf-block-container'],
			self::$post_fields['options']['columns'],  // column count value (required field)
			self::$grid_items_str,
			$this->pagination_str,
			self::$the_filtering_form_return_string,
		);

		echo $return;
		
	}




	/**
	 * Runs the loop and sets a string of <li> items to a class variable
	 * - return oops item if nothing found (should never fail)
	 *
	 * @return void
	 */
	private function _build_griditems_return_string(){

		// ? reference the $wp_query stored in the class variable as it is often modified:
		// ? note to use self:: instead of $this because it may be called outside the constructor!
		$wp_query = self::$the_wp_query;

		// the pattern is the pattern...
		$guides = [];
		$return = '';


		// ? wp guidelines for arbitrarily large number fallback, or specific count number
		$count = 9999;
		$limit = !empty(self::$post_fields['autoselect_posts']['stop_after']) ? self::$post_fields['autoselect_posts']['stop_after'] : 9999;
		if( !empty($limit) ){
			$count = 0;
		}

		// ? if there are no posts to loop we display an oops message
		if( !$wp_query->have_posts() ){
			$return .= '<li class="grid-item broken"><p class="has-smaller-font-size">Sorry, I wasn\'t able to find anything... Perhaps try somewhere else?</p></li>';
		}
		// ? otherwise we do the loop here - note we are using a custom counter and limit to account for pagination
		else {
			while( $wp_query->have_posts() && $count < $limit ) {
	
				// ? progress counter and move query to next post
				$count++;
				$wp_query->the_post();				
				// ? honestly unsure if we need global scope!
				global $post;

				// TODO: comments help - keep commenting, but also refactor more noob
				// ? init the other class that returns an item string
				$return .= PostsGrid_Item::init($post, self::$post_fields);
			}
			// ? this is like undo for global $post, i think.
			wp_reset_postdata(  );
		}
		// ? instead of actually returning the compiled string, we will set it to a class level variable
		self::$grid_items_str = $return;
	}
	
	

	/**
	 * 		This handles manually selected items in a specific order
	 *
	 * @return void
	 */
	private function _build_manual_query(){
		
		// 
		$this->wp_query_args = [
			'post_type'			=>		'any',
			'post_status' 		=> 		'publish',
			'posts_per_page' 	=> 		!empty( self::$post_fields['options']['pagination'] ) ? self::$post_fields['options']['per_page'] : 12,
			'paged'				=>		get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1,
			'post__in'			=>		self::$post_fields['select_posts'],
			'order'				=>		'ASC',
			'orderby'			=>		'post__in',
		];
		$this->wp_query = new WP_Query($this->wp_query_args);
		
	}
	


	/**
	 * prepare a wp_query that auto-selects posts with optional additional arguments for taxonomies etc
	 *
	 * @return void
	 */
	private function _build_auto_query( $selected_post_type ){
		
		// ? starting here, we dynamically build the WP_Query we want

		// destructure some data to make this more readable
		$posts_per_page = !empty( self::$post_fields['options']['pagination'] ) ? self::$post_fields['options']['per_page'] : 12;
		$current_page_number = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		// ? this is the required meaningful wp_query arguments
		$this->wp_query_args = [
			'post_type' 		=> 		!empty($selected_post_type) ? $selected_post_type : '',
			'post_status' 		=> 		'publish',
			'order'				=>		'ASC',
			'orderby'			=>		'title',
			'paged'				=>		$current_page_number,
			'posts_per_page' 	=> 		$posts_per_page,
		];

		// ? starting here, we dynamically build the taxonomy query we want, and append it to the main query
	
		// hoist allowed terms list
		self::$allowed_terms = self::$post_fields['autoselect_posts']['allowed_terms'];
		// hoist disallowed terms list
		self::$disallowed_terms = self::$post_fields['autoselect_posts']['disallowed_terms'];
		// hoist all the taxonomies registered to the selected post type
		self::$the_associated_taxonomies = get_object_taxonomies( $selected_post_type, 'names' );
		
		
		if( !empty(self::$allowed_terms)  || !empty(self::$disallowed_terms) ){
			
			$this->wp_query_args['tax_query'] = [
				'relation' 		=> 		'AND',
			];

			if( !empty(self::$allowed_terms) ){
				
				$allowed_operator = self::$post_fields['autoselect_posts']['allowed_operator'] == 'any' ? 'OR' : 'AND';

				$this->wp_query_args['tax_query']['allowed'] = [
					'relation' => $allowed_operator,
				];

				foreach( self::$allowed_terms as $term_obj ){
					//  bail early if the term doesn't belong to the post type
					if( !in_array($term_obj->taxonomy, self::$the_associated_taxonomies ) ){
						continue;
					}
					// ? append the tax query (it overrides kind of like CSS)
					$this->wp_query_args['tax_query']['allowed'][] = [
						'taxonomy' 	=> $term_obj->taxonomy,
						'terms' 	=> $term_obj->term_id,
						'include_children' => false,
						'operator'	=> 'IN'
					];
				}
			}
			
			if( !empty(self::$disallowed_terms) ){
				$disallowed_operator = self::$post_fields['autoselect_posts']['disallowed_operator'] == 'any' ? 'OR' : 'AND';

				$this->wp_query_args['tax_query']['disallowed'] = [
					'relation' => $disallowed_operator,
				];
				foreach( self::$disallowed_terms as $term_obj ){
					//  bail early if the term doesn't belong to the post type
					if( !in_array($term_obj->taxonomy, self::$the_associated_taxonomies ) ){
						continue;
					}
		
					// ? append the tax query (it overrides kind of like CSS)
					$this->wp_query_args['tax_query']['disallowed'][] = [
						'taxonomy' 	=> $term_obj->taxonomy,
						'terms' 	=> $term_obj->term_id,
						'include_children' => false,
						'operator'	=> 'NOT IN'
					];
				}
			}
		}
		
		
		if( !empty($_GET) ){

			foreach( self::$the_associated_taxonomies as $taxonomy_name ){
				$taxonomy_object = get_taxonomy($taxonomy_name);
				$label = $taxonomy_object->label;
				$slug = sanitize_title( $taxonomy_object->label );		
				$the_filtered_term_slugs = !empty($_GET[$slug]) ? $_GET[$slug] : '';
				
				if( $the_filtered_term_slugs ){
					$this->wp_query_args['tax_query']['filtered_by'] = [
						'relation' => 'AND',
					];
					foreach ($the_filtered_term_slugs as $term) {
						$term_object = get_term_by( 'slug', $term, $taxonomy_name );
						$this->wp_query_args['tax_query']['filtered_by'][] = [
							'taxonomy'				=> 		$taxonomy_name,
							'terms'					=> 		$term_object->term_id,
							'include_children'		=> 		false,
						];
					}
					
				}

			}

		}

		$this->wp_query_args['meta_query'] = [];
		
		if( $selected_post_type == 'nu_events' ){
			
			if( self::$post_fields['autoselect_posts']['chronological'] != "all" ){

				$this->wp_query_args['order'] = self::$post_fields['autoselect_posts']['chronological'] == "upcoming" ? 'ASC' : 'DESC';
				$this->wp_query_args['orderby'] = 'meta_value_num';
				$this->wp_query_args['meta_key'] = 'event_item_metadata_one_day_happens_on';

				$this->wp_query_args['meta_query'] = array(
					array(
						'key' 			=> 'event_item_metadata_one_day_happens_on',
						'compare' => self::$post_fields['autoselect_posts']['chronological'] == "upcoming" ? '>=' : '<',
						'value' => date("Ymd"),
						'type' => 'DATE'
					),
				);

			}
			$getValue = !empty($_GET['chronological']) ? $_GET['chronological'] : '';
			if( $getValue ){

				$this->wp_query_args['order'] = $getValue == "upcoming" ? 'ASC' : 'DESC';
				$this->wp_query_args['orderby'] = 'meta_value_num';
				$this->wp_query_args['meta_key'] = 'event_item_metadata_one_day_happens_on';

				$this->wp_query_args['meta_query'] = array(
					array(
						'key' 			=> 'event_item_metadata_one_day_happens_on',
						'compare' => $getValue == "upcoming" ? '>=' : '<',
						'value' => date("Ymd"),
						'type' => 'DATE'
					),
				);

			}

		}

		if( $selected_post_type == 'nu_people' ){
			$this->wp_query_args['orderby'] = 'meta_value';
			$this->wp_query_args['meta_key'] = 'person_metadata_last_name';
		}

		if( $selected_post_type == 'nu_news' ){
			$this->wp_query_args['order'] = 'DESC';
			$this->wp_query_args['orderby'] = 'meta_value_num';
			$this->wp_query_args['meta_key'] = 'publication_info_date';
		}


		
		// append the auto-query to the initial wp query
		$this->wp_query = new WP_Query($this->wp_query_args);


	
	}


}
?>