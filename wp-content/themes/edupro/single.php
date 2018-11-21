<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EduPro
 */
get_header(); ?>

<div class="single__banner-top">
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
</div>
<?php
$layout         = edupro_get_setting( 'post_single_layout' );
$hidden_nav     = edupro_get_setting( 'post_single_hidden_nav' );
$hidden_author  = edupro_get_setting( 'post_single_hidden_author' );
$hidden_related = edupro_get_setting( 'post_single_hidden_related' );
?>
<div class="main container">
	<div class="row">
		<div class="col-md-8 main__content main__content-sticky">
			<div class="clearfix">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					endwhile; // End of the loop.
				?>
			</div>
			<?php
			$next = get_next_post();
			$prev = get_previous_post();
			?>
			<?php if ( empty( $hidden_nav ) && ( $next || $prev ) ): ?>
				<div class="main__content__pre__next clearfix main__content__line">
					<div class="col-sm-6 text-left">
						<?php if( $prev ): ?>
						<h4><?php esc_html_e( 'Previous', 'edupro' ); ?></h4>
						<h3><a href="<?php the_permalink( $prev->ID ) ?>"><?php echo get_the_title( $prev->ID ) ?></a></h3>
						<?php endif; ?>
					</div>
					<div class="col-sm-6 text-right">
						<?php if( $next ): ?>
						<h4><?php esc_html_e( 'Next', 'edupro' ); ?></h4>
						<h3><a href="<?php the_permalink( $next->ID ) ?>"><?php echo get_the_title( $next->ID ) ?></a></h3>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( empty( $hidden_author ) && get_the_author_meta( 'description' ) ): ?>
				<div class="main__content__author clearfix main__content__line">
					<div class="col-sm-2 avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
					</div>
					<div class="col-sm-10 author__info">
						<h3><?php the_author(); ?></h3>
						<div class="author__info__line">
							<div></div>
						</div>
						<p><?php echo nl2br( get_the_author_meta( 'description' ) ); ?></p>
						<?php edupro_user_social_button( get_the_author_meta( 'ID' ) ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php
			if ( empty( $hidden_related ) ){
				get_template_part( 'template-parts/related-posts' );
			}
			?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				echo '<div class="main__content__comments main__content__line">';
				comments_template();
				echo '</div>';
			}
			?>
		</div>
		<?php if( 'no-sidebar' != $layout ): ?>
		<div class="col-md-4 add_sticky_sidebar">
			<div class="main__sidebar">
				<aside id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside><!-- #secondary -->
			</div>
		</div>
	<?php endif; ?>
	</div>
</div>

<?php get_footer();
