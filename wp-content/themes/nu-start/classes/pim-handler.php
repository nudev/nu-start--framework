<?php
// 
// 


class PIM_Handler
{	


	private static $reusableHero;
	
	public static function _init(){

		$endpoints = [
			'https://pim.northeastern.edu/api/v2/program/18806'
			,'https://pim.northeastern.edu/api/v2/program/18807'
			,'https://pim.northeastern.edu/api/v2/program/19055'
			,'https://pim.northeastern.edu/api/v2/program/19056'
		];

		foreach( $endpoints as $endpoint ){
			
			PIM_Handler::_pullProgram($endpoint);
			
		}
		
	}

	public static function _pullProgram($endpoint){

		// set curl options
		$curlOpts = [
			'sslverify' => false
		];

		// use safe remote get always
		$request = wp_safe_remote_get( $endpoint, $curlOpts );

		if ( is_wp_error( $request ) ) {
			return false;
		}

		// safely get the body out of the request
		$body = wp_remote_retrieve_body( $request );

		// decode body into json, must set associative to true
		$json = json_decode( $body, true );

		// destructure the dataset we want
		$programData = json_encode( $json['data'][0] );
		
		// move to save this json file
		PIM_Handler::_putProgramFile( $json, $programData );

		// then check for the local jsons to load
		PIM_Handler::_checkForLocalJSON();

	}

	
	public static function _putProgramFile( $json, $programData ) {
		
		// error_log(print_r($programData, true)); // ? for debugging!

		$basename = get_template_directory() . '/classes/pim-pulls/program-';
		$filename = $basename . $json['data'][0]['id'];
		$filename .= '.json';

		file_put_contents($filename, $programData); 	// will over-write the existing pim

	}

	public static function _checkForLocalJSON(){

		$all_pim_json_files = glob( __DIR__ . '/pim-pulls/*.json');

		foreach( $all_pim_json_files as $programFile ){

			// check for and desconstruct the local json file to capture the data and programID separately
			if( preg_match('/program-([\d]*)/', $programFile, $matches) ){
			
				$post_ID = false;
				$programID = $matches[1];
				$programData = file_get_contents( $programFile );
				$programJSON = json_decode( $programData, true );
				
				$args = [
					'post_type' 		=> 'nu_programs',
					'post_status' 		=> 'publish',
					'posts_per_page'	=> 1,
					'meta_query' => array(
						'relation' => 'AND'
						,array(
							'key' => 'pim_id'
							,'value' => $programJSON['id']
							,'compare' => '='
						)
					),
					// ? not sure these are good
					'ignore_sticky_posts' 	=> 	true,
					'no_found_rows'       	=> 	true,
					'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
					'update_post_meta_cache' => false, // grabs post meta, remove if post meta required

				];
				$existingPost = get_posts($args);
				if( !empty($existingPost) ){
					$post_ID = $existingPost[0]->ID;
				}
				PIM_Handler::_insertProgramPost( $programID, $programJSON, $post_ID);
			}


		}

	}


