<header  class="header--s4" role="banner">
	<div class="container container__header">
		<div class="logo-img">
			<div class="logo-img__logo">
				<?php get_template_part( 'template-parts/header/logo' ); ?>
			</div>
			<div class="header-banner">
				<a href="#" target="_blank">
					<?php
					$header_banner = edupro_get_setting( 'header_banner' );
					$header_banner = $header_banner ? $header_banner : edupro_get_setting_default( 'header_banner' );
					?>
					<img src="<?php echo esc_url( $header_banner ); ?>" alt="Banner">
				</a>
			</div>
		</div>
	</div>
	<div id="masthead" class="site-header container__navbar">
		<div class="container">
			<div class="site-header__content">
				<?php get_template_part( 'template-parts/header/cart_search_social' ); ?>
				<?php get_template_part( 'template-parts/header/menu' ); ?>
			</div>
		</div>
	</div>
</header><!-- #masthead -->
