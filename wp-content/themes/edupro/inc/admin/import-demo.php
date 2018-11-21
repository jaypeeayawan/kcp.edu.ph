<?php
function edupro_import_files() {

	$edu_demo_url = trailingslashit( get_template_directory_uri() ) . 'demos/';

	return array(
		// 01 - Demo main
		array(
			'import_id'                  => '01-main',
			'import_file_name'           => 'Demo Main',
			'import_file_url'            => $edu_demo_url . '01-main/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '01-main/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '01-main/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '01-main/preview_image.jpg',
			'home_page'                  => 'Home Main',
			'blog_page'                  => 'Blog'
		),
		// 02 - Demo general-1
		array(
			'import_id'                  => '02-general-1',
			'import_file_name'           => 'Demo General 1',
			'import_file_url'            => $edu_demo_url . '02-general-1/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '02-general-1/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '02-general-1/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '02-general-1/preview_image.jpg',
			'home_page'                  => 'Home 1',
			'blog_page'                  => 'Blog'
		),
		//  03 - Demo edupro-general-2
		array(
			'import_id'                  => '03-general-2',
			'import_file_name'           => 'Demo General 2',
			'import_file_url'            => $edu_demo_url . '03-general-2/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '03-general-2/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '03-general-2/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '03-general-2/preview_image.jpg',
			'home_page'                  => 'Home 9',
			'blog_page'                  => 'Blog'
		),
		// 04 - Demo language-school
		array(
			'import_id'                  => '04-language-school',
			'import_file_name'           => 'Demo Language School',
			'import_file_url'            => $edu_demo_url . '04-language-school/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '04-language-school/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '04-language-school/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '04-language-school/preview_image.jpg',
			'home_page'                  => 'Home 2',
			'blog_page'                  => 'Blog'
		),

		// 05 - Demo university
		array(
			'import_id'                  => '05-university',
			'import_file_name'           => 'Demo University',
			'import_file_url'            => $edu_demo_url . '05-university/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '05-university/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '05-university/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '05-university/preview_image.jpg',
			'home_page'                  => 'Home 3',
			'blog_page'                  => 'Blog'
		),
		// 06 - Demo kindergarten
		array(
			'import_id'                  => '06-kindergarten',
			'import_file_name'           => 'Demo Kindergarten',
			'import_file_url'            => $edu_demo_url . '06-kindergarten/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '06-kindergarten/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '06-kindergarten/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '06-kindergarten/preview_image.jpg',
			'home_page'                  => 'Home 4',
			'blog_page'                  => 'Blog'
		),
		// 07 - Demo onlinecourse
		array(
			'import_id'                  => '07-onlinecourses',
			'import_file_name'           => 'Demo Online Course',
			'import_file_url'            => $edu_demo_url . '07-onlinecourses/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '07-onlinecourses/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '07-onlinecourses/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '07-onlinecourses/preview_image.jpg',
			'home_page'                  => 'Home 5',
			'blog_page'                  => 'Blog'
		),

		// 08 - Demo oneinstructor
		array(
			'import_id'                  => '08-oneinstructor',
			'import_file_name'           => 'Demo One Instructor',
			'import_file_url'            => $edu_demo_url . '08-oneinstructor/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '08-oneinstructor/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '08-oneinstructor/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '08-oneinstructor/preview_image.jpg',
			'home_page'                  => 'Home 6',
			'blog_page'                  => 'Blog'
		),
		// 09 - Demo coursehub
		array(
			'import_id'                  => '09-coursehub',
			'import_file_name'           => 'Demo Coursehub',
			'import_file_url'            => $edu_demo_url . '09-coursehub/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '09-coursehub/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '09-coursehub/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '09-coursehub/preview_image.jpg',
			'home_page'                  => 'Home 7',
			'blog_page'                  => 'Blog'
		),

		// Demo onecourse
		array(
			'import_id'                  => '10-onecourse',
			'import_file_name'           => 'Demo One Course',
			'import_file_url'            => $edu_demo_url . '10-onecourse/content.xml',
			'import_widget_file_url'     => $edu_demo_url . '10-onecourse/widgets.wie',
			'import_customizer_file_url' => $edu_demo_url . '10-onecourse/theme-options.dat',
			'import_preview_image_url'   => $edu_demo_url . '10-onecourse/preview_image.jpg',
			'home_page'                  => 'Home 8',
			'blog_page'                  => 'Blog'
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'edupro_import_files' );


/**
 * Setup the theme after importing demo.
 */
function edupro_after_import_setup( $demo ) {

	// Assign menus to their locations.
	$primary_menu = get_term_by( 'slug', 'primary', 'nav_menu' );
	$social       = get_term_by( 'slug', 'socials-menu', 'nav_menu' );
	$footer       = get_term_by( 'slug', 'footer-menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'menu-1' => $primary_menu->term_id,
		'menu-4' => $social->term_id,
		'menu-5' => $footer->term_id,
	) );


	edupro_set_pages( $demo );

	if( isset( $demo['import_id'] ) ) {
		edupro_import_sliders( $demo['import_id'] );
	}

}

add_action( 'pt-ocdi/after_import', 'edupro_after_import_setup' );


/**
 * Import exported revolution sliders
 *
 * @param $import_id
 */
function edupro_import_sliders( $import_id ) {

	if ( ! class_exists( 'RevSlider' ) ) {
		return;
	}

	$file = trailingslashit( get_template_directory() ) . 'demos/' . $import_id . '/slider.zip';

	if ( 'zip' != strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ) ) {
		return;
	}

	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	$slider = new RevSlider();

	$slider->importSliderFromPost( true, true, $file );
}


/**
 * Set frontpage and blog page
 */
function edupro_set_pages( $demo ) {

	if ( isset( $demo['home_page'] ) ) {
		$home = get_page_by_title( $demo['home_page'] );

		if ( $home ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home->ID ); // Front Page
		}
	}

	if ( isset( $demo['blog_page'] ) ) {
		$blog = get_page_by_title( $demo['blog_page'] );

		if ( $blog ) {
			update_option( 'page_for_posts', $blog->ID ); // Blog
		}
	}
}

