<?php
/**
 *
 *
 *
 */
//


class NU__Starter
{



	static $themeSettings = array(
		'seo' => [],
		'appear' => [],
		'social' => [],
		'dev' => [],
		'footer' => [],
		//'general' => [],
		'global' => [],
		'header' => [],
		'search' => [],
	);


	public static function nu__showCookieWarning(){

		if( !is_admin() ){

			$return = '';
			$guides = [];
			$guides['cookiewarning'] = '
				<div id="nu__cookiewarning">
					<p class="has-large-font-size"><strong>Cookies on Northeastern sites</strong></p>
					%1$s
					<span class="closeicon material-icons-outlined"></span>
					<button class="button cookies-accept">Accept and Continue</button>
				</div>
			';
	
	
	
			$return .= sprintf(
				$guides['cookiewarning']
				,'<p class="has-smaller-font-size">This website uses cookies and similar technologies to understand your use of our website and give you a better experience. By continuing to use the site or closing this banner without changing your cookie settings, you agree to our use of cookies and other technologies. To find out more about our use of cookies and how to change your settings, please go to our <a href="https://www.northeastern.edu/privacy-information" title="Privacy information" aria-label="Privacy information" target="_blank" rel="noopener noreferrer">Privacy Statement</a>.</p>'
			);
			
	
			
			echo $return;
			
		}
	}
	

	public static function __init(){
		NU__Starter::$themeSettings = [];
		NU__Starter::$themeSettings['seo'] = get_field('analytics_&_seo_settings', 'option') ?: [];
		NU__Starter::$themeSettings['appearance'] = get_field('appearance_settings', 'option') ?: [];
		NU__Starter::$themeSettings['social'] = get_field('social_settings', 'option') ?: [];
		NU__Starter::$themeSettings['dev'] = get_field('developer_settings', 'option') ?: [];
		NU__Starter::$themeSettings['footer'] = get_field('footer_settings', 'option') ?: [];
		//NU__Starter::$themeSettings['general'] = get_field('general_settings', 'option') ?: [];
		NU__Starter::$themeSettings['global'] = get_field('global_settings', 'option') ?: [];
		NU__Starter::$themeSettings['header'] = get_field('header_settings', 'option') ?: [];
		NU__Starter::$themeSettings['search'] = get_field('search_settings', 'option') ?: [];

		add_filter('acf/fields/google_map/api', 'NU__Starter::nu__update_acf_map_api_key');

	}

	//GEOTAG
	//meta zipcode
	public static function nu__customGeoTagMetaZip(){

		if( empty(NU__Starter::$themeSettings['seo']['geotag']['zip_code']) ){
			return;
		}
		echo NU__Starter::$themeSettings['seo']['geotag']['zip_code'];
	}

	//meta city
	public static function nu__customGeoTagMetaCity(){

		if( empty(NU__Starter::$themeSettings['seo']['geotag']['city']) ){
			return;
		}
		echo NU__Starter::$themeSettings['seo']['geotag']['city'];
	}

	//meta state
	public static function nu__customGeoTagMetaState(){

		if( empty(NU__Starter::$themeSettings['seo']['geotag']['state']) ){
			return;
		}
		echo NU__Starter::$themeSettings['seo']['geotag']['state'];
	}


	public static function _get_all_favicons(){

		return '
			<link rel="apple-touch-icon" sizes="57x57"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-57x57.png?v=2" />
			<link rel="apple-touch-icon" sizes="60x60"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-60x60.png?v=2" />
			<link rel="apple-touch-icon" sizes="72x72"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-72x72.png?v=2" />
			<link rel="apple-touch-icon" sizes="76x76"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-76x76.png?v=2" />
			<link rel="apple-touch-icon" sizes="114x114"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-114x114.png?v=2" />
			<link rel="apple-touch-icon" sizes="120x120"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-120x120.png?v=2" />
			<link rel="apple-touch-icon" sizes="144x144"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-144x144.png?v=2" />
			<link rel="apple-touch-icon" sizes="152x152"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-152x152.png?v=2" />
			<link rel="icon" sizes="144x144" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/android-chrome-144x144.png?v=2" />
			<link rel="icon" sizes="32x32" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-32x32.png?v=2" />
			<link rel="icon" sizes="16x16" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-16x16.png?v=2" />
			<link rel="manifest" href="https://brand.northeastern.edu/global/assets/favicon/manifest.json" />
			<meta name="msapplication-TileImage" content="https://brand.northeastern.edu/global/assets/favicon/mstile-144x144.png?v=2" />
		';
	}


