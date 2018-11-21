<?php
/**
 * Displays a course
 *
 * Available Variables:
 * $course_id 		: (int) ID of the course
 * $course 		: (object) Post object of the course
 * $course_settings : (array) Settings specific to current course
 *
 * $courses_options : Options/Settings as configured on Course Options page
 * $lessons_options : Options/Settings as configured on Lessons Options page
 * $quizzes_options : Options/Settings as configured on Quiz Options page
 *
 * $user_id 		: Current User ID
 * $logged_in 		: User is logged in
 * $current_user 	: (object) Currently logged in user object
 *
 * $course_status 	: Course Status
 * $has_access 	: User has access to course or is enrolled.
 * $materials 		: Course Materials
 * $has_course_content		: Course has course content
 * $lessons 		: Lessons Array
 * $quizzes 		: Quizzes Array
 * $lesson_progression_enabled 	: (true/false)
 * $has_topics		: (true/false)
 * $lesson_topics	: (array) lessons topics
 *
 * @since 2.1.0
 *
 * @package LearnDash\Course
 */
?>

<?php if ( $logged_in ) : ?>
	<span id="edupro_course_status">
		<b><?php printf( _x( '%s Status:', 'Course Status Label', 'edupro' ), LearnDash_Custom_Label::get_label( 'course' ) ); ?></b> <?php echo $course_status; ?>
		<br/>
	</span>
	<br/>

	<?php if ( ! empty( $course_certficate_link ) ) : ?>
		<div id="edupro_course_certificate">
			<a href='<?php echo esc_attr( $course_certficate_link ); ?>' class="btn-blue" target="_blank"><?php echo apply_filters( 'ld_certificate_link_label', esc_html__( 'PRINT YOUR CERTIFICATE', 'edupro' ), $user_id, $post->ID ); ?></a>
		</div>
		<br/>
	<?php endif; ?>
<?php endif; ?>
<?php echo $content; ?>

<?php if ( isset( $materials ) ) : ?>
	<div id="edupro_course_materials">
		<h4><?php printf( _x( '%s Materials', 'Course Materials Label', 'edupro' ), LearnDash_Custom_Label::get_label( 'course' ) ); ?></h4>
		<p><?php echo $materials; ?></p>
	</div>
<?php endif; ?>

<?php if ( $has_course_content ) : ?>
	<?php
		$show_course_content = true;
	if ( ! $has_access ) :
		if ( $course_meta['sfwd-courses_course_disable_content_table'] == 'on' ) :
			$show_course_content = false;
			endif;
		endif;

	if ( $show_course_content ) :
	?>

	<?php endif; ?>
<?php endif; ?>

