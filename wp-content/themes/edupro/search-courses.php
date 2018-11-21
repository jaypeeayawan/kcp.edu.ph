<?php
/**
 * The template for displaying archive pages courses.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */


get_header(); ?>

<header class="single__banner-top">
	<div class="container">
		<div class="single__breadcrumbs">
			<div class="breadcrumbs">
				<?php echo edupro_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</header>

<div class="main container">
	<div class="main__content">
		<?php if ( have_posts() ) : ?>
				<div class="page-header alert alert-success">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'edupro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>

				<?php $count = 0; ?>
				<?php
				while ( have_posts() ) : the_post();
					if ( $count % 4 == 0 ) {
						echo '<div class="row">';
					}
					get_template_part( 'template-parts/content-course' );
					$count ++;
					if ( $count % 4 == 0 ) {
						echo '</div>';
					}
				endwhile;
				?>
		<?php else : ?>
			<p class="alert alert-danger"><?php esc_html_e( 'No Courses found ! Please try again.', 'edupro' ); ?></p>
		<?php endif; ?>
	</div>
	<div class="col-sm-12 pagination">
		<?php get_template_part( 'template-parts/pagination' ); ?>
	</div>
</div>

<?php get_footer(); ?>