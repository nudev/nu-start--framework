<?php
/**
 * Header Nav
 */
//


// * the pattern is the pattern
$return = '';
$guides = [];


// * header nav guide string
$guides['nav-header'] = '
	<header class="header">
		<a id="skiptomaincontent" href="#main">Skip to content</a>
		%4$s
		<div class="container wide">
			%1$s
			%3$s
			%2$s
		</div>
	</header>
';

$nu_mobileNavIcon = '<div class="navicons"><span class="material-icons-outlined menu">menu</span><span class="material-icons-outlined close">close</span></div>';

if( !empty( NU__Starter::$themeSettings['header']['status'] ) ){

	// * build the header
	$return .= sprintf(
		$guides['nav-header']
		,nu__get_site_logo()
		,has_nav_menu('header') ? $nu_mobileNavIcon.nu__get_nav_menu('header') : ''
		,NU__Starter::nu__includeSiteSearch()
		,has_nav_menu('utility') ? '<div class="utilitynav">'.$nu_mobileNavIcon.nu__get_nav_menu('utility').'</div>' : ''
	);

}

echo $return;



?>