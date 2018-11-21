<?php 
/**
 * Get CSS for color scheme.
 *
 * @return string
 */
function edupro_customizer_topbar() {

	/* Get Option */
	$bg_topbar_color                = edupro_get_setting( 'bg_topbar_color' );
	$txt_menu_topbar_color          = edupro_get_setting( 'txt_menu_topbar_color' );
	$hover_txt_menu_topbar_color    = edupro_get_setting( 'hover_txt_menu_topbar_color' );
	$icon_menu_topbar_color         = edupro_get_setting( 'icon_menu_topbar_color' );
	$hover_icon_menu_topbar_color   = edupro_get_setting( 'hover_icon_menu_topbar_color' );
	$bg_sub_topbar_color            = edupro_get_setting( 'bg_sub_topbar_color' );
	$txt_submenu_topbar_color       = edupro_get_setting( 'txt_submenu_topbar_color' );
	$hover_txt_submenu_topbar_color = edupro_get_setting( 'hover_txt_submenu_topbar_color' );
	$txt_menu_topbar_size           = edupro_get_setting( 'txt_menu_topbar_size' );
	$txt_submenu_topbar_size        = edupro_get_setting( 'txt_submenu_topbar_size' );
	$border_submenu_topbar_color        = edupro_get_setting( 'border_submenu_topbar_color' );


	$css = '';

	if($bg_topbar_color  ) {
		$css .= 'body #page.site .topbar { background: ' . $bg_topbar_color . ';}';
	}

	if ( $txt_menu_topbar_color ) {
		$css .= '
			body #page.site .topbar .topbar__left, 
			body #page.site .topbar .topbar__right,
			body #page.site .topbar ul.menu > li > a,
			body #page.site .topbar .edupro-link-login ul li a {
				color: ' . $txt_menu_topbar_color . ';
			}
	
			.topbar .edupro-link-login ul li:last-child {
			    border-color: ' . $txt_menu_topbar_color . ';
			}';
	}

	if ( $txt_menu_topbar_size ) {
		$css .= '
			body #page.site .topbar ul.menu li a,
			body #page.site .topbar .topbar__left, 
			body #page.site .topbar .topbar__right,
			body #page.site .topbar ul.menu > li > a,
			body #page.site .topbar ul.menu > li:before {
				font-size: ' . $txt_menu_topbar_size . 'px;
			}';
	}

	if ( $hover_txt_menu_topbar_color ) {
		$css .= '
		body #page.site .topbar .topbar__left p:hover, 
		body #page.site .topbar .topbar__right p:hover,
		body #page.site .topbar ul.menu > li > a:hover,
		body #page.site .topbar .edupro-link-login ul li a:hover {
			color: ' . $hover_txt_menu_topbar_color . ';
		}';
	}

	if ( $icon_menu_topbar_color ) {
		$css .= '
		body #page.site .topbar ul li i,
		body #page.site .topbar ul li.fa:before {
			color: ' . $icon_menu_topbar_color . ';
		}';
	}

	if ( $hover_icon_menu_topbar_color ) {
		$css .= '
		body #page.site .topbar ul li i:hover,
		body #page.site .topbar ul li.fa:hover::before {
			color: ' . $hover_icon_menu_topbar_color . ';
		}';
	}

	if ( $bg_sub_topbar_color ) {
		$css .= '
		body #page.site .topbar .widget_nav_menu ul.menu li ul.sub-menu {
			background: ' . $bg_sub_topbar_color . ' ;
		}';
	}

	if ( $txt_submenu_topbar_color ) {
		$css .= '
		body #page.site .topbar .widget_nav_menu ul.menu li > ul.sub-menu li a {
			color: ' . $txt_submenu_topbar_color . ';
		}';
	}

	if ( $txt_submenu_topbar_size ) {
		$css .= '
		body #page.site .topbar .widget_nav_menu ul.menu li > ul.sub-menu li a {
			font-size: ' . $txt_submenu_topbar_size . 'px;
		}';
	}

	if ( $hover_txt_submenu_topbar_color ) {
		$css .= '
		body #page.site .topbar .widget_nav_menu ul.menu li > ul.sub-menu li a:hover {
			color: ' . $hover_txt_submenu_topbar_color . ';
		}';
	}

	if ( $border_submenu_topbar_color ) {
		$css .= '
		body #page.site .topbar .widget_nav_menu ul.menu li > ul.sub-menu li {
			border-color: ' . $border_submenu_topbar_color . ';
		}';
	}
	
	return $css;
}