<?php
/**
 * 
 */
// 

class PIM_Program
{

	private static $general_requirements;
	private static $course_lists;
	private static $concentrations;

	// mess making time!
	private static $formattedTitle;
	private static $transformPoints;

	// ? use property arrays to group data into sections based off the front end template
	private static $introduction_section;
	private static $overview_section;
	private static $curriculum_section;
	private static $students_section;
	private static $faculty_section;
	private static $admissions_section;
	private static $also_interested_section;
	private static $experiential_section;

	private static $marketo_forms;


	// todo: holy cow reduce the above insanity to something like this
	private static $destructuredData;

	private static $applyLinkButton;



	private static function build_the_curriculum_section($data){

		$guides = [];
		$return = '';
		
		$L1 = [
			'id' => self::$curriculum_section['field_curriculum']['id'],
			'title' => self::$curriculum_section['field_curriculum']['title'][0]['value'],
			'year' => self::$curriculum_section['field_curriculum']['field_catalog_year'][0]['value'],
		];

		$L2 = [
			'title' => self::$curriculum_section['field_curriculum']['field_level_1_group']['entities'][0]['title'][0]['value'],
			'type' => self::$curriculum_section['field_curriculum']['field_level_1_group']['entities'][0]['field_group_type'][0]['value']
		];

		$L3 = self::$curriculum_section['field_curriculum']['field_level_1_group']['entities'][0]['field_group_level_2']['entities'][0];
		
	
		echo '<h4>Keys:</h4>';
		print_r(array_keys($L3));
		// print the data for this level
		echo '<h4>Data:</h4>';
		print_r($L3);
		
		return $return;
	}

	
	private static function build_meta_and_navigation($data){
		
		$return = '';

		
		$guides['jumpnav'] = '
			<div class="programs-jumpnav">
				<div>
					<ul>
						%1$s
						%2$s
						%3$s
						%4$s
						%5$s
						%6$s
					</ul>
				</div>
				<div>
					%7$s
					%8$s
				</div>
			</div>
		';


		$guides['pre-intro'] = '
			<div class="program-intro">
				<h4 class="is-style-display">%1$s</h4>
				<h2 class="is-style-display">%2$s</h2>
				<p>%3$s: %4$s</p>
			</div>
		';

		$return .= sprintf(
			$guides['pre-intro'],
			self::$introduction_section['field_college'],
			self::$introduction_section['field_formatted_title'],
			self::$introduction_section['field_degree_type'],
			self::$introduction_section['field_area_of_study']
		);


		$return .= sprintf(
			$guides['jumpnav'],
			!empty(self::$overview_section) ? '<li><button class="button" onclick="window.location.href=\'#overview-section\'">Overview</button></li>' : '',
			!empty(self::$admissions_section) ? '<li><button class="button" onclick="window.location.href=\'#admissions-section\'">Admissions</button></li>' : '',
			!empty(self::$curriculum_section) ? '<li><button class="button" onclick="window.location.href=\'#curriculum-section\'">Curriculum</button></li>' : '',
			!empty(self::$experiential_section) ? '<li><button class="button" onclick="window.location.href=\'#experience-section\'">Experience</button></li>' : '',
			!empty(self::$faculty_section) ? '<li><button class="button" onclick="window.location.href=\'#faculty-section\'">Faculty</button></li>' : '',
			!empty(self::$students_section) ? '<li><button class="button" onclick="window.location.href=\'#students-section\'">Students</button></li>' : '',
			'<a href="'.self::$introduction_section['applylink'].'" class="button" target="_blank">Apply</a>',
			'<button class="button" onclick="window.location.href=\'#find-out-more\'">Request Info</button>'
		);

		echo $return;
		
	}
	
	private static function build_intro_before_overview($data){

		$return = '';

		
		$guides['intro-before-overview'] = '
			<div class="intro-before-overview">
				%1$s
				%2$s
			</div>
		';

		$statBoxes = '<ul>';
		$statBoxes .= !empty(self::$introduction_section['field_location']) ? '<li><div><p>'.self::$introduction_section['field_location'].'</p><p>Location</p></div></li>' : '';
		$statBoxes .= !empty(self::$introduction_section['field_duration']) ? '<li><div><p>'.self::$introduction_section['field_duration'].'</p><p>Duration</p></div></li>' : '';
		$statBoxes .= !empty(self::$introduction_section['field_visa_eligible']) ? '<li><div><p>'.self::$introduction_section['field_visa_eligible'].'</p><p>Meets F1 Visa Requirements</p></div></li>' : '';
		$statBoxes .= !empty(self::$introduction_section['field_commitment']) ? '<li><div><p>'.self::$introduction_section['field_commitment']['full_time'].'</p><p>'.self::$introduction_section['field_commitment']['part_time'].'</p></div></li>' : '';
		$statBoxes .= '</ul>';


		
		$return = sprintf(
			$guides['intro-before-overview'],
			self::$introduction_section['body'],
			$statBoxes
		);
		
		
		echo $return;
		
	}
	
