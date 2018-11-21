<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Edupro
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-portfolio', 'single' );

					$portfolio_single_hidden_nav = edupro_get_setting( 'portfolio_single_hidden_nav' );
					$portfolio_hidden_related    = edupro_get_setting( 'portfolio_hidden_related' );

					if( empty( $portfolio_single_hidden_nav ) ) {
						$portfolio_title_next_nav          = edupro_get_setting( 'portfolio_title_next_nav' );
						$portfolio_title_prev_nav          = edupro_get_setting( 'portfolio_title_prev_nav' );

						the_post_navigation( array(
							'prev_text' => '<i class="fa fa-long-arrow-left"></i>' . esc_html( $portfolio_title_prev_nav ),
							'next_text' => esc_html( $portfolio_title_next_nav ) . '<i class="fa fa-long-arrow-right"></i>',
						) );
					}

				endwhile; // End of the loop.


				if ( empty( $portfolio_hidden_related ) ) {
					get_template_part( 'template-parts/related-portfolio' );
				}
				?>
			</div>
		</main>
		<!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
