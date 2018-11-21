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
		<div class="col-sm-8 main__content row main__content-sticky">
			<div class="clearfix">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; // End of the loop.
				?>
			</div>
			<?php
				$posts = learndash_get_lesson_list( $post );
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

			<div class="main__content__pre__next clearfix main__content__line">
				<div class="col-sm-6 text-left">
					<!--<h4><?php echo learndash_previous_post_link(); ?></h4>-->
					<h4><?php previous_post_link('%link', $title_prev); ?></h4>
					<!--<h3><?php if ( isset( $title_prev ) ){ echo $title_prev; }?></h3>-->
				</div>
				<div class="col-sm-6 text-right">
					<!--<h4><?php echo learndash_next_post_link( 'NEXT' ); ?></h4>-->
					<h4><?php next_post_link('%link', $title_next); ?></h4>
					<!--<h3><?php if ( isset( $title_next ) ){ echo $title_next; }?></h3>-->
				</div>
			</div>
			<div class="main__content__related-posts main__content__line">
				<?php get_template_part( 'template-parts/related-posts' ); ?>
			</div>
		</div>

		<div class="col-sm-4 main__sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>

	</div>
</div>

<?php get_footer();
