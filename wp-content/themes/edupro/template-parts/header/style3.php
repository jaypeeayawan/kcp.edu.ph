<header id="masthead" class="header--s3" role="banner">
	<div class="container container__header">
		<div class="row">
			<div class="col-md-6">
				<?php get_template_part( 'template-parts/header/logo' ); ?>
			</div>
			<div class="col-md-6">
				<div class="social-icon-first">
				<?php if ( has_nav_menu( 'menu-4' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'menu-4',
							'container'       => 'nav',
							'container_id'    => 'social-menu',
							'container_class' => 'menu',
							'menu_id'         => 'menu-social-menu-items',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
							'fallback_cb'     => '',
						)
					);
				} ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row"></div>
	<div class="site-header container__navbar">
		<div class="container">
			<div class="site-header__content">
				<?php get_template_part( 'template-parts/header/cart_search_social' ); ?>
				<?php get_template_part( 'template-parts/header/menu' ); ?>
			</div>
		</div>
	</div>
</header><!-- #masthead -->