	private static function build_the_overview_section($data){

		$return = '';
		
		$guides['overview-section'] = '
			<section class="overview">
				<span class="anchor" id="overview-section">Overview</span>
				%1$s
				%2$s
			</section>
		';


		if( !empty(self::$overview_section) ){

			$maybe_testimonials = '';
			if( self::$overview_section['field_testimonials'] ){
				
				$maybe_testimonials .= '<div class="testimonials"><h4>Testimonials</h4><div class="container">';

				
				foreach( self::$overview_section['field_testimonials'] as $testimonial ){

					$maybe_testimonials .= sprintf(
						'
							<div class="testimonial">
								<div class="quote">%1$s</div>
								<div class="source"><strong>%2$s</strong></div>
							</div>
						',
						'<p class="has-larger-font-size">'.$testimonial['field_quote'].'</p>',
						$testimonial['field_source']
					);

				}

				$maybe_testimonials .= '</div></div>';

			}

			$return .= sprintf(
				$guides['overview-section'],
				'<div class="main-content">'.self::$overview_section['field_program_description_long'].'</div>',
				$maybe_testimonials
			);
			
		}

		
		echo $return;
	}
	
	private static function build_the_admissions_section($data){

		$return = '';
		
		$guides['admissions-section'] = '
			<section class="admissions">
				<span class="anchor" id="admissions-section">Admissions</span>
				%1$s
				%2$s
			</section>
		';


		if( !empty(self::$admissions_section) ){

			$return .= sprintf(
				$guides['admissions-section'],
				'<div class="main-content">'.self::$admissions_section['field_admissions_section_intro_text'].'</div>',
				self::$applyLinkButton
			);
			
		}

		
		echo $return;
	}


	/**
	 * the Constructor
	 */
	public function __construct( $programID ){

		// * clean up the data array some (maybe not needed tbh)
		$data = self::get_program_data($programID);
		$data = self::array_remove_empty($data);
		self::do_build_sections($programID, $data);

		var_dump($data);

	}


