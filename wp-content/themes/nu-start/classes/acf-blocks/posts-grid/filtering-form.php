<?php
/**
 * 
 */
// 

class FilteringForm extends PostsGrid
{

	private static $all_filtered_terms;
	
	function __construct(){

		// self::_handle_get_query();
		// self::_build_form_return_string();

	}

	public static function _handle_get_query(){


		$all_filtered_terms = [];

		foreach( $_GET as $taxonomy_filter => $terms ){

			foreach( $terms as $term ){

				$taxonomy = 'nu_'.$taxonomy_filter;

				$all_filtered_terms[] = !empty(get_term_by( 'slug', $term, $taxonomy )) ? get_term_by( 'slug', $term, $taxonomy )->term_id : '';

			}

		}

		self::$all_filtered_terms = array_unique($all_filtered_terms);
		
	}
	

	public static function _build_form_return_string(){

			// ? the pattern is the pattern...
			$return = '';
			$guides = [];
			$guides['form'] = '
			<div class="filteringform js__filteringform">
				<form name="postsgrid_filter-'.self::$block['id'].'">
					%1$s
					<div class="submission">
						<button type="submit" value="Filter" class="button is-style-outline">Submit</button>
						<a href="'.get_permalink(self::$post_id).'" class="outline button">Clear</a>
					</div>
				</form>
			</div>
			';
			// ? sprintf guides above

		// 
		$taxonomy_filters_return_string = '';

		// pluck away any empty taxonomies
		if( !empty(self::$allowed_terms) ){
			self::_handle_has_allowed_terms();
		}

		$taxonomy_filters_return_string = self::_return_the_taxonomy_filters( self::$the_associated_taxonomies );

		// 
		$return = sprintf(
			$guides['form'],
			'<div class="filters">' . $taxonomy_filters_return_string . '</div>',
		);
		
		// ? hoist the final return string for the filteringform (could be filtered here!)
		self::$the_filtering_form_return_string = $return;		
	}







	private static function _handle_has_allowed_terms(){
		// ? include an array of all the posts returned by the WP Query
		$all_posts = array_column(self::$the_wp_query->posts, 'ID');
		// ? next we get a list of all terms used by any of the returned posts
		$all_possible_terms_to_filter = wp_get_object_terms( $all_posts, self::$the_associated_taxonomies );
		// ? using that, we isolate the possible taxonomies
		$all_possible_taxonomies_to_filter = array_unique(array_column($all_possible_terms_to_filter, 'taxonomy'));
		self::$the_associated_taxonomies = $all_possible_taxonomies_to_filter;
	}






	private static function _return_the_taxonomy_filters( $taxonomies ){
		// ? the pattern is the pattern...
		$return = '';
		$guides = [];
		$guides['option'] = '<option value="%2$s"%3$s>%1$s</option>';
		$guides['taxonomy-filter'] = '
		<div class="filters-filter" data-taxonomy="%1$s">
			<label for="%1$s">%2$s</label>
			<select name="%1$s[]" data-placeholder="%2$s" multiple="multiple">
				%3$s
			</select>
		</div>
		';	


		$taxonomy_filters_return_string = '';

		foreach( $taxonomies as $taxonomy ){

			$taxonomy_object = get_taxonomy($taxonomy);

			$the_taxonomy_filter_terms = get_terms([
				'taxonomy' => $taxonomy,
				'hide_empty' => true,
			]);

			$select_elem_contents = '';

			foreach ($the_taxonomy_filter_terms as $term_object ) {

				$select_elem_contents .= sprintf(
					$guides['option'],
					$term_object->name,
					$term_object->slug,
					in_array($term_object->term_id, self::$all_filtered_terms) ? ' selected="selected"' : ''
				);
				
			}

			// ? next, we concat all the filters into a return string like with the options
			$taxonomy_filters_return_string .= sprintf(
				$guides['taxonomy-filter'],
				sanitize_title( $taxonomy_object->label ),
				$taxonomy_object->label,
				$select_elem_contents
			);

		}


		return $taxonomy_filters_return_string;
		
	}




	
}






// 
?>