<?php
/**
 * Template Name: Full Width
 * Description: Display content for the homepage.
 *
 * @package EduPro
 */

get_header();

$hide_title_breadcrumb = get_post_meta( get_the_ID(), 'hide_title_breadcrumb_page', true );
if( ! $hide_title_breadcrumb ) {
	get_template_part( 'template-parts/banner-top' );
}

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