	/**
	 * return a string for the sitesearch
	 *
	 * @return void
	 */
	public static function nu__includeSiteSearch(){

		if( !empty(NU__Starter::$themeSettings['search']['type_of_search']) == 'wp' &  !empty(NU__Starter::$themeSettings['search']['enable_site_search']) == true){
			$str = '<div id="nu__sitesearch">';


			$str .= '<a href="javascript:void(0);" class="nu__sitesearch_toggle"><span class="material-icons-outlined site-search-icon"></span></a>';

			$str .= '
				<div class="nu__sitesearch-form--container">
					<form role="search" method="get" action="'.home_url().'" aria-label="site search form">
						<button type="submit"><span class="material-icons-outlined site-search-icon is-search"></span></button>
						<label for="s"></label>
						<input name="s" id="sitesearch-input" placeholder="Search here..." />
						<button type="button" class="nu__sitesearch-close"><span class="material-icons-outlined is-close"></span></button>
					</form>
				</div>
			';

			$str .= '</div>';

			return $str;

		} 
		
		else if ( !empty(NU__Starter::$themeSettings['search']['type_of_search']) == 'gcse' &  !empty(NU__Starter::$themeSettings['search']['enable_site_search']) == true ){

			$str = '<div id="nu__sitesearch">';


			$str .= '<a href="javascript:void(0);" class="nu__sitesearch_toggle"><span class="material-icons-outlined site-search-icon"></span></a>';

			$str .= '
				<div class="nu__sitesearch-form--container">
					<form role="search" method="get" action="'.home_url().'/search" aria-label="site search form">
						<button type="submit"><span class="material-icons-outlined site-search-icon"></span></button>
						<label for="query"></label>
						<input name="query" id="sitesearch-input" placeholder="Search here..." />
						<button type="button" class="nu__sitesearch-close"><span class="material-icons-outlined">close</span></button>
					</form>
				</div>
			';

			$str .= '</div>';

			return $str;
		}

	}





	/**
	 * Tell it how it is by the way that it does
	 *
	 * @return string the scripts we need from nu global
	 */
	public static function nu__globalHeaderFooterScripts(){


		if( empty(NU__Starter::$themeSettings['global']['global_header__footer']['status']) ){
			return;
		}

		// * do not reorder this
		echo '
			<script src="https://unpkg.com/@northeastern-web/global-elements@^1.0.0/dist/js/index.umd.js" defer></script>
			<link rel="stylesheet" href="https://unpkg.com/@northeastern-web/global-elements@^1.0.0/dist/css/index.css">
			<script src="https://unpkg.com/@northeastern-web/kernl-ui@^2.0.0/dist/js/index.umd.js" defer></script>
		';

	}




	// if we want to use the university GATM
	public static function nu__globalTagManagerScript(){
		if( empty(NU__Starter::$themeSettings['dev']['build_status']) ){
			return;
		}
		if( empty(NU__Starter::$themeSettings['seo']['main_nu_google_analytics']) ){
			return;
		}
		echo "<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WGQLLJ');</script><!-- End Google Tag Manager -->";
	}




	
	// if we want to use the university GATM
	public static function nu__globalTagManagerBodyScript(){
		if( empty(NU__Starter::$themeSettings['dev']['build_status']) ){
			return;
		}
		if( empty(NU__Starter::$themeSettings['seo']['main_nu_google_analytics']) ){
			return;
		}
		echo "<!-- Google Tag Manager (noscript) --><noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-WGQLLJ\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript><!-- End Google Tag Manager (noscript) -->";
	}





	public static function nu__customTagManagerScripts(){
		if( empty(NU__Starter::$themeSettings['dev']['build_status']) ){
			return;
		}
		if( empty(NU__Starter::$themeSettings['seo']['custom_analytics']) ){
			return;
		}
		echo NU__Starter::$themeSettings['seo']['custom_analytics'];
	}








	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function nu__globalHeaderElement(){
		if( empty(NU__Starter::$themeSettings['global']['global_header__footer']['status']) ){
			return;
		}

		$useMenu = 'true';

		$useWordMark = NU__Starter::$themeSettings['global']['global_header__footer']['use_wordmark'] ? 'true' : 'false';

		echo '<div class="itsglobalheader--container"><div id="itsglobalheader" x-data="NUGlobalElements.header({wordmark:'.$useWordMark.', menu:'.$useMenu.'})" x-init="init()"></div></div>';
	}








	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function nu__globalFooterElement(){
		if( empty(NU__Starter::$themeSettings['global']['global_header__footer']['status']) ){
			return;
		}
		echo '<div x-data="NUGlobalElements.footer()" x-init="init()"></div>';
	}




	public static function nu__update_acf_map_api_key( $api ){
		if( empty(NU__Starter::$themeSettings['dev']['google_maps_api_key']) ){
			return;
		}
		$api['key'] = NU__Starter::$themeSettings['dev']['google_maps_api_key'];
		return $api;
	}



}





// * fire the custom construction on init
add_action('acf/init', 'NU__Starter::__init', 10, 2);


//
?>