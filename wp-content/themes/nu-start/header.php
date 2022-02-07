<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="description" content="<?php bloginfo('description');?>">
	<meta name="author" content="Northeastern University, http://www.northeastern.edu" />
	<meta name="copyright" content="<?=date('Y');?>">
	<meta name="language" content="english" />
	<meta name="zipcode" content="<?php echo NU__Starter::nu__customGeoTagMetaZip(); ?>" />
	<meta name="city" content="<?php echo NU__Starter::nu__customGeoTagMetaCity(); ?>"/>
	<meta name="state" content="<?php echo NU__Starter::nu__customGeoTagMetaState(); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="//www.google-analytics.com" rel="dns-prefetch">

	<?php
		// todo: existing favicon stuff is super messy and old, so its wrapped up in a function
		echo NU__Starter::_get_all_favicons();

		// ? set any body classes manually
		$bodyClasses = [];
		$bodyClasses[] = NU__Starter::$themeSettings['appearance']['color_palette'] == 'dark' ? 'is-dark-header' : '';
		$bodyClasses[] = !empty(NU__Starter::$themeSettings['header']['status']) ? 'has-local-header' : '';
		$bodyClasses[] = !empty(NU__Starter::$themeSettings['global']['global_header__footer']['status']) ? 'has-nu-global-header-footer' : '';
		$bodyClasses[] = empty(NU__Starter::$themeSettings['dev']['build_status']) ? 'prod--disabled' : '';
		$bodyClasses[] = has_nav_menu('utility') ? 'has-utility-nav' : '';
		
		// ? init wp head
		wp_head();


		// ? handle the required global header / footer scripts
		NU__Starter::nu__globalHeaderFooterScripts();


		// ? will write in the global tag manager scripts if the site is set to production
		NU__Starter::nu__globalTagManagerScript();



		// ? will write in content of the custom analytics options textbox
		// todo: this is hacky at least validate the string
		NU__Starter::nu__customTagManagerScripts();
	?>
</head>
<body <?php body_class($bodyClasses); ?>>
<?php
	
	// ? enables hooking in content right after body opens (think for scripts etc)
	wp_body_open(); 

	// if we want to use the university GATM
	NU__Starter::nu__globalTagManagerBodyScript();

	// ? handle the required global header element
	NU__Starter::nu__globalHeaderElement();

	// ? get the main nav
	include( locate_template('partials/nav-header.php') );
?>
<main id="main">
