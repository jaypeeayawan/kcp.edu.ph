<?php
if ( ! is_active_sidebar( 'sidebar-2' ) || ! function_exists( 'WC' ) ) {
	return;
}
$product_layout    = edupro_get_setting( 'product_layout' );
$woo_single_layout = edupro_get_setting( 'woo_single_layout' );
if ( ( ( is_shop() ||is_product_category() || is_product_tag() ) && 'no-sidebar' == $product_layout )
     || ( is_product() && 'no-sidebar' == $woo_single_layout )
) {
	return;
}

$class = '';
if ( is_product() ) {
	if ( 'sidebar-right' == $woo_single_layout ) {
		$class .= 'col-md-3';
	} else {
		$class .= 'col-md-3 col-md-pull-9';
	}
} else {
	if ( 'sidebar-right' == $product_layout ) {
		$class .= 'col-md-3';
	} else {
		$class .= 'col-md-3 col-md-pull-9';
	}
}

?>
<div class="sidebar__woocommerce add_sticky_sidebar <?php echo esc_attr( $class ); ?>">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside><!-- #secondary -->
</div>
