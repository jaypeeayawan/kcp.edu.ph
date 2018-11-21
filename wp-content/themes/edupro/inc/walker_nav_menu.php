<?php

/**
 * Class edupro_main_menu
 * Hook to create options mega menu on Appearance > Menu
 * Render content mega menu if mega menu is selected
 * We hook only for categories
 *
 * @since     1.0
 * @construct hook
 *            - action wp_update_nav_menu_item
 *            - filter wp_edit_nav_menu_walker
 *            - filter wp_nav_menu_objects
 */
class Edupro_Main_Menu {

	function __construct() {
		if ( is_admin() ) {
			add_action( 'wp_update_nav_menu_item', array( $this, 'edupro_wp_update_nav_menu_item' ), 10, 3 );
			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'edupro_wp_edit_nav_menu_walker' ) );
		}
		add_filter( 'wp_nav_menu_objects', array( $this, 'hook_wp_nav_menu_objects' ), 10, 2 );
	}

	function edupro_wp_edit_nav_menu_walker() {
		include_once( trailingslashit( get_template_directory() ) . 'inc/menu-callback.php' );

		return 'edupro_nav_menu_edit_walker';
	}

	function edupro_wp_update_nav_menu_item( $menu_id, $menu_item_id, $args ) {

		update_post_meta( $menu_item_id, 'edupro_megamenu_enabled', ( isset( $_POST['edupro_megamenu_enabled'][ $menu_item_id ] ) ? 'on' : 'off' ) );

		if ( isset( $_POST['edupro_number_mega_menu'][ $menu_item_id ] ) ) {
			update_post_meta( $menu_item_id, 'edupro_number_mega_menu', $_POST['edupro_number_mega_menu'][ $menu_item_id ] );
		}

	}

	function hook_wp_nav_menu_objects( $items, $args = '' ) {
		$menu_items  = array();
		$item_childs = array();

		foreach ( $items as $item ) {
			if ( empty( $item->menu_item_parent ) || empty( $item->ID ) ) {
				continue;
			}
			$edupro_megamenu_enabled = get_post_meta( $item->menu_item_parent, 'edupro_megamenu_enabled', true );
			if ( 'on' != $edupro_megamenu_enabled ) {
				continue;
			}

			$item_childs[ $item->menu_item_parent ][] = array(
				'id'        => $item->ID,
				'title'     => isset( $item->title ) ? $item->title : '',
				'object'    => isset( $item->object ) ? $item->object : '',
				'object_id' => isset( $item->object_id ) ? $item->object_id : ''
			);
		}

		foreach ( $items as &$item ) {
			$item->is_mega_menu = false;

			$max_megamenu      = get_post_meta( $item->menu_item_parent, '_megamenu', true );
			$max_megamenu_type = isset( $max_megamenu['type'] ) ? $max_megamenu['type'] : '';

			$edupro_megamenu_enabled = get_post_meta( $item->menu_item_parent, 'edupro_megamenu_enabled', true );
			if ( 'on' == $edupro_megamenu_enabled && $item->menu_item_parent && 'megamenu' != $max_megamenu_type ) {
				continue;
			}

			// if menu is mega menu, render mega menu
			$edupro_megamenu_enabled = get_post_meta( $item->ID, 'edupro_megamenu_enabled', true );
			if ( 'on' != $edupro_megamenu_enabled ) {
				$menu_items[] = $item;
				continue;
			}

			$edupro_number_mega_menu = get_post_meta( $item->is_mega_menu, 'edupro_number_mega_menu', true );

			if ( ! isset( $edupro_number_mega_menu ) || empty ( $edupro_number_mega_menu ) ): $edupro_number_mega_menu = '1'; endif;


			if ( isset( $item_childs[ $item->ID ] ) ) {

				$arr_has_mega = array(
					'category',
					'course_category',
					'jetpack-portfolio-type',
					'jetpack-portfolio-tag',
					'event_category',
					'event_tag',
					'product_cat',
					'product_tag'
				);

				$has_mega = false;
				foreach ( $item_childs[ $item->ID ] as $list_cat ) {
					$tax   = isset( $list_cat['object'] ) ? $list_cat['object'] : '';

					if ( in_array( $tax, $arr_has_mega ) ) {
						$has_mega = true;
					}
				}

				if( empty( $has_mega ) ) {
					$menu_items[] = $item;

					continue;
				}

				$item->classes[] = 'edupro-mega-menu';

				// add the parent menu
				$menu_items[] = $item;

				// create mega menu item
				$post                 = new stdClass;
				$post->ID             = 0;
				$post->post_author    = '';
				$post->post_date      = '';
				$post->post_date_gmt  = '';
				$post->post_password  = '';
				$post->post_type      = 'menu_edupro';
				$post->post_status    = 'draft';
				$post->to_ping        = '';
				$post->pinged         = '';
				$post->comment_status = get_option( 'default_comment_status' );
				$post->ping_status    = get_option( 'default_ping_status' );
				$post->post_pingback  = get_option( 'default_pingback_flag' );
				$post->post_category  = get_option( 'default_category' );
				$post->page_template  = 'default';
				$post->post_parent    = 0;
				$post->menu_order     = 0;
				$new_item             = new WP_Post( $post );

				/*
				 * if this is mega menu
				 * set the is_mega_menu flag
				 * render content of this mega menu
				 */
				$new_item->is_mega_menu = true; // sent to the menu walkers

				$new_item->menu_item_parent = $item->ID;

				$new_item->url   = '';
				$new_item->title = '';
				$new_item->title .= '<div class="edupro-megamenu">';
				$new_item->title .= edupro_return_html_mega_menu( $edupro_number_mega_menu, $item_childs[ $item->ID ] );
				$new_item->title .= '</div>';

				$menu_items[] = $new_item;

			} else {
				$menu_items[] = $item;
			}

		} //end foreach

		return $menu_items;
	}
}

new Edupro_Main_Menu();

/**
 * Class edupro_menu_walker_nav_menu
 * This class will remove wrap </a> around mega menu
 * Callback on wp_nav_menu() in header.php file
 *
 * @since 1.0
 */
class EduPro_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the CSS classes applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param array $classes The CSS classes that are applied to the menu items
		 * @param object $item Current menu item
		 * @param array $args Array of arguments
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param string       ID that is applied to the menu items
		 * @param object $item Current menu item.
		 * @param array $args Array of arguments
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		/**
		 * Filter the HTML attributes applied to a menu items
		 *
		 * @since 1.0
		 *
		 * @param array $atts
		 * @param object $item The current menu item.
		 * @param array $args An array of arguments
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '<a' . $attributes . '>';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '</a>';
		}
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output
		 *
		 * @since 1.0
		 *
		 * @param string $item_output The menu items starting HTML output
		 * @param object $item Menu item data object
		 * @param int $depth Depth of menu item
		 * @param array $args Array of arguments
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}