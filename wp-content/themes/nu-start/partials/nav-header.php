<?php
/**
 * Header Nav
 */
//


// * the pattern is the pattern
$return = '';
$guides = [];

$nu_mobileNavIcon = '<div class="navicons"><span class="material-icons-outlined menu"></span><span class="material-icons-outlined close"></span></div>';



// * header nav guide string
$guides['nav-header'] = '
	<header class="header">
		<a id="skiptomaincontent" href="#main">Skip to content</a>
		%4$s
		<div class="container wide%5$s">
			%1$s
			'.$nu_mobileNavIcon.'
			<div class="navlinks--container">
				%2$s
				%3$s
			</div>
		</div>
	</header>
';


if( !empty( NU__Starter::$themeSettings['header']['status'] ) ){


	$submenu_reveal_type = !empty(NU__Starter::$themeSettings['header']['nav_menu_settings']['submenus_reveal']) ? ' submenus-open-using-'.NU__Starter::$themeSettings['header']['nav_menu_settings']['submenus_reveal'] : '';
	

	// * build the header
	$return .= sprintf(
		$guides['nav-header']
		,nu__get_site_logo()
		,has_nav_menu('header') ? nu__get_nav_menu('header') : ''
		,NU__Starter::nu__includeSiteSearch()
		,has_nav_menu('utility') ? '<div class="utilitynav">'.nu__get_nav_menu('utility').'</div>' : ''
		,$submenu_reveal_type
	);

}

echo $return;



?>