<?php
// 
// 


class PIM_Handler
{	


	private static $reusableHero;
	
	public static function _init(){

		$endpoints = [
			'https://pim.northeastern.edu/api/v2/program/18826' // MS in Cybersecurity
			,'https://pim.northeastern.edu/api/v2/program/18827' // Molecular Biotech Cert
			,'https://pim.northeastern.edu/api/v2/program/18825' // MPS Applied Machine Intelligence
			,'https://pim.northeastern.edu/api/v2/program/18380' // Master of Science in Bioinformatics
			,'https://pim.northeastern.edu/api/v2/program/18383' // Graduate Certificate in Bioinformatics Portland
			,'https://pim.northeastern.edu/api/v2/program/18385' // Graduate Certificate in Biotechnology
			,'https://pim.northeastern.edu/api/v2/program/18388' // Graduate Certificate in Cloud Software Development
			,'https://pim.northeastern.edu/api/v2/program/18389' // Graduate Certificate in Project Management
			,'https://pim.northeastern.edu/api/v2/program/18397' // Graduate Certificate in Applied Analytics
			,'https://pim.northeastern.edu/api/v2/program/18384' // Master of Professional Studies in Analytics
			,'https://pim.northeastern.edu/api/v2/program/18386' // Master of Science in Project Management
			,'https://pim.northeastern.edu/api/v2/program/18387' // Master of Science in Biotechnology
			,'https://pim.northeastern.edu/api/v2/program/18390' // Master of Science in Computer Science
			,'https://pim.northeastern.edu/api/v2/program/18391' // Master of Science in Computer Science Align
			,'https://pim.northeastern.edu/api/v2/program/18806' // MSDS Portland
			,'https://pim.northeastern.edu/api/v2/program/18807' // MSDS Align Portland
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

		file_put_contents($filename, $programData);

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

		$reusable_hero_string = '';

		$program_category = !empty($programJSON['field_degree_type']['entities'][0]['name'][0]['value']) ? $programJSON['field_degree_type']['entities'][0]['name'][0]['value'] : '';

		if( !isset( self::$reusableHero ) ){

			self::$reusableHero = new WP_Query([
				'post_type' => 'wp_block',
				'title' 	=> 'Hero: All Program Items'
			]);

		}

			
		if( !empty( self::$reusableHero->posts ) ){
			$reusable_hero_string = '<!-- wp:block {"ref":'.self::$reusableHero->posts[0]->ID.'} /-->';
		} else {
			self::$reusableHero = false;
		}
		

		if( !term_exists( $program_category, 'nu_programs-categories' ) ){
			wp_insert_term( $program_category, 'nu_programs-categories' );
		}



		$working_template = '
			'.$reusable_hero_string.'

			<!-- wp:heading {"className":"is-style-display"} -->
			<h2 class="is-style-display">Everything you see was<br>created <strong>automatically on sync</strong>.</h2>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"right","className":"is-style-display"} -->
			<h2 class="has-text-align-right is-style-display">This template was <strong>built in the editor</strong>,<br>and is now part of the Framework.</h2>
			<!-- /wp:heading -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":50} -->
			<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph {"fontSize":"larger"} -->
			<p class="has-larger-font-size">We are now able to build this template freehand in the editor, switch to the code editor view, and directly copy/paste the contents into the framework iteratively, refining existing templates and creating new ones, without ever making destructive edits to our existing work.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":50} -->
			<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph {"fontSize":"larger"} -->
			<p class="has-larger-font-size">A reusable block as a shared hero that includes dynamic content like the post title block and breadcrumbs block allows for zero-touch consistency across each program.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"larger"} -->
			<p class="has-larger-font-size">We now save the program data into the framework assigning only the ID to this post, and have a block that matches the ID to the data and loads a template file.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:acf/nu-program {"id":"block_6105ba18591e0","name":"acf/nu-program","align":"","mode":"preview"} /-->
		';


		$postarr = [
			'ID'			=> 		$post_ID,
			'post_type' 	=> 		'nu_programs',
			'post_status' 	=> 		'publish',
			'post_content'	=>		$working_template,
			'post_excerpt' 	=> 		preg_replace('/~[[:cntrl:]]~/', '', $programJSON['body'][0]['value']),
			'post_title'	=> 		preg_replace('/~[[:cntrl:]]~/', '', $programJSON['field_formatted_title'][0]['value']),
			'meta_input'	=> 		[
				'pim_id'	=> 			$programID
			],
		];

		// set a variable as the return of wp insert post
		$returned_ID = wp_insert_post( $postarr );
		wp_set_object_terms( $returned_ID, $program_category, 'nu_programs-categories' );

	}
		
		

	
	
}

add_action('nu__pullPrograms_cron', array( 'PIM_Handler', '_init' ) );

// 
// 
?>