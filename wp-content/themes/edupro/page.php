<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

$hide_title_breadcrumb = get_post_meta( get_the_ID(), 'hide_title_breadcrumb_page', true );
if( ! $hide_title_breadcrumb ) {
	get_template_part( 'template-parts/banner-top' );
}
?>
	<div class="main container">
		<div class="row">
			<div class="main__content <?php echo esc_attr( ( function_exists('WC') ) && ( is_cart() || is_checkout() ) ? 'col-md-12' : 'col-md-8' ) ?> main__content-sticky">
				<div class="clearfix">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							echo '<div class="main__content__comments main__content__line">';
							comments_template();
							echo '</div>';
						}

					endwhile; // End of the loop.
					?>
				</div>
			</div>
			<?php
			$show_sidebar = true;

			if( function_exists('WC') ) {
				if( is_cart() || is_checkout() ) {
					$show_sidebar = false;
				}
			}
			?>
			<?php if ( $show_sidebar ): ?>
				<div class="col-md-4 main__content-sticky">
					<div class="main__sidebar">
						<?php 
							$sb_bbpress = get_post_meta( get_the_ID(), 'sidebar_bbpress', true );

							$name_sidebar = ( function_exists( 'is_bbpress' ) && $sb_bbpress ) ? 'sidebar-bbpress' : 'sidebar-1';

							dynamic_sidebar( $name_sidebar );
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer();
