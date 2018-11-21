<?php
/**
 * Get CSS for color scheme.
 *
 * @return string
 */
function edupro_customizer_css_megamenu() {

	/* Get Option */
	//megamenu
	$sb_left_mega_color                 = edupro_get_setting( 'sb_left_mega_color' );
	$sb_right_mega_color                 = edupro_get_setting( 'sb_right_mega_color' );
	$sb_line_mega_color           = edupro_get_setting( 'sb_line_mega_color' );
	$txt_left_mega_color           = edupro_get_setting( 'txt_left_mega_color' );
	$hover_txt_left_mega_color           = edupro_get_setting( 'hover_txt_left_mega_color' );
	$bg_active_txt_left_mega           = edupro_get_setting( 'bg_active_txt_left_mega' );
	$active_txt_left_mega           = edupro_get_setting( 'active_txt_left_mega' );
	$active_hover_txt_left_mega           = edupro_get_setting( 'active_hover_txt_left_mega' );
	$bg_cat_name_right_sb           = edupro_get_setting( 'bg_cat_name_right_sb' );
	$txt_cat_name_right_sb           = edupro_get_setting( 'txt_cat_name_right_sb' );
	$title_right_sb           = edupro_get_setting( 'title_right_sb' );
	$hover_title_right_sb           = edupro_get_setting( 'hover_title_right_sb' );
	$date_item_right_sb           = edupro_get_setting( 'date_item_right_sb' );
	$off_uppercase_cat_mega           = edupro_get_setting( 'off_uppercase_cat_mega' );

	//max megamenu
	$title_maxmega_color = edupro_get_setting( 'title_maxmega_color' );
	$hover_title_maxmega_color = edupro_get_setting( 'hover_title_maxmega_color' );
	$txt_maxmega_color = edupro_get_setting( 'txt_maxmega_color' );
	$bg_maxmega_color = edupro_get_setting( 'bg_maxmega_color' );
	$line_maxmega_color = edupro_get_setting( 'line_maxmega_color' );

	$css = '';
	

	// Line mega menu
	if ( $sb_line_mega_color ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-child-categories:after {
				border-color: %s !important;
			}
		', $sb_line_mega_color );
	}

	// Left sidebar mega menu
	if ( $sb_left_mega_color ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-child-categories {
				background-color: %s !important;
			}
		', $sb_left_mega_color );
	}

	// Right sidebar mega menu
	if ( $sb_right_mega_color ) {
		$css .= sprintf( '
			body #page.site .site-header ul.menu .edupro-mega-menu .sub-menu {
				background-color: %s !important;
			}
		', $sb_right_mega_color );
	}

	// Text sidebar left sidebar
	if ( $txt_left_mega_color ) {
		$css .= sprintf( '
			body #page.site .site-header ul.menu .edupro-mega-menu .edupro-mega-child-categories a {
				color: %s !important;
			}
		', $txt_left_mega_color );
	}

	// Hover Text sidebar left sidebar
	if ( $hover_txt_left_mega_color ) {
		$css .= sprintf( '
			body #page.site .site-header ul.menu .edupro-mega-menu .edupro-mega-child-categories a:hover {
				color: %s !important;
			}
		', $hover_txt_left_mega_color );
	}

	// Background active text color
	if ( $bg_active_txt_left_mega ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-child-categories a.cat-active {
				background-color: %s !important;
				border-color: %1$s !important;
			}
		', $bg_active_txt_left_mega,
		$bg_active_txt_left_mega );
	}

	// Active text color
	if ( $active_txt_left_mega ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-child-categories a.cat-active {
				color: %s !important;
			}
		', $active_txt_left_mega );
	}

	// Active hover text color
	if ( $active_hover_txt_left_mega ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-child-categories a.cat-active:hover {
				color: %s !important;
			}
		', $active_hover_txt_left_mega );
	}

	// Background category name
	if ( $bg_cat_name_right_sb ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-thumbnail .mega-cat-name {
				background-color: %s !important;
			}
		', $bg_cat_name_right_sb );
	}

	// Text category name
	if ( $txt_cat_name_right_sb ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu .edupro-mega-thumbnail .mega-cat-name {
				color: %s !important;
			}
		', $txt_cat_name_right_sb );
	}

	// Title item right sidebar
	if ( $title_right_sb ) {
		$css .= sprintf( '
			body #page.site #site-navigation ul.menu .edupro-mega-menu .edupro-content-megamenu a {
				color: %s !important;
			}
		', $title_right_sb );
	}

	// Hover title item right sidebar
	if ( $hover_title_right_sb ) {
		$css .= sprintf( '
			body #page.site #site-navigation ul.menu .edupro-mega-menu .edupro-content-megamenu a:hover {
				color: %s !important;
			}
		', $hover_title_right_sb );
	}

	// Date item right sidebar
	if ( $date_item_right_sb ) {
		$css .= sprintf( '
			body #page.site #site-navigation .edupro-megamenu p.edupro-mega-date {
				color: %s !important;
			}
		', $date_item_right_sb );
	}

	// Off uppercase title menu right sidebar megamenu
	if ( $off_uppercase_cat_mega ) {
		$css .= sprintf( '
			body #page.site #site-navigation ul.menu .edupro-mega-menu .edupro-content-megamenu a {
				text-transform: none !important;
			}
		', $off_uppercase_cat_mega );
	}

	// Color Title Max megamenu
	if ( $title_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item h4 {
				color: %s !important;
			}
		', $title_maxmega_color );
	}

	// Color Hover Title Max megamenu
	if ( $hover_title_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item h4:hover {
				color: %s !important;
			}
		', $hover_title_maxmega_color );
	}

	// Color Title Max megamenu
	if ( $txt_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item td {
				border-color: %s;
			}
		', $txt_maxmega_color );
	}

	if ( $txt_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item a,
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item tr,
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item th,
			body #page.site .site-header .mega-current-menu-parent .mega-menu-item td {
				color: %s !important;
			}
		', $txt_maxmega_color );
	}
	
	if ( $bg_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent ul,
			body #page.site .site-header .mega-current-menu-parent li {
				Background: %s;
			}
		', $bg_maxmega_color );
	}

	if ( $line_maxmega_color ) {
		$css .= sprintf( '
			body #page.site .site-header .mega-current-menu-parent li {
				border-color: %s !important;
			}
		', $line_maxmega_color );
	}

	return $css;
}