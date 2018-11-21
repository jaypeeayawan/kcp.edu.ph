<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_page() {
	$css = '';

	//  Page
	if ( is_page() || is_category() || is_home() || is_front_page() || is_post_type_archive( 'product' ) || is_post_type_archive( 'sfwd-courses' ) || is_post_type_archive( 'event' ) || is_post_type_archive( 'jetpack-portfolio' ) ) {

		$page_title             = edupro_get_setting( 'page_title' );
		$page_title_color       = edupro_get_setting( 'page_title_color' );
		$page_line_color        = edupro_get_setting( 'page_line_color' );
		$page_breadcrumbs_color = edupro_get_setting( 'page_breadcrumbs_color' );
		$bg_banner_top          = edupro_get_setting( 'bg_banner_top' );

		// Align 
		$css .= $page_title ? sprintf( '.page__banner-top .page__breadcrumbs { text-align:%s; }', $page_title ) : '';

		// Align right
		if ( $page_title == 'right' ) {
			$css .= $page_title ? '.page__banner-top .page__breadcrumbs .page__title:before { right: 0; }' : '';
		} elseif ( $page_title == 'center' ) {
			$css .= $page_title ? '.page__banner-top .page__breadcrumbs .page__title:before { left: 48.5%; }' : '';
		}

		// Color
		$css .= $page_title_color ? sprintf( 'body #page.site .page__banner-top .page__breadcrumbs .page__title h1 { color:%s; }', $page_title_color ) : '';
		$css .= $page_line_color ? sprintf( 'body #page.site .page__banner-top .page__breadcrumbs .page__title:before { background-color:%s; }', $page_line_color ) : '';
		$css .= $page_breadcrumbs_color ? sprintf( 'body #page.site .page__banner-top .page__breadcrumbs .breadcrumbs span { color:%s; }', $page_breadcrumbs_color ) : '';
		$css .= $page_breadcrumbs_color ? sprintf( 'body #page.site .page__banner-top .page__breadcrumbs .breadcrumbs i { color:%s; }', $page_breadcrumbs_color ) : '';
		$css .= $page_breadcrumbs_color ? sprintf( '.woocommerce .woocommerce-breadcrumb { color:%s; }', $page_breadcrumbs_color ) : '';
		$css .= $page_breadcrumbs_color ? sprintf( '.woocommerce .woocommerce-breadcrumb a { color:%s; }', $page_breadcrumbs_color ) : '';
		$css .= $bg_banner_top ? sprintf( 'body #page.site .page__banner-top { background-color:%s; }', $bg_banner_top ) : '';

	}

	return $css;
}