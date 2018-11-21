<?php
/**
 * Get setting default theme option
 *
 * @param string $name The option name.
 *
 * @return mixed
 */
function edupro_get_setting_default( $name, $reset_settings = false ) {
	$settings_default = array(

		// General
		'map_api_key'                         => '',
		'smooth_scroll'                       => 1,
		'edupro_font_for_title'               => 'Roboto Condensed, 300:300italic:regular:italic:700:700italic, sans-serif',
		'edupro_font_weight_title'            => 'normal',
		'edupro_font_for_body'                => 'Roboto, 100:100italic:300:300italic:regular:italic:500:500italic:700:700italic:900:900italic, sans-serif',
		'edupro_font_for_size_body'           => 15,

		// Topbar
		'show_topbar'                         => 0,
		'bg_topbar_color'                     => '#111111',
		'txt_menu_topbar_color'               => '#fff',
		'hover_txt_menu_topbar_color'         => '#fff',
		'txt_menu_topbar_size'                => 13,
		'icon_menu_topbar_color'              => '',
		'hover_icon_menu_topbar_color'        => '',
		'bg_sub_topbar_color'                 => '',
		'txt_submenu_topbar_color'            => '',
		'hover_txt_submenu_topbar_color'      => '',
		'txt_submenu_topbar_size'             => 12,
		'border_submenu_topbar_color'         => '',

		// Header Style
		'header_style'                        => 1,
		'is_sticky'                           => 1,
		'cart_search_social'                  => 1,
		'header_banner'                       => esc_url( get_template_directory_uri() . '/img/banner-header.jpg' ),
		'font_family_menu'                    => 'Roboto Condensed, 300:300italic:regular:italic:700:700italic, sans-serif',
		'font_size_menu'                      => 15,
		'font_size_sub_menu'                  => 12,
		'font_weight_menu'                    => 'bold',
		'txt_transform_menu'                  => 'uppercase',
		'Font Style'                          => 'normal',

		// Header color
		'bg_header_color'                     => '',
		'txt_menu_header_color'               => '',
		'hover_txt_menu_header_color'         => '',
		'icon_menu_header_color'              => '',
		'hover_icon_menu_header_color'        => '',
		'cart_item_color'                     => '',
		'header_line_color'                   => '',
		'sticky_bg_menu_header_color'         => '',
		'sticky_txt_menu_header_color'        => '',
		'bg_sub_menu_header_color'            => '',
		'border_sub_menu_header_color'        => '',
		'txt_sub_menu_header_color'           => '',
		'hover_txt_sub_menu_header_color'     => '',
		'font_style_menu'                     => 'normal',

		// Mega Menu
		'megamenu_option'                     => 0,
		'sb_left_mega_color'                  => '',
		'sb_right_mega_color'                 => '',
		'sb_line_mega_color'                  => '',
		'txt_left_mega_color'                 => '',
		'hover_txt_left_mega_color'           => '',
		'bg_active_txt_left_mega'             => '',
		'active_txt_left_mega'                => '',
		'title_right_sb'                      => '',
		'date_item_right_sb'                  => '',
		'header_mega_date'                    => '',
		'off_uppercase_cat_mega'              => '',
		'title_maxmega_color'                 => '',
		'hover_title_maxmega_color'           => '',
		'txt_maxmega_color'                   => '',
		'bg_maxmega_color'                    => '',
		'line_maxmega_color'                  => '',

		// Main color
		'main_color'                          => 'default',
		'theme_color'                         => '',
		'hover_color'                         => '',

		// Page
		'show_header_image_all_page'          => 0,
		'header_image'                        => '',
		'page_title'                          => 'left',
		'bg_banner_top'                       => '',
		'page_title_color'                    => '',
		'page_line_color'                     => '',
		'page_breadcrumbs_color'              => '',

		// Blog Archive
		'post_layout'                         => 'sidebar-right',
		'post_style'                          => 'list',
		'post_display'                        => 'content',
		'post_more'                           => esc_html__( 'Read more', 'edupro' ),
		'post_content_limit'                  => 71,
		'post_more_link_align'                => 'left',
		'post_paging_style'                   => 'default',
		'post_paging_align'                   => 'left',
		'pagination_load_more_text'           => esc_html__( 'Load more posts', 'edupro' ),
		'post_hidden_thumb'                   => 0,
		'post_hidden_date'                    => 0,
		'post_hidden_author'                  => 0,
		'post_hidden_categories'              => 0,
		'post_hidden_comment'                 => 0,
		'post_hidden_more_link'               => 0,
		'post_title_color'                    => '',
		'post_hover_title_color'              => '',
		'post_meta_color'                     => '',
		'post_date_bg'                        => '',
		'post_date_color'                     => '',
		'post_more_bg'                        => '',
		'post_more_color'                     => '',
		'post_hover_more_bg'                  => '',
		'post_hover_more_color'               => '',

		// Blog Single
		'post_single_layout'                  => 'sidebar-right',
		'post_single_hidden_author_meta'      => 0,
		'post_single_hidden_category_meta'    => 0,
		'post_single_hidden_comment_meta'     => 0,
		'post_single_hidden_tag_meta'         => 0,
		'post_single_hidden_social_link'      => 0,
		'post_single_hidden_nav'              => 0,
		'post_single_hidden_author'           => 0,
		'post_single_hidden_related'          => 0,
		'post_related_per_page'               => 3,

		// Author
		'sort-course'                         => 'post_rating_count',

		// Arhive Product
		'woo_header_image'                    => '',
		'woo_layout'                          => 'sidebar-left',
		'woo_hidden_filter'                   => 0,
		'woo_hidden_icon_link'                => 0,
		'woo_hidden_sale'                     => 0,
		'product_layout'                      => 'sidebar-left',
		'woo_paging_align'                    => 'left',
		'product_overlay_opacity'             => '0.6',
		'product_overlay_color'               => '',
		'product_title_color'                 => '',
		'product_hover_title_color'           => '',
		'product_bg_price_color'              => '',
		'product_price_color'                 => '',
		'product_bg_addcart'                  => '',
		'product_bg_hover_addcart'            => '',
		'product_text_color_addcart'          => '',
		'product__hover_text_color_addcart'   => '',

		// Single Product
		'woo_single_layout'                   => 'sidebar-left',
		'woo_single_hidden_price'             => 0,
		'woo_single_hidden_rating'            => 0,
		'woo_single_hidden_description'       => 0,
		'woo_single_hidden_sku'               => 0,
		'woo_single_hidden_categories'        => 0,
		'woo_single_hidden_tags'              => 0,
		'woo_single_hidden_share'             => 0,
		'woo_single_hidden_related'           => 0,

		// Archive Portfolio
		'portfolio_header_image'              => '',
		'portfolio_hidden_filter'             => 0,
		'portfolio_hidden_categories'         => 0,
		'portfolio_hidden_icon_link'          => 0,
		'portfolio_overlay_color'             => '',
		'portfolio_title_color'               => '',
		'portfolio_hover_title_color'         => '',
		'portfolio_cate_color'                => '',
		'portfolio_catebg_color'              => '',
		'portfolio_grid_catebg_color'         => '',
		'portfolio_grid_text_color'           => '',
		'portfolio_grid_hover_text_color'     => '',
		'portfolio_grid_hidden_line'          => 0,
		'portfolio_page_title'                => esc_html__( 'Portfolio', 'edupro' ),
		'portfolio_layout'                    => 'no-sidebar',
		'portfolio_column'                    => 'column-3',
		'portfolio_style'                     => 'masonry',
		'portfolio_all_text'                  => esc_html__( 'All', 'edupro' ),
		'portfolio_page_layout_style'         => 'grid',
		'portfolio_per_page'                  => 9,
		'portfolio_related_per_page'          => 3,
		'portfolio_title_next_nav'            => esc_html__( 'Next Portfolio', 'edupro' ),
		'portfolio_title_prev_nav'            => esc_html__( 'Previous Portfolio', 'edupro' ),
		'portfolio_title_related'             => esc_html__( 'Related Porfolios', 'edupro' ),
		'portfolio_overlay_opacity'           => '0.6',
		'portfolio_content_pos'               => 'content-right',

		// Single Portfolio
		'portfolio_single_title_color'        => '',
		'portfolio_single_hidden_cat'         => 0,
		'portfolio_single_hidden_tag'         => 0,
		'portfolio_single_hidden_share'       => 0,
		'portfolio_single_hidden_nav'         => 0,
		'off_uppercase_portfolio_title_na'    => 0,
		'portfolio_hidden_related'            => 0,
		'off_uppercase_portfolio_title_rel'   => 0,

		// Archive Event
		'event_header_image'                  => '',
		'event_hidden_filter'                 => 0,
		'event_hidden_date'                   => 0,
		'event_hidden_time'                   => 0,
		'event_hidden_address'                => 0,
		'event_hidden_description'            => 0,
		'event_content_limit'                 => 30,
		'event_archive_layout'                => 'grid',
		'event_archive_sort'                  => 'all',
		'event_join_now_align'                => 'left',
		'event_single_layout'                 => 'sidebar-right',
		'event_page_title'                    => esc_html__( 'Events', 'edupro' ),
		'event_content_limit'                 => 30,

		// Single Event
		'event_single_start_time'             => 0,
		'event_single_finish_time'            => 0,
		'event_single_address'                => 0,
		'event_single_ticket_price'           => 0,
		'event_currency_ticket_price'         => '$',
		'title_contact_form_event'            => 'Book your ticket',
		'shortcode_contact_form_event'        => '[contact-form-7 id="274" title="Book your ticket"]',
		'event_single_share'                  => '',

		// Archive Courses
		'courses_header_image'                => '',
		'courses_hidden_filter'               => 0,
		'courses_hidden_rating'               => 0,
		'courses_hidden_author'               => 0,
		'courses_hidden_des'                  => 0,
		'courses_hidden_count_total_user'     => 0,
		'courses_hidden_number_total_comment' => 0,
		'courses_hidden_price'                => 0,
		'courses_paging_align'                => 'left',
		'course_title_color'                  => '',
		'course_hover_title_color'            => '',
		'course_author_color'                 => '',
		'course_author_link_color'            => '',
		'course_hover_author_link_color'      => '',
		'course_meta_color'                   => '',
		'course_price_color'                  => '',
		'hover_course_price_color'            => '',
		'course_free_color'                   => '',
		'hover_course_free_color'             => '',
		'txt_btn_course_color'                => '',
		'courses_layout'                      => 'sidebar-left',
		'courses_page_title'                  => esc_html__( 'Courses', 'edupro' ),
		'sort-course'                         => 'post_rating_count',
		'courses_style_default'               => 'grid',
		'courses_per_page'                    => 9,
		'sort_courses_default'                => 'new',

		// Single Courses
		'courses_single_layout'               => 'sidebar-right',
		'courses_title_related'               => esc_html__( 'Related Courses', 'edupro' ),
		'courses_related_per_page'            => 4,
		'courses_single_hidden_curriculum'    => 0,
		'courses_single_hidden_instructor'    => 0,
		'courses_single_hidden_review'        => 0,
		'courses_single_hidden_listcomment'   => 0,
		'courses_hidden_related'              => 0,

		// 11 - Sidebar
		'is_sticky_sidebar'                   => 1,
		'sidebar_bg_color'                    => '',
		'sidebar_heading_title_color'         => '',
		'sidebar_line_heading_title_color'    => '',
		'sidebar_line_bottom_widget'          => '',
		'sidebar_text_color'                  => '',
		'sidebar_link_color'                  => '',
		'sidebar_hover_link_color'            => '',

		// Footer
		'footer-columns'                      => 4,
		'footer_text'                         => sprintf(
			esc_html__( 'Copyright &copy; %s %s. Designed & Developed by %s.', 'edupro' ),
			date( 'Y' ),
			'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>',
			'<a href="' . esc_url( 'http://featherlayers.com/' ) . '">' . esc_html( 'FeatherLayers' ) . '</a>'
		),
		'go_to_top'                           => 1,
		'footer_bg_color'                     => '',
		'footer_heading_title_color'          => '',
		'footer_line_heading_title_color'     => '',
		'footer_text_color'                   => '',
		'footer_link_color'                   => '',
		'footer_hover_link_color'             => '',
		'footer_social_color'                 => '',
		'footer_hover_social_color'           => '',
		'footer_line_color'                   => '',
		'copyright_divider_color'             => '',
		'footer_copyright_background_color'   => '',
		'footer_copyright_text_color'         => '',
		'footer_copyright_link_color'         => '',
		'footer_copyright_link_color_hover'   => ''
	);

	if ( $reset_settings == true ) {
		foreach ( $settings_default as $id_option => $value ) {
			set_theme_mod( $id_option, $value );
		}

		return;
	}


	return isset( $settings_default[ $name ] ) ? $settings_default[ $name ] : '';
}