	private static function do_build_sections( $programID, $data ){


		self::$formattedTitle = $data['field_formatted_title'][0]['value'];

		self::$destructuredData = [];
		self::$destructuredData['apply-link'] = $data['field_apply_link_transform']['value'] ?? '';
		
		self::$applyLinkButton = !empty(self::$destructuredData['apply-link']) && isset(self::$formattedTitle) ? sprintf(
			'<a class="button" href="%1$s" target="_blank" title="Apply to '.self::$formattedTitle.' [ will open new tab / window ]">Apply Now</a>',
			self::$destructuredData['apply-link']
		) : '';


		// todo: idk what these really are yet
		self::$transformPoints['field_experiential_transform'] = $data['field_experiential_transform'];
		self::$transformPoints['field_requirements_transform'] = $data['field_requirements_transform'];
		

		// * deconstruct data into our required properties

			// ? The "Intro" section above the overview (cuttable maybe)
			self::$introduction_section['field_college'] = $data['field_program_family']['entities'][0]['field_college']['entities'][0]['title'][0]['value'];
			self::$introduction_section['field_formatted_title'] = $data['field_formatted_title'][0]['value'];
			self::$introduction_section['body'] = $data['body'][0]['value'];
			self::$introduction_section['applylink'] = $data['field_apply_link_transform']['value'];
			self::$introduction_section['field_degree_type'] = $data['field_degree_type']['entities'][0]['name'][0]['value'];
			self::$introduction_section['field_area_of_study'] = $data['field_area_of_study']['entities'][0]['name'][0]['value'];

			// ? stat boxes
			self::$introduction_section['field_duration'] = $data['field_duration'][0]['value'];
			self::$introduction_section['field_visa_eligible'] = !empty($data['field_visa_eligible'][0]['value']) ? 'Yes' : 'No';
			self::$introduction_section['field_location'] = $data['field_location']['entities'][0]['name'][0]['value'];
			self::$introduction_section['field_commitment'] = [];
			self::$introduction_section['field_commitment']['full_time'] = $data['field_commitment']['entities'][0]['name'][0]['value'];
			self::$introduction_section['field_commitment']['part_time'] = $data['field_commitment']['entities'][1]['name'][0]['value'];
		
			// 
			// OVERVIEW SECTION
			self::$overview_section['field_program_description_long'] = $data['field_program_description_long'][0]['value'];
			if( !empty($data['field_testimonials']['entities'])){

				foreach( $data['field_testimonials']['entities'] as $testimonial ){
					
					self::$overview_section['field_testimonials'][] = [
						'field_quote' 	=> $testimonial['field_quote'][0]['value'],
						'field_source' 	=> $testimonial['field_source'][0]['value'],
					];
		
				}
				
			}
		// TODO:
		
		

		
		
		
		
		
		
		// ADMISSIONS SECTION
		self::$admissions_section['field_admissions_section_intro_text'] = $data['field_admissions_section_intro_text']['value'];
		self::$admissions_section['field_admissions_intro_text'] = $data['field_admissions_intro_text'][0]['value'];
		self::$admissions_section['field_admissions_deadlines_intro_text'] = $data['field_admissions_deadlines']['value']['intro_text'];

		if( isset( $data['field_admissions_deadlines']['value']['tables'] ) ){

			foreach( $data['field_admissions_deadlines']['value']['tables'] as $deadline_table ){
	
				self::$admissions_section['field_admissions_deadlines'][] = [ 
					'semester' => $deadline_table['title'],
					'text' => $deadline_table['rows'][0][0],
					'date' => $deadline_table['rows'][0][1]
				];
	
			}

		}
		
		self::$admissions_section['field_finance_tuition_calc'] = $data['field_finance_tuition_calc'][0]['value'];
		self::$admissions_section['field_admissions_tables'] = $data['field_admissions_tables'];
		self::$admissions_section['field_admissions_links'] = $data['field_admissions_links'];
		self::$admissions_section['field_financial_links'] = $data['field_financial_links'];
		self::$admissions_section['field_finance_blocks'] = $data['field_finance_blocks'];

		// CURRICULUM SECTION
		self::$curriculum_section['field_curriculum'] = $data['field_curriculum']['entities'][0];
		self::$curriculum_section['field_curriculum_disclaimer'] = $data['field_curriculum_disclaimer'];

		// EXPERIENTIAL LEARNING SECTION
		self::$experiential_section['field_program_experience'] = $data['field_program_experience'];

		// FACULTY SECTION
		self::$faculty_section['field_faculty_section_intro_text'] = $data['field_faculty_section_intro_text'];
		
		// STUDENTS SECTION
		self::$students_section['field_student_section_intro_text'] = $data['field_student_section_intro_text'];
		self::$students_section['field_students_overview'] = $data['field_students_overview'];

		// ALSO INTERESTED SECTION
		self::$also_interested_section['field_related_program'] = $data['field_related_program'];
		self::$also_interested_section['field_related_program_2'] = $data['field_related_program_2'];



		// MARKETO FORMS
		self::$marketo_forms['field_marketo_form_one'] = $data['field_marketo_form_one'];
		self::$marketo_forms['field_marketo_form_two'] = $data['field_marketo_form_two'];
		self::$marketo_forms['field_marketo_form_three'] = $data['field_marketo_form_three'];
		self::$marketo_forms['field_marketo_form_four'] = $data['field_marketo_form_four'];

		// self::build_meta_and_navigation($data);
		// self::build_intro_before_overview($data);
		// self::build_the_overview_section($data);
		// self::build_the_admissions_section($data);
		// self::build_the_curriculum_section($data);
		
	}



	
	private static function get_program_data($programID){
		$all_pim_json_files = glob( get_template_directory() . '/classes/pim-pulls/*.json');
		foreach( $all_pim_json_files as $programFile ){				
			if( preg_match('/program-([\d]*)/', $programFile, $matches) ){
				$fileID = $matches[1];
				if( $fileID == $programID ){
					$programData = file_get_contents( $programFile );
					$programJSON = json_decode( $programData, true );
					return $programJSON;
				}
			}
		}
	}


	private static function array_remove_empty($haystack) {
		foreach ($haystack as $key => $value) {
			if (is_array($value)) {
				$haystack[$key] = self::array_remove_empty($haystack[$key]);
			}

			if (empty($haystack[$key])) {
				unset($haystack[$key]);
			}
		}

		return $haystack;
	}


	
}











// 
?>