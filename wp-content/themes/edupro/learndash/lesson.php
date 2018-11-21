<?php
/**
 * Displays a lesson.
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
 *
 * $quizzes 		: (array) Quizzes Array
 * $post 			: (object) The lesson post object
 * $topics 		: (array) Array of Topics in the current lesson
 * $all_quizzes_completed : (true/false) User has completed all quizzes on the lesson Or, there are no quizzes.
 * $lesson_progression_enabled 	: (true/false)
 * $show_content	: (true/false) true if lesson progression is disabled or if previous lesson is completed.
 * $previous_lesson_completed 	: (true/false) true if previous lesson is completed
 * $lesson_settings : Settings specific to the current lesson.
 *
 * @since 2.1.0
 *
 * @package LearnDash\Lesson
 */
?>

<?php if ( @$lesson_progression_enabled && ! @$previous_lesson_completed ) : ?>
	<span id="learndash_complete_prev_lesson"><?php echo sprintf( esc_html__( 'Please go back and complete the previous %s.', 'edupro' ), LearnDash_Custom_Label::label_to_lower('lesson') ); ?></span><br />
	<?php add_filter( 'comments_array', 'learndash_remove_comments', 1, 2 ); ?>
<?php endif; ?>

<?php if ( $show_content ) : ?>

	<?php echo $content; ?>

	<?php
    /**
     * Lesson Topics
     */
    ?>
	<?php if ( ! empty( $topics ) ) : ?>
		<div id="learndash_lesson_topics_list">
            <div id='learndash_topic_dots-<?php echo esc_attr( $post->ID ); ?>' class="learndash_topic_dots type-list">
                <strong><?php printf( esc_html__( '%s %s', 'edupro'), LearnDash_Custom_Label::get_label( 'lesson' ), LearnDash_Custom_Label::get_label( 'topics' ) ); ?></strong>
                <ul>
                    <?php $odd_class = ''; ?>
					<?php $i = 1; ?>
                    <?php foreach ( $topics as $key => $topic ) : ?>

                        <?php $odd_class = empty( $odd_class ) ? 'nth-of-type-odd' : ''; ?>
                        <?php $completed_class = empty( $topic->completed ) ? 'topic-notcompleted' : 'topic-completed'; ?>

                        <li class='<?php echo esc_attr( $odd_class ); ?>'>
                        	<div class="topic_title"><span><i class="fa fa-file-o"></i><?php printf( 'Lecture %1$d', $i )?></span></div>
                            <div class="topic_item">
                                <a class='<?php echo esc_attr( $completed_class ); ?>' href='<?php echo esc_attr( get_permalink( $topic->ID ) ); ?>' title='<?php echo esc_attr( $topic->post_title ); ?>'>
                                    <span><?php echo $topic->post_title; ?></span>
                                </a>
                            </div>
							<?php $meta = get_post_meta( $topic->ID, '_' . $topic->post_type ); ?>
							<?php if ( $meta[0][ $topic->post_type . '_forced_lesson_time' ] ) :  ?>
							<?php $time = $meta[0][ $topic->post_type . '_forced_lesson_time' ]; ?>
							<span class="topic_time"><i class="fa fa-clock-o"></i>
							<?php echo gmdate( 'H : i : s', edupro_time_second( $time ) );?></span>
							<?php endif; ?>
                        </li>
					<?php $i++; ?>
                    <?php endforeach; ?>

                </ul>
            </div>
		</div>
	<?php endif; ?>


	<?php
    /**
     * Show Quiz List
     */
    ?>
	<?php if ( ! empty( $quizzes ) ) : ?>
		<div id="learndash_quizzes">
			<div id="quiz_heading"><span><?php echo LearnDash_Custom_Label::get_label( 'quizzes' ); ?></span><span class="right"><?php esc_html_e( 'Status', 'edupro' ); ?></span></div>
			<div id="quiz_list">

			<?php foreach ( $quizzes as $quiz ) : ?>
				<div id='post-<?php echo esc_attr( $quiz['post']->ID ); ?>' class='<?php echo esc_attr( $quiz['sample'] ); ?>'>
					<div class="list-count"><?php echo esc_attr( $quiz['sno'] ); ?></div>
					<h4>
						<a class='<?php echo esc_attr( $quiz['status'] ); ?>' href='<?php echo esc_attr( $quiz['permalink'] ); ?>'><?php echo $quiz['post']->post_title; ?></a>
					</h4>
				</div>
			<?php endforeach; ?>

			</div>
		</div>
	<?php endif; ?>


	<?php
    /**
     * Display Lesson Assignments
     */
    ?>
	<?php if ( lesson_hasassignments( $post ) ) : ?>
		<?php $assignments = learndash_get_user_assignments( $post->ID, $user_id ); ?>

		<div id="learndash_uploaded_assignments">
			<h2><?php esc_html_e( 'Files you have uploaded', 'edupro' ); ?></h2>
			<table>
				<?php if ( ! empty( $assignments ) ) : ?>
					<?php foreach( $assignments as $assignment ) : ?>
						<tr>
							<td>
								<a href='<?php echo esc_attr( get_post_meta( $assignment->ID, 'file_link', true ) ); ?>' target="_blank"><?php esc_html_e( 'Download', 'edupro' ) . ' ' . get_post_meta( $assignment->ID, 'file_name', true ); ?></a>
								<br />
								<span class="learndash_uploaded_assignment_points"><?php echo learndash_assignment_points_awarded( $assignment->ID ); ?></span>
							</td>
							<td><a href='<?php echo esc_attr( get_permalink( $assignment->ID ) ); ?>'><?php esc_html_e( 'Comments', 'edupro' ); ?></a></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
	<?php endif; ?>


	<?php
    /**
     * Display Mark Complete Button
     */
    ?>
	<?php if ( $all_quizzes_completed && $logged_in ) : ?>
        <?php echo learndash_mark_complete( $post ); ?>
	<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! empty( $topics ) ) : ?>
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
	<?php endif; ?>
