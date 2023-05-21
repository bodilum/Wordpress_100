<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
?>
<form role="search" class="bs-search search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
    	<label class="screen-reader-text">
    		<?php echo esc_html__( 'Search for:', 'swipy' ); ?>
    	</label>
        <input type="search" placeholder="<?php esc_attr_e( 'Searching...', 'swipy' ); ?>" name="s" class="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <button type="submit"  value="Search"><i class="fi fi-rr-search"></i></button>
    </div>
</form>