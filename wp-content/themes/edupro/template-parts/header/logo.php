<div class="site-branding">
	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
		<?php the_custom_logo(); ?>
	<?php else : ?>
		<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
</div><!-- .site-branding -->
