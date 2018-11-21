<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_footer() {
	$css = '';

	$bg_color           = edupro_get_setting( 'footer_bg_color' );
	$title_color        = edupro_get_setting( 'footer_heading_title_color' );
	$text_color         = edupro_get_setting( 'footer_text_color' );
	$link_color         = edupro_get_setting( 'footer_link_color' );
	$hover_link_color   = edupro_get_setting( 'footer_hover_link_color' );
	$social_color       = edupro_get_setting( 'footer_social_color' );
	$hover_social_color = edupro_get_setting( 'footer_hover_social_color' );
	$line_color         = edupro_get_setting( 'footer_line_color' );
	$footer_line_heading_title_color         = edupro_get_setting( 'footer_line_heading_title_color' );


	$css .= $bg_color ? 'body #page.site .footer-widgets{ background-color:' . esc_attr( $bg_color ) . '; }' : '';
	$css .= $title_color ? 'body #page.site .footer-widgets .widget-title{ color:' . esc_attr( $title_color ) . '; }' : '';
	$css .= $text_color ? 'body #page.site .footer-widgets { color:' . esc_attr( $text_color ) . '; }' : '';

	if( $link_color ) {
		$css .= '
		body #page.site .footer-widgets a, 
		body #page.site .footer-widgets .product_list_widget li a,
		body #page.site .footer-widgets .widget_nav_menu li a,
		body #page.site .footer-widgets .widget_archive li a, 
		body #page.site .footer-widgets .widget_categories li a,
		body #page.site .footer-widgets .cat-item a { color:' . esc_attr( $link_color ) . '; }' ;
	}

	if( $hover_link_color ) {
		$css .= '
		body #page.site .footer-widgets a:hover, 
		body #page.site .footer-widgets .product_list_widget li a:hover,
		body #page.site .footer-widgets .widget_nav_menu li a:hover,
		body #page.site .footer-widgets .widget_archive li a:hover, 
		body #page.site .footer-widgets .widget_categories li a:hover,
		body #page.site .footer-widgets .cat-item a:hover { color:' . esc_attr( $hover_link_color ) . '; }' ;
	}

	$css .= $social_color ? 'body #page.site .footer-widgets .widget__social-link ul li a { color:' . esc_attr( $social_color ) . '; }' : '';
	$css .= $hover_social_color ? 'body #page.site .footer-widgets .widget__social-link ul li a:hover { color:' . esc_attr( $hover_social_color ) . '; }' : '';
	$css .= $line_color ? 'body #page.site .footer-widgets { border-color:' . esc_attr( $line_color ) . '; }' : '';

	if ( $footer_line_heading_title_color ) {
		$css .= sprintf( 'body #page.site .footer-widgets .widget-title:before{ background: %s }', esc_attr( $footer_line_heading_title_color ) );
	}

	// Copyright
	$copyright_background_color = edupro_get_setting( 'footer_copyright_background_color' );
	$copyright_text_color       = edupro_get_setting( 'footer_copyright_text_color' );
	$copyright_link_color       = edupro_get_setting( 'footer_copyright_link_color' );
	$copyright_link_color_hover = edupro_get_setting( 'footer_copyright_link_color_hover' );
	
	$css .= $copyright_background_color ? 'body #page.site #colophon.site-footer { background-color:' . esc_attr( $copyright_background_color ) . '; }' : '';
	$css .= $copyright_text_color ? 'body #page.site #colophon.site-footer { color:' . esc_attr( $copyright_text_color ) . '; }' : '';
	$css .= $copyright_link_color ? 'body #page.site #colophon.site-footer a,footer#colophon .copyright-area ul li a{ color:' . esc_attr( $copyright_link_color ) . '; }' : '';
	$css .= $copyright_link_color_hover ? 'body #page.site #colophon.site-footer a:hover,footer#colophon .copyright-area ul li a:hover{ color:' . esc_attr( $copyright_link_color_hover ) . '; }' : '';


	return $css;
}