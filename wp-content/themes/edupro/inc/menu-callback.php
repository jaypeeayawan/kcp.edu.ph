<?php

class edupro_nav_menu_edit_walker extends Walker_Nav_Menu_Edit {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$menu_return  = '';
		$menu_control = '';
		$style        = "font-family: 'Open Sans', sans-serif;";

		// Menu setting
		$edupro_megamenu_enabled = get_post_meta( $item->ID, 'edupro_megamenu_enabled', true );
		$edupro_number_mega_menu = get_post_meta( $item->ID, 'edupro_number_mega_menu', true );

		$menu_control .= '<p class="description description-wide">';
		$menu_control .= '<label>';
		$menu_control .= '<input type="checkbox" class="megamenu_enabled" name="edupro_megamenu_enabled[' . $item->ID . ']"' . checked( $edupro_megamenu_enabled, 'on', false ) . ' />';
		$menu_control .= 'Enable category mega menu (make sure category has posts & menu item you selected need is top level and this menu item no have child menu items)';
		$menu_control .= '</label>';
		$menu_control .= '<p class="description description-wide">';
		$menu_control .= '<label>';
		$menu_control .= 'Select rows when display posts in this category mega menu';
		$menu_control .= '</label>';

		$menu_control .= '<select style="' . $style . '" name="edupro_number_mega_menu[' . $item->ID . ']" id="" class="widefat code edit-menu-item-url">';
		$menu_control .= '<option value="1"' . selected( $edupro_number_mega_menu, '1', false ) . '>1 row</option>';
		$menu_control .= '<option value="2"' . selected( $edupro_number_mega_menu, '2', false ) . '>2 rows</option>';
		$menu_control .= '<option value="3"' . selected( $edupro_number_mega_menu, '3', false ) . '>3 rows</option>';
		$menu_control .= ' </select>';
		$menu_control .= '</p>';


		parent::start_el( $menu_return, $item, $depth, $args, $id );

		$menu_return = preg_replace( '/(?=<div.*submitbox)/', $menu_control, $menu_return );

		$output .= $menu_return;
	}
}