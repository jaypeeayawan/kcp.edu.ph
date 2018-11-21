<?php
/**
 * Add option blog
 */
return array(
	'id'             => 'blog',
	'title'          => esc_html__( 'Blog', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'blog',
	'tabs'           => array(
		'post-archive' => array(
			'label' => esc_html__( 'Archive', 'edupro' ),
			'icon'  => 'dashicons-category',
		),
		'post-single'  => array(
			'label' => esc_html__( 'Single', 'edupro' ),
			'icon'  => 'dashicons-admin-post',
		),
	),
	'tab_style'      => 'box',
	'tab_wrapper'    => true,
	'fields'         => array(
		array(
			'name'    => esc_html__( 'Sidebar Layout', 'edupro' ),
			'id'      => 'post_layout',
			'type'    => 'image_select',
			'options' => array(
				'sidebar-left'  => 'http://i.imgur.com/Y2sxQ2R.png',
				'sidebar-right' => 'http://i.imgur.com/h7ONxhz.png',
				'no-sidebar'    => 'http://i.imgur.com/m7oQKvk.png',
			),
			'tab'     => 'post-archive',
			'std'     => 'sidebar-right',
		),
		array(
			'name'    => esc_html__( 'Style', 'edupro' ),
			'id'      => 'post_style',
			'type'    => 'image_select',
			'options' => array(
				'list' => get_template_directory_uri() . '/img/list.png',
				'grid' => get_template_directory_uri() . '/img/grid.png',

			),
			'tab'     => 'post-archive',
			'std'     => 'list',
		),
		array(
			'name'    => esc_html__( 'Content Display', 'edupro' ),
			'id'      => 'post_display',
			'type'    => 'select',
			'options' => array(
				'excerpt' => esc_html__( 'Post excerpt', 'edupro' ),
				'content' => esc_html__( 'Post content', 'edupro' ),
				'more'    => esc_html__( 'Post content before more tag', 'edupro' ),
			),
			'tab'     => 'post-archive',
			'std'     => 'content',
		),
		array(
			'name' => esc_html__( 'Content limit (words)', 'edupro' ),
			'id'   => 'post_content_limit',
			'type' => 'text',
			'std'  => 71,
			'size' => 10,
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Read More Text', 'edupro' ),
			'id'   => 'post_more',
			'type' => 'text',
			'std'  => esc_html__( 'Read more', 'edupro' ),
			'size' => 20,
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Color', 'edupro' ),
			'id'   => 'blog_divider_color',
			'type' => 'divider',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_thumb',
			'name' => esc_html__( 'Hide Post Thumbnails', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_date',
			'name' => esc_html__( 'Hide Post Date', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_author',
			'name' => esc_html__( 'Hide Post Author', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_categories',
			'name' => esc_html__( 'Hide Post Categories', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_comment',
			'name' => esc_html__( 'Hide Post Comment', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'   => 'post_hidden_more_link',
			'name' => esc_html__( 'Hide Read More Button', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-archive',
		),
		array(
			'id'      => 'post_more_link_align',
			'name'    => esc_html__( 'Read More Button Position', 'edupro' ),
			'type'    => 'select',
			'options' => array(
				'left'   => esc_html__( 'Left', 'edupro' ),
				'center' => esc_html__( 'Center', 'edupro' ),
				'right'  => esc_html__( 'Right', 'edupro' ),
			),
			'std'     => 'left',
			'visible' => array( 'post_hidden_more_link', false ),
			'tab'     => 'post-archive',
		),
		array(
			'name'     => esc_html__( 'Pagination Style', 'edupro' ),
			'id'       => 'post_paging_style',
			'type'     => 'select',
			'options'  => array(
				'default' => esc_html__( 'Numeric', 'edupro' ),
				'click'   => esc_html__( 'Click To Load More', 'edupro' ),
				'scroll'  => esc_html__( 'Infinite Scroll', 'edupro' ),
			),
			'multiple' => false,
			'std'      => 'default',
			'tab'      => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Pagination Load More Text', 'edupro' ),
			'id'   => 'pagination_load_more_text',
			'type' => 'text',
			'std'  => esc_html__( 'Load more posts', 'edupro' ),
			'size' => 100,
			'tab'  => 'post-archive',
		),
		array(
			'name'     => esc_html__( 'Page Navigation Alignment', 'edupro' ),
			'id'       => 'post_paging_align',
			'type'     => 'select',
			'options'  => array(
				'left'   => esc_html__( 'Left', 'edupro' ),
				'center' => esc_html__( 'Center', 'edupro' ),
				'right'  => esc_html__( 'Right', 'edupro' ),
			),
			'multiple' => false,
			'std'      => 'left',
			'tab'      => 'post-archive',
		),
		array(
			'type' => 'heading',
			'name' => esc_html__( 'Post Colors', 'edupro' ),
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Post Title Color', 'edupro' ),
			'id'   => 'post_title_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Post Title Hover Color', 'edupro' ),
			'id'   => 'post_hover_title_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Post Meta (Author, Categories, ...) Color', 'edupro' ),
			'id'   => 'post_meta_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Date & Time Background', 'edupro' ),
			'id'   => 'post_date_bg',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Date & Time Color', 'edupro' ),
			'id'   => 'post_date_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Read More Button Background', 'edupro' ),
			'id'   => 'post_more_bg',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Read More Button Text Color', 'edupro' ),
			'id'   => 'post_more_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Read More Button Hover Background', 'edupro' ),
			'id'   => 'post_hover_more_bg',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name' => esc_html__( 'Read More Button Hover Color', 'edupro' ),
			'id'   => 'post_hover_more_color',
			'type' => 'color',
			'std'  => '',
			'tab'  => 'post-archive',
		),
		array(
			'name'    => esc_html__( 'Sidebar Layout', 'edupro' ),
			'id'      => 'post_single_layout',
			'type'    => 'image_select',
			'options' => array(
				'sidebar-left'  => 'http://i.imgur.com/Y2sxQ2R.png',
				'sidebar-right' => 'http://i.imgur.com/h7ONxhz.png',
				'no-sidebar'    => 'http://i.imgur.com/m7oQKvk.png',
			),
			'tab'     => 'post-single',
			'std'     => 'sidebar-right',
		),
		array(
			'id'   => 'post_single_hidden_author_meta',
			'name' => esc_html__( 'Hide Post Author', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_category_meta',
			'name' => esc_html__( 'Hide Post Category', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_comment_meta',
			'name' => esc_html__( 'Hide Post Comment', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_tag_meta',
			'name' => esc_html__( 'Hide Post Tag', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_social_link',
			'name' => esc_html__( 'Hide Social Links', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_nav',
			'name' => esc_html__( 'Hide Post Navigation', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_author',
			'name' => esc_html__( 'Hide Post Author', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'id'   => 'post_single_hidden_related',
			'name' => esc_html__( 'Hide Related Posts', 'edupro' ),
			'type' => 'checkbox',
			'tab'  => 'post-single',
		),
		array(
			'name'    => esc_html__( 'Number Of Related Posts', 'edupro' ),
			'id'      => 'post_related_per_page',
			'type'    => 'select',
			'options' => array(
				'3'  => '3',
				'6'  => '6'
			),
			'std'     => '3',
			'tab'     => 'post-single',
			'visible' => array( 'post_single_hidden_related', false ),
		),
	),
);