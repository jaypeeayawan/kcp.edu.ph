<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EduPro
 */

get_header(); ?>

<div class="archive__banner-top <?php  if ( edupro_is_video_course() ) { echo 'bg-dark'; } ?>">
	<div class="container">
		<div class="archive__breadcrumbs">
			<div class="breadcrumbs">
				<?php
				edupro_breadcrumbs( array(
					'separator'         => '<i class="fa fa-angle-right"></i>',
					'home_label'        => esc_html__( 'Home', 'edupro' ),
					'home_class'        => 'home',
					'before'            => '',
					'before_item'       => '',
					'after_item'        => '',
					'taxonomy'          => 'course_category',
					'display_last_item' => true,
				) );
				?>
			</div>
		</div>
	</div>
</div>

<div class="single__head <?php  if ( edupro_is_video_course() ) { echo 'bg-dark'; } ?>">
	<div class="container ">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2 class="page__title"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
</div>
<?php if ( edupro_is_video_course() ) :  ?>
	<div class="single__video">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<div class="col-sm-8">
						<div id="player"><?php do_action( 'edupro_iframe_video' ); ?></div>
					</div>
					<div class="col-sm-4 single__video-thumblist">
						<?php edupro_get_video( get_the_ID() ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="main__content-courses">
	<div class="container">
		<?php
		$courses_layout = edupro_get_setting( 'courses_single_layout' );
		$class_main = $class_sidebar = '';
		if ( 'sidebar-left' == $courses_layout ) {
			$class_main    = 'col-md-8 col-md-push-4';
			$class_sidebar = 'col-md-4 col-md-pull-8';
		} elseif ( 'no-sidebar' == $courses_layout ) {
			$class_main = 'col-md-12';
		} else {
			$class_main    = 'col-md-8';
			$class_sidebar = 'col-md-4';
		}
		?>
		<div class="row">
			<div class="main__content-sticky <?php echo esc_attr( $class_main ); ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();

						// set and update views
						if( function_exists('edupro_set_post_views') ){
							edupro_set_post_views( get_the_ID() );
						}
						if( function_exists( 'edupro_set_post_rating' ) ) {
							edupro_set_post_rating( get_the_ID() );
						}
						get_template_part( 'template-parts/content', 'sfwd-courses' );

					endwhile; // End of the loop.
					?>
					</main><!-- #main -->
				</div>
			</div><!-- #primary -->
			
			<?php if ( 'no-sidebar' != $courses_layout ) : ?>
				<aside id="secondary" class="<?php echo esc_attr( $class_sidebar ); ?> widget-area add_sticky_sidebar" role="complementary">
					<div class="sidebar-5 sidebar-single">
						<?php dynamic_sidebar( 'sidebar-5' ); ?>
					</div>
				</aside><!-- #secondary -->
		<?php endif; ?>
		</div>
	</div>
</div>
<?php if ( ! edupro_get_setting( 'courses_hidden_related' ) ): ?>
<div class="main__content__related-posts main__content__line">
	<div class="container">
		<div class="row">
			<?php get_template_part( 'template-parts/related-courses' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>
