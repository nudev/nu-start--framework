</main>
<?php
/**
 *
 */
//


// * the pattern is the pattern
$return = [];
$guides = [];


// * guide string for the entire footer
$guides['footer'] = '
	<footer class="site-footer">
		<div class="container">
			<section class="footer-siteinfo">%1$s%3$s%4$s</section>
			<section class="footer-content">
				%2$s
				%5$s
			</section>
		</div>
	</footer>
';



$social_media = '';

// * loop thru all social media links
if( !empty(NU__Starter::$themeSettings['social']['social_media']) ){

	foreach( NU__Starter::$themeSettings['social']['social_media'] as $name => $link ){
	
		// ? check for link, then find the custom SVG or bail
		if( !empty($link) && file_exists( get_template_directory() . '/__lib/icons/'.$name.'.svg' ) ){
	
			$customIcon = file_get_contents( get_template_directory() . '/__lib/icons/'.$name.'.svg' );
	
			$social_media .= '<span class="nu__customsvg"><a href="'.$link.'" target="_blank" title="view our '.$name.' profile">'.$customIcon.'</a></span>';
	
		}
	}
	
}




$contact_info = '';
if( !empty(NU__Starter::$themeSettings['social']['contact_info']) ){

	foreach( NU__Starter::$themeSettings['social']['contact_info'] as $name => $link ){
	
		if( !empty($link) ){
			if( $name === 'email' ){
				$contact_info .= '<span><a href="mailto:' . $link . '" target="_blank">' . $link . '</a></span>';
			} else {
				$contact_info .= '<span><a href="tel:' . $link . '" target="_blank">' .preg_replace('/\d{3}/', '$0.', str_replace('.', null, $link), 2). '</a></span>';
			}
		}
	
	
	}
}



$footer_sidebar = '';
if( is_active_sidebar( 'footer-engagement' ) ){
	ob_start();
	dynamic_sidebar( 'footer-engagement' );
	$footer_sidebar = ob_get_clean();
}



$social_icon_sidebar = '';
if( is_active_sidebar( 'footer-social' ) ){
	ob_start();
	dynamic_sidebar( 'footer-social' );
	$social_icon_sidebar = ob_get_clean();
}


$return['footer'] = sprintf(
	$guides['footer']
	,nu__getLogo()
	,has_nav_menu('footer_1') ? nu__getMenu('footer_1') : ''
	,!empty(NU__Starter::$themeSettings['social']['google_address']) ? '<div class="address">' . nu__getGoogleMapAddress(NU__Starter::$themeSettings['social']['google_address']) . '</div>' : ''
	,!empty($social_icon_sidebar) ? $social_icon_sidebar :''
	,$footer_sidebar
);


// ? the empty footer elem enables DRY bottom margin for the site
echo !empty(NU__Starter::$themeSettings['footer']['site_footer']['status']) ? $return['footer'] : '<footer class="site-footer"></footer>';



// ? handle the required global footer element
NU__Starter::nu__showCookieWarning();
NU__Starter::nu__globalFooterElement();

wp_footer();


echo '
</body>
</html>
';

//
?>