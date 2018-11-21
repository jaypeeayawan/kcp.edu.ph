<aside class="mobile-sidebar">
	<a href="#" class="navbar-toggle">
		<i class="fa fa-times"></i>
	</a>
	<?php get_search_form() ?>
	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<nav class="mobile-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'container'      => '',
				'menu_id'        => 'primary-menu-mobile',
				'menu_class'     => 'primary-menu-mobile',
			) );
			?>
		</nav>
	<?php endif; ?>
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'edupro' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-4',
				'container'      => '',
				'menu_class'     => 'socials',
				'menu_id'        => 'social-menu-mobile',
				'depth'          => 1,
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
				'fallback_cb'    => '',
			) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>
</aside>
