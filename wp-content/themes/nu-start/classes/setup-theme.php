<?php
/**
 *
 *
 * 	Setup The Theme
 *
 *
 */
class SetupTheme
{

	// ?
	public static function _init(){

		// 
		add_action( 'wp_enqueue_scripts', 'SetupTheme::enqueue_scripts' );

		// 
		add_action( 'admin_enqueue_scripts', 'SetupTheme::admin_enqueue_scripts' );
		
		// 
		add_action( 'after_setup_theme', 'SetupTheme::after_setup_theme' );

		// 
		add_action( 'enqueue_block_editor_assets', 'SetupTheme::block_editor_scripts' );
		
		// 
		add_action( 'init', 'SetupTheme::init' );
		
		// 
		add_action( 'acf/init', 'SetupTheme::_handle_acf_init' );

		// 
		add_action( 'widgets_init', 'SetupTheme::nu__register_sidebars' );

		// 
		add_action( 'admin_menu', 'SetupTheme::_do_admin_menu_handler' );
		

		// 
		SetupTheme::clean_head();
	}


	public static function _do_admin_menu_handler(){


		// ? add reusable blocks to the main menu to allow editor access
		add_menu_page(
			'Reusable Blocks',
			'Reusable Blocks',
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-editor-table',
			'3.1'
		);

	}



	
	
	// ?
	public static function enqueue_scripts(){
		SetupTheme::_do_enqueueStyles();
		SetupTheme::_do_enqueueScripts();
	}


	// ?
	public static function  block_editor_scripts(){
		
		// fonts only loaded in the block editor (for blocks)
		wp_enqueue_style( 'nu-block-editor-fonts', get_template_directory_uri() . '/__precomp/build/css/fonts.css', array(), filemtime( get_template_directory() . '/__precomp/build/css/fonts.css' ) );

		// stylesheet only loaded in the block editor (for blocks)
		// ? this lets us "ram in" a stylesheet; but we already have the hook in add_theme_support( 'editor-styles' );
		// wp_enqueue_style( 'nu-blocks-styles', get_template_directory_uri() . '/__precomp/build/css/blocks-styles.css', [], filemtime( get_template_directory() . '/__precomp/build/css/blocks-styles.css' ) );
		
		// scripts only loaded in the block editor (for blocks)
		wp_enqueue_script( 'nu-block-editor', get_template_directory_uri() . '/__precomp/build/js/editor-min.js', array( 'wp-blocks' ), filemtime( get_template_directory() . '/__precomp/build/js/editor-min.js' ), true );
	}
	

	// ?
	public static function after_setup_theme(){

		// make theme available for translation.
		load_theme_textdomain( 'nu-start', get_template_directory() . '/languages' );


		add_filter('acf/settings/save_json', function() {
			return get_template_directory() . '/acf-json';
		});

		add_filter('acf/settings/load_json', function($paths) {
			$paths = array(get_template_directory() . '/acf-json');

			if(is_child_theme())
			{
				$paths[] = get_template_directory() . '/acf-json';
			}

			return $paths;
		});
		

		// add / remove theme supports
		SetupTheme::_manage_theme_supports();

		// register our nav menus
		register_nav_menus(array(
			'header' => esc_html__( 'Header', 'nu-start' )
			,'footer_1' => __( 'Footer', 'nu-start' )
			,'footer_2' => __( 'Footer (2nd column)', 'nu-start' )
			,'utility' => __( 'Utility Nav', 'nu-start' )
			,'sidebar_menu_1' => __( 'Experimental Sidebar Nav', 'nu-start' )
		));

	}

