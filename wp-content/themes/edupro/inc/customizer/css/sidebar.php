<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_sidebar() {
	$css = '';

	$bg_color           = edupro_get_setting( 'sidebar_bg_color' );
	$heading_color      = edupro_get_setting( 'sidebar_heading_title_color' );
	$line_heading_color = edupro_get_setting( 'sidebar_line_heading_title_color' );
	$text_color         = edupro_get_setting( 'sidebar_text_color' );
	$link_color         = edupro_get_setting( 'sidebar_link_color' );
	$hover_link_color   = edupro_get_setting( 'sidebar_hover_link_color' );
	$sidebar_line_bottom_widget   = edupro_get_setting( 'sidebar_line_bottom_widget' );

	if ( $bg_color ) {
		$css .= sprintf( '
		body #page.site .main__sidebar,
		body #page.site .main .main__sidebar,
		body #page.site .shop__woocommerce #secondary,
		body #page.site .sidebar-portfolio,
		body #page.site .ctf7__sidebar > .theiaStickySidebar,
		body #page.site .sidebar-portfolio .sidebar-3,
		body #page.site #secondary .sidebar-3,
		body #page.site .shop__woocommerce #secondary .widget-area,
		body.single-sfwd-courses .sidebar-single { background-color: %s }', esc_attr( $bg_color ) );
	}

	if( $heading_color ) {
		$css .= sprintf( '#secondary .widget-title, .widget-title{ color: %s }', esc_attr( $heading_color ) );
	}

	if ( $line_heading_color ) {
		$css .= sprintf( '
			body #page.site #secondary .widget-title:before,
			body #page.site .sidebar-portfolio .widget-title:before { background: %s }', esc_attr( $line_heading_color ) );
	}

	if ( $text_color ) {
		$css .= sprintf( 'body #page.site .main__sidebar, body #page.site .sidebar__woocommerce, body #page.site .sidebar-portfolio, body #page.site .ctf7__sidebar, body #page.site .widget-area{ color: %s }', esc_attr( $text_color ) );
	}

	if ( $sidebar_line_bottom_widget ) {
		$css .= sprintf( '
			body #page.site #secondary .widget,
			body #page.site .sidebar-portfolio .widget { border-bottom: 1px solid %s; }', esc_attr( $sidebar_line_bottom_widget ) );
	}

	if ( $hover_link_color ) {
		$css .= '
		body #page.site .main__sidebar a:hover, 
		body #page.site .main__sidebar .product_list_widget li a:hover,
		body #page.site .main__sidebar .widget_nav_menu li a:hover,
		body #page.site .main__sidebar .widget_archive li a:hover, 
		body #page.site .main__sidebar .widget_categories li a:hover,
		body #page.site .main__sidebars .cat-item a:hover,
		body #page.site .sidebar__woocommerce a:hover, 
		body #page.site .sidebar__woocommerce .product_list_widget li a:hover,
		body #page.site .sidebar__woocommerce .widget_nav_menu li a:hover,
		body #page.site .sidebar__woocommerce .widget_archive li a:hover, 
		body #page.site .sidebar__woocommerce .widget_categories li a:hover,
		body #page.site .sidebar__woocommerce .cat-item a:hover,
		body #page.site .sidebar__woocommerce .shop__woocommerce .sidebar__woocommerce .cart_list li a:hover, 
		body #page.site .sidebar__woocommerce .shop__woocommerce .sidebar__woocommerce .product_list_widget li a:hover,
		body #page.site .sidebar-portfolio a:hover, 
		body #page.site .sidebar-portfolio .product_list_widget li a:hover,
		body #page.site .sidebar-portfolio .widget_nav_menu li a:hover,
		body #page.site .sidebar-portfolio .widget_archive li a:hover, 
		body #page.site .sidebar-portfolio .widget_categories li a:hover,
		body #page.site .sidebar-portfolio .cat-item a:hover,
		body #page.site .widget-area a:hover, 
		body #page.site .widget-area .product_list_widget li a:hover,
		body #page.site .widget-area .widget_nav_menu li a:hover,
		body #page.site .widget-area .widget_archive li a:hover, 
		body #page.site .widget-area .widget_categories li a:hover,
		body #page.site .widget-area .cat-item a:hover 
		{ color:' . esc_attr( $hover_link_color ) . '; }' ;
	}

	if ( $link_color ) {
		$css .= '
		body #page.site .main__sidebar a, 
		body #page.site .main__sidebar .product_list_widget li a,
		body #page.site .main__sidebar .widget_nav_menu li a,
		body #page.site .main__sidebar .widget_archive li a, 
		body #page.site .main__sidebar .widget_categories li a,
		body #page.site .main__sidebars .cat-item a,
		body #page.site .sidebar__woocommerce a, 
		body #page.site .sidebar__woocommerce .product_list_widget li a,
		body #page.site .sidebar__woocommerce .widget_nav_menu li a,
		body #page.site .sidebar__woocommerce .widget_archive li a, 
		body #page.site .sidebar__woocommerce .widget_categories li a,
		body #page.site .sidebar__woocommerce .cat-item a ,
		body #page.site .sidebar__woocommerce .shop__woocommerce .sidebar__woocommerce .cart_list li a, 
		body #page.site .sidebar__woocommerce .shop__woocommerce .sidebar__woocommerce .product_list_widget li a
		body #page.site .sidebar-portfolio a, 
		body #page.site .sidebar-portfolio .product_list_widget li a,
		body #page.site .sidebar-portfolio .widget_nav_menu li a,
		body #page.site .sidebar-portfolio .widget_archive li a, 
		body #page.site .sidebar-portfolio .widget_categories li a,
		body #page.site .sidebar-portfolio .cat-item a ,
		body #page.site .widget-area a, 
		body #page.site .widget-area .product_list_widget li a,
		body #page.site .widget-area .widget_nav_menu li a,
		body #page.site .widget-area .widget_archive li a, 
		body #page.site .widget-area .widget_categories li a,
		body #page.site .widget-area .cat-item a 
		{ color:' . esc_attr( $link_color ) . '; }' ;
	}



	return $css;
}