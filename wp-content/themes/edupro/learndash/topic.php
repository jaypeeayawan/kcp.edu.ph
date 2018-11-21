<?php
/**
 * Displays a topic.
 *
 * Available Variables:
 *
 * $course_id 		: (int) ID of the course
 * $course 		: (object) Post object of the course
 * $course_settings : (array) Settings specific to current course
 * $course_status 	: Course Status
 * $has_access 	: User has access to course or is enrolled.
 *
 * $courses_options : Options/Settings as configured on Course Options page
 * $lessons_options : Options/Settings as configured on Lessons Options page
 * $quizzes_options : Options/Settings as configured on Quiz Options page
 *
 * $user_id 		: (object) Current User ID
 * $logged_in 		: (true/false) User is logged in
 * $current_user 	: (object) Currently logged in user object
 * $quizzes 		: (array) Quizzes Array
 * $post 			: (object) The topic post object
 * $lesson_post 	: (object) Lesson post object in which the topic exists
 * $topics 		: (array) Array of Topics in the current lesson
 * $all_quizzes_completed : (true/false) User has completed all quizzes on the lesson Or, there are no quizzes.
 * $lesson_progression_enabled 	: (true/false)
 * $show_content	: (true/false) true if lesson progression is disabled or if previous lesson and topic is completed.
 * $previous_lesson_completed 	: (true/false) true if previous lesson is completed
 * $previous_topic_completed	: (true/false) true if previous topic is completed
 *
 * @since 2.1.0
 *
 * @package LearnDash\Topic
 */
?>


<?php
/**
 * Topic Dots
 */
?>

<?php if ( $lesson_progression_enabled && ! $previous_topic_completed ) : ?>

	<span id="learndash_complete_prev_topic"><?php  echo sprintf( esc_html__( 'Please go back and complete the previous %s.', 'edupro' ), LearnDash_Custom_Label::label_to_lower( 'topic' ) ); ?></span>
	<br />

<?php elseif ( $lesson_progression_enabled && ! $previous_lesson_completed ) : ?>

	<span id="learndash_complete_prev_lesson"><?php echo sprintf( esc_html__( 'Please go back and complete the previous %s.', 'edupro' ), LearnDash_Custom_Label::label_to_lower( 'lesson' ) ); ?></span>
	<br />

<?php endif; ?>

<?php if ( $show_content ) :

    $content = get_post_field( 'post_content', $post->ID );
    $content = get_extended( $content );
	echo wpautop( $content['main'] );
    ?>

	<?php if ( ! empty( $quizzes ) ) : ?>
		<div id="learndash_quizzes">
			<div id="quiz_heading"><span><?php echo LearnDash_Custom_Label::get_label( 'quizzes' ); ?></span><span class="right"><?php esc_html__( 'Status', 'edupro' ) ?></span></div>

			<div id="quiz_list">
			<?php foreach ( $quizzes as $quiz ) : ?>
				<div id='post-<?php echo esc_attr( $quiz['post']->ID ); ?>' class='<?php echo esc_attr( $quiz['sample'] ); ?>'>
					<div class="list-count"><?php echo $quiz['sno']; ?></div>
					<h4>
						<a class='<?php echo esc_attr( $quiz['status'] ); ?>' href='<?php echo esc_attr( $quiz['permalink'] ); ?>'><?php echo $quiz['post']->post_title; ?></a>
					</h4>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( lesson_hasassignments( $post ) ) : ?>

		<?php $assignments = learndash_get_user_assignments( $post->ID, $user_id ); ?>

		<div id="learndash_uploaded_assignments">
			<h2><?php esc_html_e( 'Files you have uploaded', 'edupro' ); ?></h2>
			<table>
				<?php if ( ! empty( $assignments ) ) : ?>
					<?php foreach ( $assignments as $assignment ) : ?>
							<tr>
								<td><a href='<?php echo esc_attr( get_post_meta( $assignment->ID, 'file_link', true ) ); ?>' target="_blank"><?php echo esc_html__( 'Download', 'edupro' ) . ' ' . get_post_meta( $assignment->ID, 'file_name', true ); ?></a></td>
								<td><a href='<?php echo esc_attr( get_permalink( $assignment->ID ) ); ?>'><?php esc_html_e( 'Comments', 'edupro' ); ?></a></td>
							</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>

	<?php endif; ?>


	<?php
	/**
	 * Show Mark Complete Button
	 */
	?>

	<?php if ( $all_quizzes_completed ) : ?>
		<div class="learndash_mark_complete">
			<?php echo learndash_mark_complete( $post ); ?>
		</div>
	<?php endif; ?>

<?php endif; ?>

<?php if ( ! empty( $topics ) ) : ?>
	<div id='learndash_topic_dots-<?php echo esc_attr( $lesson_id ); ?>' class="learndash_topic_dots type-dots">

		<label class="label-topic"><?php esc_html_e( 'Learning Progress', 'edupro' ); ?></label>
		<?php $i=0; $j=0; ?>
		<?php foreach ( $topics as $key => $topic ) :
			if ( $topic->completed ){
				$j++;
			}
		    $i++; ?>
		<?php endforeach; ?>
		<?php $process__topic = $j/$i*100; ?>
		<div class="process-bar-topic">
			<div class="process-bar-color" style="width: <?php echo $process__topic; ?>%;"></div>
		</div>
	</div>
<?php endif; ?>
