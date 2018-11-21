<form role="search" method="get" class="header__search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="header__search-field" placeholder="<?php esc_attr_e( 'Enter keyword and press enter...', 'edupro' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
</form>
