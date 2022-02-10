<?php
/**
 * 	Template Name: Experimental
 */
//  


// * the pattern is the pattern
$guides = [];
$return = '';


get_header(); // ?	open <main>

if( is_active_sidebar( 'alerts-sitewide' ) ){
	dynamic_sidebar( 'alerts-sitewide' );
}

//  
?>

<div class="blocks--wrapper">
	<section class="is-the-template-sidebar is-tucked">
		<?php
			$experimental_sidebar = '';
			if( is_active_sidebar( 'experimental-sidebar-as-menu' ) ){
				ob_start();
				dynamic_sidebar( 'experimental-sidebar-as-menu' );
				$experimental_sidebar = ob_get_clean();
				echo $experimental_sidebar;
			}
		?>
	</section>
	<section class="is-the-template-content">
		<?php the_content(); ?>
	</section>
</div>

<?php
	get_footer();
?>