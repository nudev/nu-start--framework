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
	public static $the_wp_query;

	// ? partial return strings
	public static $the_filtering_form_return_string;







	// internal methods will hoist data to these properties to avoid repetitive calls
	public $wp_query, $wp_query_args, $httpAPI, $queried_posts;

	// store various return strings or null values to handle these optional components
	public $grid_items_str, $pagination_str, $filtering_str;




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
			$this->_build_pagination();
		}

		
		if( !empty( self::$post_fields['options']['show_filter'] ) && !is_admin() ){
			FilteringForm::_handle_get_query();
			FilteringForm::_build_form_return_string();
		}

		
		// build all grid items
		$this->_build_griditems_return_string();

		
		// build entire block
		$this->_build_acf_block_output();
		
	}

	private function _build_pagination(){
		
		
		$total_pages = $this->wp_query->max_num_pages;

		global $wp_query;
		$wp_query = $this->wp_query;
		
		$big = 9999999; // need an unlikely integer
		$pagination = paginate_links(array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $total_pages,
			'type' => 'list',
			'prev_text' => '<span><</span>',
			'next_text' => '<span>></span>',
			'before_page_number' => '<span>',
			'after_page_number' => '</span>',
			'mid_size' => 5
		));
		
		$this->pagination_str = '<div class="pagination">'.$pagination.'</div>';
	}
	

	private function _build_acf_block_output(){

		$guides['acf-block-container'] = '<div id="%1$s" class="nu-acf-block nu_posts-grid%2$s%3$s">%7$s<div class="nu__grid cols-%4$s"><ul>%5$s</ul>%6$s</div></div>';

		$return = sprintf(
			$guides['acf-block-container'],
			!empty( self::$block['anchor' ]) ? self::$block['anchor'] : self::$block['id'],	// block anchor or a unique ID
			!empty(self::$block['className']) ? ' '.self::$block['className'] : '',
			!empty(self::$block['align']) ? ' justify-'.self::$block['align'] : '',
			self::$post_fields['options']['columns'],  // column count value (required field)
			$this->grid_items_str,
			$this->pagination_str,
			self::$the_filtering_form_return_string
		);

		echo $return;
		
	}

	private function _build_griditems_return_string(){
		$return = '';

		// todo: i am tired, i dont actually know why this is working so well!
		$count = 9999;
		$limit = !empty(self::$post_fields['autoselect_posts']['stop_after']) ? self::$post_fields['autoselect_posts']['stop_after'] : 9999;
		if( !empty($limit) ){
			$count = 0;
		}


		$wp_query = $this->wp_query;

		if( !$wp_query->have_posts() ){
			$return .= '<li class="grid-item broken"><p class="has-smaller-font-size">Sorry, I wasn\'t able to find anything... Perhaps try somewhere else?</p></li>';
		}
		while( $wp_query->have_posts() && $count < $limit ) : $count++; $wp_query->the_post();
		
			global $post;
			$return .= PostsGrid_Item::init($post, self::$post_fields);
			
		endwhile;
		wp_reset_postdata(  );

		$this->grid_items_str = $return;
		
	}
	
	
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

		// append the auto-query to the initial wp query
		$this->wp_query = new WP_Query($this->wp_query_args);

	}

















} // ? end of PostsGrid class



?>