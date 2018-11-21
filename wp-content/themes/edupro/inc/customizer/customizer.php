<?php
/**
 * Customizer module for the theme.
 */

// Output custom CSS to the <head>
if ( ! is_admin() ) {
	require get_template_directory() . '/inc/customizer/css.php';
	require get_template_directory() . '/inc/customizer/css/general.php';
	require get_template_directory() . '/inc/customizer/css/main-color.php';
	require get_template_directory() . '/inc/customizer/css/custom_theme_color.php';
	require get_template_directory() . '/inc/customizer/css/topbar.php';
	require get_template_directory() . '/inc/customizer/css/header.php';
	require get_template_directory() . '/inc/customizer/css/portfolio.php';
	require get_template_directory() . '/inc/customizer/css/woocommerce.php';
	require get_template_directory() . '/inc/customizer/css/courses.php';
	require get_template_directory() . '/inc/customizer/css/blog.php';
	require get_template_directory() . '/inc/customizer/css/page.php';
	require get_template_directory() . '/inc/customizer/css/event.php';
	require get_template_directory() . '/inc/customizer/css/footer.php';
	require get_template_directory() . '/inc/customizer/css/sidebar.php';
	require get_template_directory() . '/inc/customizer/css/megamenu.php';
}
