<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'edupro' ); ?></button>
	<a href="#" class="navbar-toggle">
		<div class="burger-sidebar">
			<span class="menu-icon-bar"></span>
			<span class="menu-icon-bar"></span>
			<span class="menu-icon-bar"></span>
		</div>
	</a>

	<?php
		wp_nav_menu( array(
			'container'      => '',
			'theme_location' => 'menu-1',
			'fallback_cb'    => 'edupro_menu_fallback',
			'walker'         => new EduPro_Walker_Nav_Menu()
		) );
	?>

</nav><!-- #site-navigation -->
