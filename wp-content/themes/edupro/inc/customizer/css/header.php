<?php
/**
 * Get CSS for color scheme.
 *
 * @return string
 */
function edupro_customizer_header() {

	/* Get Option */
	$bg_header_color                 = edupro_get_setting( 'bg_header_color' );
	$txt_menu_header_color           = edupro_get_setting( 'txt_menu_header_color' );
	$hover_txt_menu_header_color     = edupro_get_setting( 'hover_txt_menu_header_color' );
	$icon_menu_header_color          = edupro_get_setting( 'icon_menu_header_color' );
	$hover_icon_menu_header_color    = edupro_get_setting( 'hover_icon_menu_header_color' );
	$sticky_txt_menu_header_color    = edupro_get_setting( 'sticky_txt_menu_header_color' );
	$sticky_bg_menu_header_color    = edupro_get_setting( 'sticky_bg_menu_header_color' );
	$cart_item_color                 = edupro_get_setting( 'cart_item_color' );
	$txt_sub_menu_header_color       = edupro_get_setting( 'txt_sub_menu_header_color' );
	$hover_txt_sub_menu_header_color = edupro_get_setting( 'hover_txt_sub_menu_header_color' );
	$border_sub_menu_header_color    = edupro_get_setting( 'border_sub_menu_header_color' );
	$bg_txt_sub_menu_header_color    = edupro_get_setting( 'bg_sub_menu_header_color' );
	$header_line_color    = edupro_get_setting( 'header_line_color' );
	$font_size_menu    = edupro_get_setting( 'font_size_menu' );
	$font_size_sub_menu    = edupro_get_setting( 'font_size_sub_menu' );

	$css = '';
	
	// Background header
	$css .= $bg_header_color ? sprintf( 'body #page.site .header--s1, body #page.site .header--s2, body #page.site .header--s3, .header_style4 .site-header, .header_style5 .site-header, .header_style6 .site-header {background-color: %s;}', $bg_header_color ) : '';

	//Sticky text menu header
	$css .= $sticky_txt_menu_header_color ? sprintf( 'body #page.site .header-sticky .site-header .main-navigation a, body #page.site .header-sticky .site-header .main-navigation >ul.menu >li > a {color: %s;}', $sticky_txt_menu_header_color ) : '';

	//Background sticky header menu
	$css .= $sticky_bg_menu_header_color ? sprintf( 'body #page.site .header-sticky .site-header, body #page.site .header--s3 .container__navbar .site-header__content {background: %s;}', $sticky_bg_menu_header_color ) : '';

	// Text menu header color
	if ( $txt_menu_header_color ) {
		$css .= sprintf( '
			body #page.site .header--s1 .main-navigation >ul.menu >li > a,
			body #page.site .header--s2 .main-navigation >ul.menu >li > a,
			body #page.site .header_style2 .header-sticky .main-navigation ul.menu > li > a,
			body #page.site .header--s3 .main-navigation >ul.menu >li > a,
			body #page.site .site-title a,
			body #page.site .header--s4 .main-navigation >ul.menu >li > a,
			body #page.site .header--s5 .main-navigation >ul.menu >li > a,
			body #page.site .header--s6 .main-navigation >ul.menu >li > a {
				color: %s;
			}
		', $txt_menu_header_color );
	}

	// Hover text menu header
	if ( $hover_txt_menu_header_color ) {
		$css .= sprintf( '
			body #page.site .header--s1 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s1 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s1 .main-navigation .current-menu-item > a,
			body #page.site .header--s1 .main-navigation li a:hover,
			body #page.site .header--s2 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s2 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s2 .main-navigation .current-menu-item > a,
			body #page.site .header--s2 .main-navigation li a:hover,
			body #page.site .header--s3 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s3 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s3 .main-navigation .current-menu-item > a,
			body #page.site .header--s3 .main-navigation li a:hover,
			body #page.site .site-title a:hover,
			body #page.site .header--s4 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s4 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s4 .main-navigation .current-menu-item > a,
			body #page.site .header--s4 .main-navigation li a:hover,
			body #page.site .header--s5 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s5 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s5 .main-navigation .current-menu-item > a,
			body #page.site .header--s5 .main-navigation li a:hover,
			body #page.site .header--s6 .main-navigation .current-menu-ancestor > a,
			body #page.site .header--s6 .main-navigation .current-menu-ancestor > a:hover,
			body #page.site .header--s6 .main-navigation .current-menu-item > a,
			body #page.site .header--s6 .main-navigation li a:hover {
				color: %s !important;
			}
		', $hover_txt_menu_header_color );
	}


	// Icon menu header
	if ( $icon_menu_header_color ) {
		$css .= sprintf( '
		.header__search a,
		.header__cart .cart-icon,
		.social-icon #social-menu a,
		.header--s3 #social-menu a:before,
		body #page.site .header__search .search-toggle,
		body #page.site .header__cart .cart-icon {
			color: %s;	
		}
		.header--s3 #social-menu a:before {
			border-color: %s;
		}',
			$icon_menu_header_color,
			$icon_menu_header_color );
	}

	// Hover icon menu header
	if ( $hover_icon_menu_header_color ) {
		$css .= sprintf( '
		header__search a:hover,
		.header__cart .cart-icon:hover,
		body #page.site .header__search .search-toggle:hover,
		body #page.site .header__cart .cart-icon:hover,
		.social-icon #social-menu a:hover,
		.header--s3 #social-menu a:hover::before {
			color: %s;
		}
		.header--s3 #social-menu a:hover::before {
			border-color: %s;
		}
		', $hover_icon_menu_header_color,
			$hover_icon_menu_header_color );
	}

	// Cart item color
	$css .= $cart_item_color ? sprintf( 'body .header__cart .wrapper-items-number {color: %s;}', $cart_item_color ) : '';


	// Text sub menu header
	if ( $txt_sub_menu_header_color ) {
		$css .= sprintf( '
		body #page.site .header--s1 .main-navigation a, 
		body #page.site .header--s1 .main-navigation a:visited,
		body #page.site .header--s2 .main-navigation ul.menu li li a, 
		body #page.site .header--s2 .main-navigation ul.menu li li a:visited,
		body #page.site .header--s3 .main-navigation ul.menu li li a, 
		body #page.site .header--s3 .main-navigation ul.menu li li a:visited,
		body #page.site .header--s4 .main-navigation a, 
		body #page.site .header--s4 .main-navigation a:visited,
		body #page.site .header--s4 .main-navigation ul.menu li li a, 
		body #page.site .header--s4 .main-navigation ul.menu li li a:visited,
		body #page.site .header--s5 .main-navigation a, 
		body #page.site .header--s5 .main-navigation a:visited,
		body #page.site .header--s5 .main-navigation ul.menu li li a, 
		body #page.site .header--s5 .main-navigation ul.menu li li a:visited,
		body #page.site .header--s6 .main-navigation a, 
		body #page.site .header--s6 .main-navigation a:visited,
		body #page.site .header--s6 .main-navigation ul.menu li li a, 
		body #page.site .header--s6 .main-navigation ul.menu li li a:visited
		{
			color:%s;
		}
		', $txt_sub_menu_header_color );
	}

	// Hover text sub menu header
	if ( $hover_txt_sub_menu_header_color ) {
		$css .= sprintf( '
		body #page.site .header--s1 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s1 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s1 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s1 .main-navigation li .sub-menu .current-menu-item > a,
		body #page.site .header--s2 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s2 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s2 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s2 .main-navigation li .sub-menu .current-menu-item > a,
		body #page.site .header--s3 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s3 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s3 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s3 .main-navigation li .sub-menu .current-menu-item > a,
		body #page.site .header--s4 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s4 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s4 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s4 .main-navigation li .sub-menu .current-menu-item > a,
		body #page.site .header--s5 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s5 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s5 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s5 .main-navigation li .sub-menu .current-menu-item > a,
		body #page.site .header--s6 .main-navigation li .sub-menu a:hover,
		body #page.site .header--s6 .main-navigation li .sub-menu .current-menu-ancestor > a,
		body #page.site .header--s6 .main-navigation li .sub-menu .current-menu-ancestor > a:hover,
		body #page.site .header--s6 .main-navigation li .sub-menu .current-menu-item > a {
			color: %s !important;
		}
		', $hover_txt_sub_menu_header_color );
	}

	// Border sub menu header
	if ( $border_sub_menu_header_color ) {
		$css .= sprintf( '
		body #page.site .header--s1 .main-navigation li .sub-menu ,
		body #page.site .header--s2 .main-navigation li .sub-menu ,
		body #page.site .header--s3 .main-navigation li .sub-menu,
		body #page.site .header--s1 .main-navigation li li, 
		body #page.site .header--s2 .main-navigation li li,
		body #page.site .header--s3 .main-navigation li li,
		body #page.site .header--s4 .main-navigation li .sub-menu ,
		body #page.site .header--s4 .main-navigation li li,
		body #page.site .header--s5 .main-navigation li .sub-menu ,
		body #page.site .header--s5 .main-navigation li li,
		body #page.site .header--s6 .main-navigation li .sub-menu ,
		body #page.site .header--s6 .main-navigation li li,
		#site-navigation .edupro-megamenu .edupro-mega-child-categories:after {
			border:1px solid %s !important;
		}
		', $border_sub_menu_header_color );
	}

	// Background sub menu header
	if ( $bg_txt_sub_menu_header_color ) {
		$css .= sprintf( '
		body #page.site .header--s1 .main-navigation li .sub-menu ,
		body #page.site .header--s2 .main-navigation li .sub-menu ,
		body #page.site .header--s3 .main-navigation li .sub-menu,
		body #page.site .header--s4 .main-navigation li .sub-menu,
		body #page.site .header--s5 .main-navigation li .sub-menu,
		body #page.site .header--s6 .main-navigation li .sub-menu,
		#site-navigation .edupro-megamenu .edupro-mega-child-categories {
			background-color: %s !important;
		}
		', $bg_txt_sub_menu_header_color );
	}

	// Line bottom color
	if ( $header_line_color ) {
		$css .= sprintf( '
		body #page.site .site-header {
			border-bottom: 1px solid %s;
		}
		', $header_line_color );
	}

	// Font size menu
	if ( $font_size_menu ) {
		$css .= '
			body #page.site .site-header .main-navigation >ul.menu >li > a,
			.mobile-sidebar .primary-menu-mobile a {
				font-size: ' . $font_size_menu . 'px;
			}';
	}

	// Font size sub menu
	if ( $font_size_sub_menu ) {
		$css .= '
			body #page.site .site-header .main-navigation >ul.menu >li > .sub-menu li a,
			.mobile-sidebar .primary-menu-mobile > li > .sub-menu > li > a {
				font-size: ' . $font_size_sub_menu . 'px;
			}';
	}

	// font weight 
	if ( get_theme_mod( 'font_weight_menu' ) && ( get_theme_mod( 'font_weight_menu' ) != 'normal' ) ) {

		$css .= '
		body #page.site .site-header .main-navigation >ul.menu >li > a,
		.mobile-sidebar .primary-menu-mobile a,
		body #page.site .site-header .main-navigation >ul.menu >li > .sub-menu li a,
		.mobile-sidebar .primary-menu-mobile > li > .sub-menu > li > a { font-weight: ' . get_theme_mod( 'font_weight_menu' ) . '; }';
	}

	// font family 
	if ( get_theme_mod( 'font_family_menu' ) && 'Roboto, 100:100italic:300:300italic:regular:italic:500:500italic:700:700italic:900:900italic, sans-serif' != get_theme_mod( 'font_family_menu' ) ) {
		$font_family_title     = get_theme_mod( 'font_family_menu' );
		$font_family_title_end = $font_family_title;
		if ( ! in_array( $font_family_title, edupro_font_browser() ) ) {
			$font_family_title     = str_replace( '"', '', $font_family_title );
			$font_title_explo      = explode( ", ", $font_family_title );
			$font_title            = $font_title_explo[0];
			$font_title_type       = $font_title_explo[1];
			$font_title_serif      = $font_title_explo[2];
			$font_title_type       = str_replace( ':', ',', $font_title_type );
			$title_font_replace    = str_replace( ' ', '+', $font_title );
			$font_family_title_end = "'" . $font_title . "', " . $font_title_serif;

			$css .= '@import url(//fonts.googleapis.com/css?family=' . sanitize_text_field( $title_font_replace ) . ':' . sanitize_text_field( $font_title_type ) . ');';
		}

		$css .= '
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a,
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a { font-family: ' . sanitize_text_field( $font_family_title_end ) . '! important'. ' }';
	}

	// text transform
	if ( edupro_get_setting( 'txt_transform_menu' ) ) {
		$css .= '
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a,
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a {
				text-transform: ' . edupro_get_setting( 'txt_transform_menu' ) . ';
			}';
	}

	// font style
	if ( get_theme_mod( 'font_style_menu' ) ) {
		$css .= '
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a,
		body #page.site .site-header .main-navigation a,
		.mobile-sidebar .primary-menu-mobile a {
				font-style: ' . get_theme_mod( 'font_style_menu' ) . ';
			}';
	}

	return $css;
}