	// 
	public static function _insertProgramPost( $programID, $programJSON, $post_ID = '' ){

		// 
		$program_category = !empty($programJSON['field_degree_type']['entities'][0]['name'][0]['value']) ? $programJSON['field_degree_type']['entities'][0]['name'][0]['value'] : '';
		$p_location = !empty($programJSON['field_location']['entities'][0]['name'][0]['value']) ? $programJSON['field_location']['entities'][0]['name'][0]['value'] : '';
		$p_duration = !empty($programJSON['field_duration'][0]['value']) ? $programJSON['field_duration'][0]['value'] : '';

		// 
		$reusable_hero_string = '';
		// 
		if( !isset( self::$reusableHero ) ){

			self::$reusableHero = new WP_Query([
				'post_type' => 'wp_block',
				'title' 	=> 'Hero: All Program Items'
			]);

		}

		// 
		if( !empty( self::$reusableHero->posts ) ){
			$reusable_hero_string = '<!-- wp:block {"ref":'.self::$reusableHero->posts[0]->ID.'} /-->';
		} else {
			self::$reusableHero = false;
		}
		
		//
		if( !term_exists( $program_category, 'nu_programs-categories' ) ){
			wp_insert_term( $program_category, 'nu_programs-categories' );
		}



		$acf_block = '<!-- wp:acf/nu-program {"id":"block_6105ba18591e0","name":"acf/nu-program","align":"","mode":"preview"} /-->';



		$working_template = '
			<!-- wp:group {"align":"full","className":"pattern\u002d\u002dhero-basic-breadcrumbs","epGeneratedClass":"eplus-wrapper"} -->
			<div class="pattern--hero-basic-breadcrumbs wp-block-group alignfull eplus-wrapper"><!-- wp:cover {"dimRatio":0,"minHeight":420,"isDark":false,"align":"full","epGeneratedClass":"eplus-wrapper"} -->
			<div class="wp-block-cover alignfull is-light eplus-wrapper" style="min-height:420px"><span aria-hidden="true" class="has-background-dim-0 wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"epGeneratedClass":"eplus-wrapper"} -->
			<div class="wp-block-group eplus-wrapper"><!-- wp:paragraph {"epGeneratedClass":"eplus-wrapper"} -->
			<p class=" eplus-wrapper">'.$program_category.'</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:post-title {"level":1,"epGeneratedClass":"eplus-wrapper"} /--></div>
			<!-- /wp:group --></div></div>
			<!-- /wp:cover -->
			
			<!-- wp:group {"layout":{"inherit":true},"epGeneratedClass":"eplus-wrapper"} -->
			<div class="wp-block-group eplus-wrapper"><!-- wp:acf/breadcrumbs {"id":"block_61e98e692aabc","name":"acf/breadcrumbs","mode":"preview","align_text":"left"} /--></div>
			<!-- /wp:group --></div>
			<!-- /wp:group -->
			
			<!-- wp:image {"sizeSlug":"large","epGeneratedClass":"eplus-wrapper"} -->
			<figure class="wp-block-image size-large eplus-wrapper"><img src="'.$programJSON['field_hero_image'][0]['uri'].'" alt=""/></figure>
			<!-- /wp:image -->
			
			<!-- wp:paragraph {"epGeneratedClass":"eplus-wrapper"} -->
			<p class=" eplus-wrapper">'.preg_replace('/~[[:cntrl:]]~/', '', $programJSON['body'][0]['value']).'</p>
			<!-- /wp:paragraph -->
			'.$acf_block.'
		';
		
		$formatted_post_title = preg_replace('/~[[:cntrl:]]~/', '', $programJSON['field_formatted_title'][0]['value']);
		
		// 
		$postarr = [
			'ID'			=> 		$post_ID,
			'post_type' 	=> 		'nu_programs',
			'post_status' 	=> 		'publish',
			'post_content'	=>		$working_template,
			'post_excerpt' 	=> 		preg_replace('/~[[:cntrl:]]~/', '', $programJSON['body'][0]['value']),
			'post_title'	=> 		$formatted_post_title,
			'meta_input'	=> 		[
				'pim_id'	=> 			$programID,
				'program_location' => $p_location,
				'program_duration' => $p_duration
			],
		];

		// set a variable as the return of wp insert post
		$returned_ID = wp_insert_post( $postarr );

		// set the category
		wp_set_object_terms( $returned_ID, $program_category, 'nu_programs-categories' );

		update_field( 'field_6230e094f19a3', $p_duration, $post_ID );
		update_field( 'field_6230e08df19a2', $p_location, $post_ID );

		
		// try to attach the featured image
		// self::attach_featured_image_to_post( $programJSON['field_hero_image'][0]['uri'], $formatted_post_title.' featured image', $post_ID );

	}
		
	public static function attach_featured_image_to_post( $image_url, $image_name, $post_id ){
		// Add Featured Image to Post
		// $image_url        = 'http://s.wordpress.org/style/images/wp-header-logo.png'; // Define the image URL here
		// $image_name       = 'wp-header-logo.png';
		$upload_dir       = wp_upload_dir(); // Set upload folder
		$image_data       = file_get_contents($image_url); // Get image data
		$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
		$filename         = basename( $unique_file_name ); // Create image file name

		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
				$file = $upload_dir['path'] . '/' . $filename;
		} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
		}

		// Create the image  file on the server
		file_put_contents( $file, $image_data );

		// Check image file type
		$wp_filetype = wp_check_filetype( $filename, null );

		// Set attachment data
		$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_status'    => 'inherit'
		);

		// Create the attachment
		$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		// Include image.php
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		// Define attachment metadata
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		// Assign metadata to attachment
		wp_update_attachment_metadata( $attach_id, $attach_data );

		// And finally assign featured image to post
		set_post_thumbnail( $post_id, $attach_id );
	}

	
	
}

add_action('nu__pullPrograms_cron', array( 'PIM_Handler', '_init' ) );

// 
// 
?>