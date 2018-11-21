<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EduPro
 */
get_header(); ?>

<header class="single__banner-top">
	<div class="container">
		<div class="single__breadcrumbs">
			<div class="breadcrumbs">
				<?php
				edupro_breadcrumbs( array(
					'separator'         => '<i class="fa fa-angle-right"></i>',
					'home_label'        => esc_html__( 'Home', 'edupro' ),
					'home_class'        => 'home',
					'before'            => '',
					'before_item'       => '',
					'after_item'        => '',
					'taxonomy'          => 'category',
					'display_last_item' => true,
				) );
				?>
			</div>
		</div>
	</div>
</header>

<div class="main container">
	<div class="row">
		<div class="col-sm-8 main__content main__content-sticky">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				endwhile; // End of the loop.
			?>

			<?php
				$lesson_id = learndash_get_setting( $post, 'lesson' );
				$posts = learndash_get_topic_list( $lesson_id );
				foreach ( $posts as $k => $p ) {
					if ( $p->ID == $post->ID ) {
						$found_at = $k;
						break;
					}
				}
				if ( isset( $found_at) && ! empty( $posts[ $found_at -1] ) ) {
					$title_prev = $posts[ $found_at -1]->post_title;
				}
				if ( isset( $found_at) && ! empty( $posts[ $found_at +1] ) ) {
					$title_next = $posts[ $found_at +1]->post_title;
				}

			?>
				<?php if( isset( $title_prev ) || isset( $title_next ) ): ?>
				<div class="main__content__pre__next clearfix main__content__line">
					<div class="col-sm-6 text-left">
						<h4><?php echo learndash_previous_post_link(); ?></h4>
						<h3><?php if ( isset( $title_prev ) ){ echo $title_prev; }?></h3>
					</div>
					<div class="col-sm-6 text-right">
						<h4><?php echo learndash_next_post_link(); ?></h4>
						<h3><?php if ( isset( $title_next ) ){ echo $title_next; }?></h3>
					</div>
				</div>
				<?php endif; ?>
				<?php
				$hidden_instructor  = edupro_get_setting( 'courses_single_hidden_instructor' );
				if( ! $hidden_instructor && get_the_author_meta( 'description' ) ): ?>
				<div class="main__content__author clearfix main__content__line">
					<div class="col-sm-2 avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
					</div>
					<div class="col-sm-10 author__info">
						<h3><?php the_author(); ?></h3>
						<div class="author__info__line">
							<div></div>
						</div>
						<p><?php echo nl2br( get_the_author_meta( 'description' ) ); ?></p>
					</div>
				</div>
				<?php endif; ?>
				<div class="main__content__related-posts main__content__line">
					<?php get_template_part( 'template-parts/related-posts' ); ?>
				</div>

			<div class="main__content__comments main__content__line">
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</div>

		<div class="col-sm-4 main__sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>

	</div>
</div>

<?php get_footer();
