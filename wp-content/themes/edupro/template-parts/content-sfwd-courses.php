<?php
/**
 * Template part for displaying single courses.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */
?>
<?php
$hidden_curriculum  = edupro_get_setting( 'courses_single_hidden_curriculum' );
$hidden_instructor  = edupro_get_setting( 'courses_single_hidden_instructor' );
$hidden_review      = edupro_get_setting( 'courses_single_hidden_review' );
$hidden_listcomment = edupro_get_setting( 'courses_single_hidden_listcomment' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-full' ); ?>>

	<?php if ( ! edupro_is_video_course() && has_post_thumbnail() ) : ?>
		<div class="single__image">
			<?php the_post_thumbnail( 'full' );	?>
		</div>
	<?php endif;?>

	<ul class="nav nav-tabs courses-nav-tabs">
		<li class="active"><a href="#about" data-toggle="tab"><?php esc_html_e( 'About','edupro' ) ?></a></li>
		<?php if( ! $hidden_curriculum ): ?><li><a href="#curriculum" data-toggle="tab"><?php esc_html_e( 'Curriculum','edupro' ) ?></a></li><?php endif; ?>
		<?php if( ! $hidden_instructor && get_the_author_meta( 'description' ) ): ?><li><a href="#instructor" data-toggle="tab"><?php esc_html_e( 'Instructor','edupro' ) ?></a></li><?php endif; ?>
		<?php if( ! $hidden_review ): ?><li><a href="#comments" data-toggle="tab" class="tab-comments" ><?php esc_html_e( 'Reviews','edupro' ) ?></a></li><?php endif; ?>
	</ul>

	<div class="tab-content">
		<div id="about" class="tab-pane fade in active">
			<?php the_content(); ?>
		</div>

		<?php if( ! $hidden_curriculum ): ?>
		<div id="curriculum" class="tab-pane fade">
			<!--<h4 id="edupro_course_content_title"><?php esc_html_e( 'Curriculum', 'edupro' ) ?></h4>-->
			<?php $course = get_post( get_the_ID() );
			$lessons = learndash_get_course_lessons_list( $course );
			
			if(get_post_field('post_title', $course) == 'Secondary Education'): 
				if ( ! empty( $lessons ) ) :  ?>

				<div id="edupro_lessons">
					<div id="edupro_list">
						<?php foreach ( $lessons as $lesson ) : ?>
							<div id="lesson_heading">
								<h4><a class='<?php echo esc_attr( $lesson['status'] ); ?>' href='<?php echo esc_attr( $lesson['permalink'] ); ?>'><span class="fa fa-angle-right"></span> <?php echo $lesson['post']->post_title; ?></a></h4>
							</div>
						<?php endforeach;?>
					</div>
				</div>				
				
				<?php endif; 			
			else: 
				if ( ! empty( $lessons ) ) : ?>
					<div id="edupro_lessons">
						<div id="edupro_list">
							<?php foreach ( $lessons as $lesson ) : ?>
								<?php echo apply_filters('the_content', get_post_field('post_content', $lesson['post']->ID)); ?>
							<?php endforeach;?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			
		</div>
		<?php endif; ?>
	</div>

</article><!-- #post-## -->

