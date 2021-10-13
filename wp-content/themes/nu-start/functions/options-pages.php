<?php
/**
 *  Add Options Pages
 */
//


if( function_exists('acf_add_options_page') ) {

	// ? cleaner refactored theme settings to reduce how many page reloads initial setup will take
	// acf_add_options_page(array(
	// 	'page_title' 	=> 'NU Start',
	// 	'menu_title'	=> 'NU Start',
	// 	'menu_slug' 	=> 'nu_start_settings',
	// 	'capability'	=> 'manage_options',
	// 	'position' 		=> "3",
	// ));
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Settings',
	// 	'menu_title'	=> 'Theme Settings',
	// 	'parent_slug'	=> 'nu_start_settings',
	// ));
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Brand',
	// 	'menu_title'	=> 'Brand',
	// 	'parent_slug'	=> 'nu_start_settings',
	// ));



	// Main Theme Settings
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'nu_settings',
		'capability'	=> 'edit_private_posts',
		'position' 		=> "2.2",
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Analytics & Seo',
		'menu_title'	=> 'Analytics & Seo',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Appearance',
		'menu_title'	=> 'Appearance',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact & Social',
		'menu_title'	=> 'Contact & Social',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Developers',
		'menu_title'	=> 'Developers',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Global',
		'menu_title'	=> 'Global',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'nu_settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Search',
		'menu_title'	=> 'Search',
		'parent_slug'	=> 'nu_settings',
	));
	
}




//
?>