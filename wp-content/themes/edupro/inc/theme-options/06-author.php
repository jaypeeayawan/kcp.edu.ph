<?php
/**
 * Options author of theme options.
 */
return array(
	'id'             => 'page-author',
	'title'          => esc_html__( 'Author', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'page-author',
	'fields'         => array(
		array(
			'name'    => esc_html__( 'Sort Author Courses by', 'edupro' ),
			'id'      => 'sort-course',
			'type'    => 'select',
			'options' => array(
				'trendding'         => esc_html__( 'Date', 'edupro' ),
				'post_rating_count' => esc_html__( 'Rating', 'edupro' ),
				'post_views_count'  => esc_html__( 'View', 'edupro' ),
			),
			'std'     => 'post_rating_count',
		),
	),
);
