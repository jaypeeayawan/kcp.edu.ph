<?php
require_once get_template_directory() . '/inc/widgets/recent-courses.php';
require_once get_template_directory() . '/inc/widgets/latest-posts.php';
require_once get_template_directory() . '/inc/widgets/latest-events.php';
require_once get_template_directory() . '/inc/widgets/filter-courses.php';
require_once get_template_directory() . '/inc/widgets/category-courses.php';
require_once get_template_directory() . '/inc/widgets/contact-info.php';
require_once get_template_directory() . '/inc/widgets/login-register.php';
require_once get_template_directory() . '/inc/widgets/social-media-links.php';
require_once get_template_directory() . '/inc/widgets/take-this-courses.php';
require_once get_template_directory() . '/inc/widgets/social-author.php';
require_once get_template_directory() . '/inc/widgets/author-infomation.php';
require_once get_template_directory() . '/inc/widgets/courses-infomation.php';
require_once get_template_directory() . '/inc/widgets/enrolled-student.php';
require_once get_template_directory() . '/inc/widgets/category-info.php';
require_once get_template_directory() . '/inc/widgets/tag-infomation.php';
require_once get_template_directory() . '/inc/widgets/relation-course.php';

add_action( 'widgets_init', 'edupro_register_widgets' );

/**
 * Register widgets
 */
function edupro_register_widgets() {
	register_widget( 'Edupro_Widget_Contact_Info' );
	register_widget( 'Edupro_Widget_Recent_Courses' );
	register_widget( 'Edupro_Widget_Latest_Events' );
	register_widget( 'Edupro_Widget_Latest_Posts' );
	register_widget( 'Edupro_Widget_Category_Courses' );
	register_widget( 'Edupro_Widget_Filter_Courses' );
	register_widget( 'EduPro_Widget_Login_Register' );
	register_widget( 'EduPro_Widget_Social_Links');
	register_widget( 'EduPro_Take_This_Courses' );
	register_widget( 'EduPro_Social_Author' );
	register_widget( 'EduPro_Author_Information' );
	register_widget( 'EduPro_Courses_Infomation' );
	register_widget( 'EduPro_Enrolled_Student' );
	register_widget( 'EduPro_Tag_Infomation' );
	register_widget( 'EduPro_Relation_Course' );
}