	/**
	 * sets up our block-based widget areas aka. "sidebars"
	 *
	 * @return void
	 */
	public static function nu__register_sidebars() {


		/* Register the 'sample' sidebar. */
		register_sidebar(
			array(
				'id'            => 'sidebar-sample',
				'name'          => __( 'Sample Sidebar' ),
				'description'   => __( 'The "sidebar" refers to a block editor widget area we can place into templates.' ),
				'before_widget' => '<div id="%1$s" class="widget nu__alerts %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'footer-engagement',
				'name'          => __( 'Footer Area Engagement' ),
				'description'   => __( 'Create an engagement area in the footer, like a form.' ),
				'before_widget' => '<div id="%1$s" class="widget nu__footer-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'footer-social',
				'name'          => __( 'Footer Area Social' ),
				'description'   => __( 'Create social media links area.' ),
				'before_widget' => '<div id="%1$s" class="widget nu__footer-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'alerts-frontpage',
				'name'          => __( 'Alerts: Front Page' ),
				'description'   => __( 'These alerts (should) appear only on the front (home) page.' ),
				'before_widget' => '<div id="%1$s" class="widget nu__alerts nu__alerts-frontpage %2$s">',
				'after_widget'  => '<span class="material-icons-outlined closeicon">highlight_off</span></div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);
		register_sidebar(
			array(
				'id'            => 'alerts-sitewide',
				'name'          => __( 'Alerts: Sitewide' ),
				'description'   => __( 'These alerts (should) appear everywhere.' ),
				'before_widget' => '<div class="nu__alerts--wrapper"><div id="%1$s" class="widget nu__alerts nu__alerts-sitewide %2$s">',
				'after_widget'  => '<span class="material-icons-outlined closeicon">highlight_off</span></div></div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);

		// ? lets try a "real" sidebar?
		register_sidebar(
			array(
				'id'            => 'experimental-sidebar-as-menu',
				'name'          => __( 'Experimental Sidebar Menu' ),
				'description'   => __( 'This works towards having a template level sidebar nav (instead of the header, or in tandem)' ),
				'before_widget' => '<div class="nu__sidebar_menu--experimental"><div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			)
		);


	}




	// ?
	public static function init(){



	}
	

	// ?
	public static function _do_enqueueScripts(){

		// register main theme scripts
		wp_register_script(
			'main'
			, get_template_directory_uri() . '/__precomp/build/js/main-min.js'
			, array('jquery')
			, filemtime(get_template_directory() . '/__precomp/build/js/main-min.js')
			, true
		);

		// register experimental theme scripts
		wp_register_script(
			'experimental'
			, get_template_directory_uri() . '/__precomp/build/js/experimental-min.js'
			, array('jquery', 'main')
			, filemtime(get_template_directory() . '/__precomp/build/js/experimental-min.js')
			, true
		);

		// register theme main menu nav scripts
		wp_register_script(
			'nav'
			, get_template_directory_uri() . '/__precomp/build/js/nav-min.js'
			, array()
			, filemtime(get_template_directory() . '/__precomp/build/js/nav-min.js')
			, true
		);

		// register magnific scripts
		wp_register_script(
			'magnific'
			, get_template_directory_uri() . '/__precomp/vendor/js/jquery.magnific-popup.min.js'
			,array()
			,false
			,true
		);

		// register select2 core scripts
		wp_register_script(
			'select2'
			, get_template_directory_uri() . '/__precomp/vendor/js/select2.min.js'
			,array()
			,false
			,true
		);

		// register select2 core scripts
		wp_register_script(
			'selectize'
			, get_template_directory_uri() . '/__precomp/vendor/js/selectize.min.js'
			,array()
			,false
			,true
		);

		self::localize_developer_panel();
		
		wp_enqueue_script( 'select2' );
		wp_enqueue_script( 'selectize' );
		wp_enqueue_script( 'magnific' );
		wp_enqueue_script( 'nav' );

		if( is_page_template( 'templates/experimental.php' ) ){
			wp_enqueue_script( 'experimental' );
		}

		wp_enqueue_script( 'block-posts-grid', get_template_directory_uri() . '/__precomp/build/js/blocks/posts-grid-min.js', array('jquery'), '', true );

		wp_localize_script(
			'block-posts-grid',
			'postsgrid_ajax_object',
			array(
					'phpversion' => PHP_VERSION,
					'ajaxurl'    => admin_url( 'admin-ajax.php' ),
					'ajax_nonce' => wp_create_nonce( 'postsgrid_ajax_object' )
			)
		);
		
		
	}

	public static function localize_developer_panel(){

		$current_theme = wp_get_theme();
		$devPanel = '
			<aside id="nu_dev_utility">
				<div class="devkit-title">
					<p class="devkit">Dev Kit</p>
					<span class="material-icons-outlined nu__icon nu__icon--collapse">chevron_left</span>
					<span class="material-icons-outlined nu__icon nu__icon--expand">chevron_right</span>
				</div>
				<section>
					<p class="window-width">windowWidth: <span></span></p>
					<p class="current-theme">theme: <span>'.$current_theme->get('Name').'</span></p>
				</section>
			</aside>
		';
		$themeInfo = array(
			'devpanel' 			=> 	$devPanel,
			'active-theme'		=>	$current_theme->get('Name'),
		);
		
		wp_enqueue_script( 'main' );

		wp_localize_script( 'main', '$theme_info', $themeInfo );
		
	}

	// ?
	public static function _do_enqueueStyles(){


		// deregister default jQuery
		wp_deregister_script('jquery'); 
		// register jQuery v3.4.1
		wp_enqueue_script('jquery', get_template_directory_uri().'/__precomp/vendor/js/jquery.min.js', array(), null, true);
		// register fonts
		wp_enqueue_style( 'nu-site-fonts', get_template_directory_uri() . '/__precomp/build/css/fonts.css', array(), filemtime( get_template_directory() . '/__precomp/build/css/fonts.css' ) );
		// register magnific popup
		wp_register_style(
			'magnific'
			, get_template_directory_uri() . '/__precomp/vendor/css/magnific-popup.css'
		);

		// ? register selectize boostrap 5 stylesheet
		wp_register_style(
			'selectize'
			, get_template_directory_uri() . '/__precomp/vendor/css/selectize.bootstrap5.css'
		);
		// register select2 (core styles)
		wp_register_style(
			'select2'
			, get_template_directory_uri() . '/__precomp/vendor/css/select2.min.css'
		);
		// register select2 (bootstrap 4 theme styles)
		wp_register_style(
			'select2-theme'
			, get_template_directory_uri() . '/__precomp/vendor/css/select2-bootstrap4.min.css'
		);

		// register main theme stylesheet
		wp_register_style(
			'main'
			,get_template_directory_uri() . '/__precomp/build/css/main.css'
			,array()
			,filemtime(get_template_directory() . '/__precomp/build/css/main.css')
		);

		// register patterns stylesheet
		wp_register_style(
			'patterns'
			,get_template_directory_uri() . '/__precomp/build/css/patterns/patterns.css'
			,array()
			,filemtime(get_template_directory() . '/__precomp/build/css/patterns/patterns.css')
		);


		// enqueue the registered styles
		wp_enqueue_style( 'magnific' );
		wp_enqueue_style( 'selectize' );
		wp_enqueue_style( 'select2' );
		wp_enqueue_style( 'select2-theme' );
		wp_enqueue_style( 'main' );
		wp_enqueue_style( 'patterns' );


	}
	

	// ?
	public static function admin_enqueue_scripts(){		

		//
		wp_register_style(
			'admin'
			, get_template_directory_uri() . '/__precomp/build/css/admin.css'
			, array()
			, filemtime(get_template_directory() . '/__precomp/build/css/admin.css')
		);
		//
		wp_enqueue_style( 'admin' );
		//
		wp_enqueue_script( 'admin' );

	

	}


	/**
	 * add/remove for actions and filters to clean up the wp_head action and the <head> on the front end
	 *
	 * @return void
	 */
	public static function clean_head(){

		// add / remove actions
		remove_action( 'wp_head', 'rsd_link' ); 									// remove really simple discovery link
		remove_action( 'wp_head', 'wp_generator' ); 								// remove wordpress version
		remove_action( 'wp_head', 'feed_links', 2); 								// remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
		remove_action( 'wp_head', 'feed_links_extra', 3); 						// removes all extra rss feed links
		remove_action( 'wp_head', 'index_rel_link' ); 							// remove link to index page
		remove_action( 'wp_head', 'wlwmanifest_link' ); 							// remove wlwmanifest.xml (needed to support windows live writer)
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0); 				// remove random post link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0); 				// remove parent post link
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0); 			// remove the next and previous post links
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action( 'wp_head', 'print_emoji_detection_script', 7);
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); 				// Remove shortlink
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );


		// add / remove filters
		add_filter( 'emoji_svg_url', '__return_false' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	}



	// ?
	/**
	 * 	manage wordpress theme supports i.e. add_theme_support('custom-logo')
	 *	see the /theme.json as well
	 * @return void
	 */
	public static function _manage_theme_supports(){

		// ? theme supports that are unrelated to gutenberg
		add_post_type_support( 'page', 'excerpt' );						// let pages have excerpts
		add_theme_support( 'title-tag' ); 								// lets WP handle <document> title
		add_theme_support( 'customize-selective-refresh-widgets' ); 	// Add theme support for selective refresh for widgets.
		add_theme_support( 'body-open' );								// enable wp_body_open filter
		add_theme_support( 'automatic-feed-links' ); 					// add RSS feed links to head
		add_theme_support( 'custom-logo', [								// enable custom logo (not really required we use svg)
			'height'               => 100,
			'width'                => 300,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		]);
		add_theme_support( 'post-formats', array(						// enable post-formats
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		));
		add_theme_support( 'post-thumbnails' ); 						// enable support for post thumbnails on posts and pages
		add_theme_support( 'responsive-embeds' );						// enable responsive embeds
		add_theme_support( 'html5', array( 								// enable html5 support everywhere
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		));

		// ? theme supports related to the block editor
		add_theme_support( 'align-wide' );									// enable wide alignment for blocks
		add_theme_support( 'wp-block-styles' );							//  enable fully opinionated block styles
		add_theme_support( 'custom-spacing' );
		// 
		remove_theme_support( 'core-block-patterns' ); 					// remove the "patterns" library
		// remove_theme_support( 'block-templates' );
		/* 
			* this only goes in the block editor!
			! NOTE 
			? From WP Documentation:

			"To make sure your styles are applied only to the content of the editor,
				we automatically transform your editor styles by selectively rewriting or adjusting certain CSS selectors.
			This also allows the block editor to leverage your editor style in block variation previews.
				For example, if you write body { ... } in your editor style, this is rewritten to .editor-styles-wrapper { ... }"
			! This also means that you should not target any of the editor class names directly.
		 */
		add_theme_support( 'editor-gradient-presets', [] ); // remove the preset gradients in wp core
		add_theme_support( 'editor-styles' );
		// add_editor_style( get_template_directory_uri() . '/__precomp/build/css/editor-style.css' );
		add_editor_style( '__precomp/build/css/editor-style.css' );
		


		// ! this is causing some problems
		// add_filter( 'should_load_separate_core_block_assets', '__return_true' );

		
		
	}


	/**
	 * 	manage acf extended plugin modules; disable to reduce ui complexity etc
	 *
	 * @return void
	 */
	public static function _handle_acf_init(){

		// Disable Options Pages ACFE Module
		acf_update_setting('acfe/modules/options_pages', false);
		// Disable Post Types ACFE Module
		acf_update_setting('acfe/modules/post_types', false);


	}

}
SetupTheme::_init();



?>