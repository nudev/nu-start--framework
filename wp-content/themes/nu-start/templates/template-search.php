<?php /* Template Name: Search Template */

	get_header();

	$utilityNav = wp_get_nav_menu_object('utility menu');

?>	

		<div class="sections">

			<section class="searchresults gcse">
				<br />
				<script>
					if(window.location.href.indexOf('?query=') == -1){	// no query was passed, we need to force one
						window.location.href = "<?=home_url()?>/search/?query=about";
					}
				</script>
				<script>
					<?php if ( NU__Starter::$themeSettings['search']['search_scope'] == 'local'){  //limit to local only search ?>
						var NUGS_specificsite = '<?=str_replace(array('https://','http://'),'',home_url())?>';
						<?php } ?>
					var NUGS_title = '<?=bloginfo('name')?>';
				</script>
		    <script src="https://search.northeastern.edu/nuglobalutils/requests/js/globalsearch.js"></script>
			</section>

		</div>



<?php
	get_footer();
?>