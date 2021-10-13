<?php
/**
 * 
 */
// 

// * the pattern is the pattern
$guides = [];
$return = '';


get_header(); // ?	open <main>



echo '<div class="blocks--wrapper">';
?>

<section class="searchresults">

	<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
		<button type="submit" title="Click here or press enter to perform search"></button>
		<input class="search-input" type="search" name="s" placeholder="<?php _e( 'Search...', 'nu-start' ); ?>" value="<?=(!empty($_GET['s'])?$_GET['s']:'')?>">
		<button id="resetsearch" class="reset" type="reset" title="Click here to clear current search"></button>
	</form>

	<p class="searchsummary"><?php echo sprintf( __( '%s Search Results ', 'nu-start' ), $wp_query->found_posts ); ?></p>

	<?php
		$guides['result'] = '
			<article id="post-%1$s" %2$s>
				<a href="%3$s" title="%4$s">
					%5$s
					<div class="content">
						<h2>%4$s</h2>
						<p><span>%3$s</span></p>
						<p><span>%6$s %7$s</span></p>
					</div>
				</a>
			</article>
		';

		$searchResults = '<section class="searchresults">';

		if (have_posts()): while (have_posts()) : the_post();


			if( !empty( get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) ) ){
				$description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
			}
			else {
				$description = get_the_excerpt( get_the_ID() ) ?: '';
			}


			$thumbnail = has_post_thumbnail() ? '<div class="thumbnail">' . get_the_post_thumbnail( get_the_ID(), array(120,120) ) . '</div>' : '';

			$searchResults .= sprintf(
				$guides['result']
				,get_the_ID()
				,'class="'.join( ' ', get_post_class('',get_the_ID()) ).'"'
				,get_the_permalink()
				,get_the_title()
				,$thumbnail
				,get_the_time('F j, Y')
				,(!empty($description)?' - '.$description:'')
			);

		endwhile; endif;

		$searchResults .= '</section>';

		echo $searchResults;

		//
		?>

	<div class="pagination">
		<?php nu__do_pagination(); ?>
	</div>

</section>

<?php

echo '</div>';


get_footer(); // ?	close </main>


// 
?>