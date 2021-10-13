<?php
/**
 * 
 */
// 

// 
?>

<?php
	if( !empty(NU__Starter::$themeSettings['search']['type_of_search']) == 'wp' &  !empty(NU__Starter::$themeSettings['search']['enable_site_search']) == true ) :
 ?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
<?php
	elseif( !empty(NU__Starter::$themeSettings['search']['type_of_search']) == 'gcse' &  !empty(NU__Starter::$themeSettings['search']['enable_site_search']) == true ) :		
?>
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<label>
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
			<input type="search" class="search-field"
				placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
				value="<?php echo get_search_query() ?>" name="s"
				title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</label>
		<input type="submit" class="search-submit"
			value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>
<?php
	endif;
?>