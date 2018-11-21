<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

get_template_part( 'template-parts/banner-top' );

$courses_layout        = edupro_get_setting( 'courses_layout' );
$courses_hidden_filter = edupro_get_setting( 'courses_hidden_filter' );
$courses_style_default = edupro_get_setting( 'courses_style_default' );
$sort_courses_default  = edupro_get_setting( 'sort_courses_default' );

$class_main = $class_sidebar = '';
if ( 'sidebar-right' == $courses_layout ) {
	$class_main    = 'col-md-9';
	$class_sidebar = 'col-md-3';
} elseif ( 'no-sidebar' == $courses_layout ) {
	$class_main = 'col-md-12';
} else {
	$class_main    = 'col-md-9 col-md-push-3';
	$class_sidebar = 'col-md-3 col-md-pull-9';
}
?>
<div id="content" class="container">
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $class_main ); ?> main__content-sticky">
			<main id="main" class="site-main <?php echo esc_attr( $courses_style_default ); ?>-main" role="main">
				<?php if ( ! $courses_hidden_filter && have_posts() ): ?>
					<form id="form_itemsperpage" action="" method="get" role="form" class="row">
						<div class="col-md-8">
							<div class="content__orderby">
								<span class="content-counter <?php echo esc_attr( 'trendding' == $sort_courses_default ? 'orderby_current' : '' ); ?>" data="trendding"><i class="fa fa-bolt "></i><?php esc_html_e( 'Trending', 'edupro' ); ?></span>
								<span class="content-rating <?php echo esc_attr( 'rating' == $sort_courses_default ? 'orderby_current' : '' ); ?>" data="rating"><i class="fa fa-star"></i><?php esc_html_e( 'Best', 'edupro' ); ?></span>
								<span class="content-new <?php echo esc_attr( 'new' == $sort_courses_default ? 'orderby_current' : '' ); ?>" data="new"><i class="fa fa-clock-o"></i><?php esc_html_e( 'New', 'edupro' ); ?></span>
							</div>
						</div>
						<div class="col-md-4 text-right">
							<div class="content__control">
								<div class="content-style">
									<span class="content-grid <?php echo esc_attr( 'grid' == $courses_style_default ? 'layout_current' : '' ); ?>" data="grid"><i class="fa fa-th-large"></i></span>
									<span class="content-list <?php echo esc_attr( 'list' == $courses_style_default ? 'layout_current' : '' ); ?>" data="list"><i class="fa fa-list"></i></span>
								</div>

								<?php

								$taxonomy = get_queried_object()->term_id;
								$taxonomy = $taxonomy ? $taxonomy :'';

								$query_courses = new WP_Query( array(
									'post_type' => 'sfwd-courses',
									'tax_query' => array(
										array(
											'taxonomy' => 'course_category',
											'field'    => 'term_id',
											'terms'    => $taxonomy,
										),
									),
								) );
								$count_courses = $query_courses->post_count;

								if( ! empty( $count_courses ) ):

								$courses_per_page = intval( edupro_get_setting( 'courses_per_page' ) );
								$courses_per_page =  $count_courses > $courses_per_page ? $courses_per_page : $count_courses;
								?>
								<select class="items_per_page">
									<?php
									for ( $i = 1; $i <= $count_courses ; $i ++ ) {

										if ( $i > $count_courses ) {
											continue;
										}
										printf(
											'<option value="%s" %s>%s</option>',
											$i,
											selected( $courses_per_page, $i, false ),
											sprintf( esc_html__( 'Showing %s of %s items', 'edupro' ),
												$i,
												$count_courses
											)
										);
									};
									?>
								</select>
								<?php endif; ?>
							</div>
						</div>
					</form>
				<?php endif; ?>
				<div class="courses__item edupro__courses__items <?php echo esc_attr( $courses_style_default ); ?>">
					<div class="row">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-course', $courses_style_default );
							endwhile;
						}
						?>
					</div>
					<div class="edupro__pagination">
						<?php get_template_part( 'template-parts/pagination' ); ?>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php if ( 'no-sidebar' != $courses_layout ): ?>
			<aside id="secondary" class="<?php echo esc_attr( $class_sidebar ); ?> widget-area add_sticky_sidebar" role="complementary">
				<div class="sidebar-3">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			</aside><!-- #secondary -->
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
