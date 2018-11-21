<?php
if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
$portfolio_layout =  edupro_get_setting( 'portfolio_layout' );

if( 'no-sidebar' == $portfolio_layout ) {
	return;
}
?>
<div class="col-md-3 add_sticky_sidebar">
	<div class="sidebar-portfolio">
	    <?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div>
</div>
