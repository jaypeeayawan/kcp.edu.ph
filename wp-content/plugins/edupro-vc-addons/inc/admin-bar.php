<?php
/**
 * Add admin bar menu
 * @global      $menu , $submenu, $wp_admin_bar
 * @return      void
 */
function edupro_admin_bar_menu() {
	global $menu, $submenu, $wp_admin_bar;

	if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
		return;
	}
	$args = array(
		'id'    => 'edupro-theme-option',
		'title' => '<span class="ab-icon dashicons-portfolio"></span>' . esc_html( 'Edupro Options', 'edupro' ),
		'href'  => admin_url( 'themes.php?page=theme-options' ),
		'meta'  => array( 'class' => 'edupro-theme-option' )
	);
	$wp_admin_bar->add_node( $args );
}

add_action( 'admin_bar_menu', 'edupro_admin_bar_menu', 50 );
