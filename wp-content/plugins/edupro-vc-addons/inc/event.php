<?php
add_action( 'init', 'edupro_event_register_post_type' );

/**
 *  Register event custom post type
 */
function edupro_event_register_post_type() {
	// Event
	$labels = array(
		'name'               => esc_html_x( 'Events', 'Post Type General Name', 'edupro-addons' ),
		'singular_name'      => esc_html_x( 'Event', 'Post Type Singular Name', 'edupro-addons' ),
		'menu_name'          => esc_html__( 'Events', 'edupro-addons' ),
		'parent_item_colon'  => esc_html__( 'Parent Event:', 'edupro-addons' ),
		'all_items'          => esc_html__( 'All Events', 'edupro-addons' ),
		'view_item'          => esc_html__( 'View Event', 'edupro-addons' ),
		'add_new_item'       => esc_html__( 'Add New Event', 'edupro-addons' ),
		'add_new'            => esc_html__( 'New Event', 'edupro-addons' ),
		'edit_item'          => esc_html__( 'Edit Event', 'edupro-addons' ),
		'update_item'        => esc_html__( 'Update Event', 'edupro-addons' ),
		'search_items'       => esc_html__( 'Search events', 'edupro-addons' ),
		'not_found'          => esc_html__( 'No events found', 'edupro-addons' ),
		'not_found_in_trash' => esc_html__( 'No events found in Trash', 'edupro-addons' ),
	);
	$args   = array(
		'labels'    => $labels,
		'public'    => true,
		'has_archive'   => true,
		'menu_icon' => 'dashicons-calendar',
		'supports'  => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'event', $args );
}

add_action( 'init', 'edupro_event_register_taxonomies', 0 );

/**
 * Register event taxonomies
 */
// Register Custom Taxonomy
function edupro_event_register_taxonomies() {
	// Event category
	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'edupro-addons' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'edupro-addons' ),
		'menu_name'                  => __( 'Categories', 'edupro-addons' ),
		'all_items'                  => __( 'All Categories', 'edupro-addons' ),
		'parent_item'                => __( 'Parent Category', 'edupro-addons' ),
		'parent_item_colon'          => __( 'Parent Category:', 'edupro-addons' ),
		'new_item_name'              => __( 'New Category Name', 'edupro-addons' ),
		'add_new_item'               => __( 'Add New Category', 'edupro-addons' ),
		'edit_item'                  => __( 'Edit Category', 'edupro-addons' ),
		'update_item'                => __( 'Update Category', 'edupro-addons' ),
		'view_item'                  => __( 'View Category', 'edupro-addons' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'edupro-addons' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'edupro-addons' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'edupro-addons' ),
		'popular_items'              => __( 'Popular categories', 'edupro-addons' ),
		'search_items'               => __( 'Search categories', 'edupro-addons' ),
		'not_found'                  => __( 'Not Found', 'edupro-addons' ),
		'no_terms'                   => __( 'No categories', 'edupro-addons' ),
		'items_list'                 => __( 'Categories list', 'edupro-addons' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'edupro-addons' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'event_category', array( 'event' ), $args );

	// Event tag
	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'edupro-addons' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'edupro-addons' ),
		'menu_name'                  => __( 'Tags', 'edupro-addons' ),
		'all_items'                  => __( 'All Tags', 'edupro-addons' ),
		'parent_item'                => __( 'Parent Tag', 'edupro-addons' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'edupro-addons' ),
		'new_item_name'              => __( 'New Tag Name', 'edupro-addons' ),
		'add_new_item'               => __( 'Add New Tag', 'edupro-addons' ),
		'edit_item'                  => __( 'Edit Tag', 'edupro-addons' ),
		'update_item'                => __( 'Update Tag', 'edupro-addons' ),
		'view_item'                  => __( 'View Tag', 'edupro-addons' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'edupro-addons' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'edupro-addons' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'edupro-addons' ),
		'popular_items'              => __( 'Popular tags', 'edupro-addons' ),
		'search_items'               => __( 'Search tags', 'edupro-addons' ),
		'not_found'                  => __( 'Not Found', 'edupro-addons' ),
		'no_terms'                   => __( 'No tags', 'edupro-addons' ),
		'items_list'                 => __( 'Tags list', 'edupro-addons' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'edupro-addons' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'event_tag', array( 'event' ), $args );
}

add_filter( 'rwmb_meta_boxes', 'edupro_event_register_meta_box' );

/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function edupro_event_register_meta_box( $meta_boxes ) {
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Event Information', 'edupro' ),
		'pages'  => array( 'event' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Location', 'edupro' ),
				'id'   => 'location',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Start Date', 'edupro' ),
				'id'   => 'start_date',
				'type' => 'datetime',
			),
			array(
				'name' => esc_html__( 'End Date', 'edupro' ),
				'id'   => 'end_date',
				'type' => 'datetime',
			),
			array(
				'name' => esc_html__( 'Ticket Price (Normal)', 'edupro' ),
				'id'   => 'ticket_price_nor',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Ticket Price (Vip)', 'edupro' ),
				'id'   => 'ticket_price_vip',
				'type' => 'text',
			),
		),
	);

	return $meta_boxes;
}

