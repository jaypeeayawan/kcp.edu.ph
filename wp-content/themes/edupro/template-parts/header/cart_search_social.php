<?php
	$cart_search_social = edupro_get_setting( 'cart_search_social' );

	if( $cart_search_social == 1 ) { ?>
		<!-- Cart -->
		<?php if ( function_exists( 'WC' ) ) : ?>
			<div class="header__cart">
			<?php $count = WC()->cart->get_cart_contents_count(); ?>
			<a href="<?php echo wc_get_cart_url(); ?>"
			   class="cart-contents cart-icon <?php echo esc_attr( $count > 0 ? 'has-item' : '' ); ?>">
				<i class="fa fa-shopping-bag"></i>
				<span class="wrapper-items-number"><span class="items-number"><?php echo esc_html( $count ) ?></span></span>
			</a>
			<div class="widget_shopping_cart_content">
				<?php woocommerce_mini_cart(); ?>
			</div>
			</div>
		<?php endif; ?>

		<!-- Search -->
		<div class="header__search">
			<a href="#" class="search-toggle"><i class="fa fa-search"></i></a>
			<div class="search-popup">
				<div class="search-popup-bg"></div>
				<?php get_search_form() ?>
			</div>
		</div>

	<?php
	} elseif ( $cart_search_social == 2) {
		// Socials
		echo '<div class="social-icon">';
			wp_nav_menu( array(
				'theme_location'  => 'menu-4',
				'container'       => 'nav',
				'container_id'    => 'social-menu',
				'container_class' => 'menu',
				'menu_id'         => 'menu-social-menu-items',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
				'fallback_cb'     => '',
			) );
		echo '</div>';
	} elseif ( $cart_search_social == 0) {
		return 0;
	}
?>