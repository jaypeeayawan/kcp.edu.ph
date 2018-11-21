<?php
/**
 * Register course category taxonomy and unregister category.
 */
function edupro_create_courses_taxonomy() {
	$labels = array(
		'name'              => esc_html__( 'Course Category', 'edupro' ),
		'singular_name'     => esc_html__( 'Course Category', 'edupro' ),
		'search_items'      => esc_html__( 'Search Course Categories', 'edupro' ),
		'all_items'         => esc_html__( 'All Course Categories', 'edupro' ),
		'parent_item'       => esc_html__( 'Parent Course Category', 'edupro' ),
		'parent_item_colon' => esc_html__( 'Parent Course Category:', 'edupro' ),
		'edit_item'         => esc_html__( 'Edit Course Category', 'edupro' ),
		'update_item'       => esc_html__( 'Update Course Category', 'edupro' ),
		'add_new_item'      => esc_html__( 'Add New Course Category', 'edupro' ),
		'new_item_name'     => esc_html__( 'New Course Category Name', 'edupro' ),
		'menu_name'         => esc_html__( 'Course Categories', 'edupro' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);
	register_taxonomy( 'course_category', array( 'sfwd-courses' ), $args );
}
add_action( 'init', 'edupro_create_courses_taxonomy', 0 );

/**
 * Add category course into menu leardash.
 */
function edupro_learndash_menu() {
	add_submenu_page(
		'learndash-lms',
		esc_html__( 'Course Category', 'edupro' ),
		esc_html__( 'Course Category', 'edupro' ),
		'manage_options',
		'edit-tags.php?taxonomy=course_category'
	);

	add_submenu_page(
		'learndash-lms-non-existant',
		sprintf( _x( '%s Shortcodes', 'Course Shortcodes Label', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) ),
		sprintf( _x( '%s Shortcodes', 'Course Shortcodes Label', 'learndash' ), LearnDash_Custom_Label::get_label( 'course' ) ),
		'edit_courses',
		'learndash-lms-course_shortcodes',
		'learndash_course_shortcodes_page'
	);
}

/**
 * Fix link
 * @param $admin_tabs
 *
 * @return mixed
 */
function edupro_learndash_admin_tabs( $admin_tabs ) {

	if( isset( $admin_tabs['24']['link'] ) ) {
		$admin_tabs['24']['link'] = 'edit-tags.php?taxonomy=course_category&post_type=sfwd-courses';
	}

	if( isset( $admin_tabs['24']['menu_link'] ) ) {
		$admin_tabs['24']['menu_link'] = 'edit.php?post_type=sfwd-courses&taxonomy=course_category';
	}

	if( isset( $admin_tabs['24']['id'] ) ) {
		$admin_tabs['24']['id'] = 'edit-course_category';
	}

	return $admin_tabs;
}
add_filter( 'learndash_admin_tabs', 'edupro_learndash_admin_tabs' );

/**
 * Add tab to page edit course category
 *
 * @param $admin_tabs_on_page
 * @param $admin_tabs
 * @param $admin_tabs_on_page
 * @param $current_page_id
 *
 * @return array
 */
function edupro_learndash_current_admin_tabs_on_page( $admin_tabs_on_page_current_page_id , $admin_tabs, $admin_tabs_on_page, $current_page_id ) {

	$current_page_id = $current_page_id ? $current_page_id : get_current_screen()->id;
	if ( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'sfwd-courses' && 'edit-course_category' == $current_page_id ) {
		$admin_tabs_on_page_current_page_id = array( 0, 10, 28, 24, 26 );
	}

	return $admin_tabs_on_page_current_page_id;
}

add_filter( 'learndash_current_admin_tabs_on_page', 'edupro_learndash_current_admin_tabs_on_page' );
