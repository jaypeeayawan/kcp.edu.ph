<?php
/**
 * The template for displaying the Portfolio archive page.
 *
 * @package Edupro
 */
get_header(); ?>
<?php get_template_part( 'template-parts/banner-top' ); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-md-9 portfolio-main main__content-sticky">
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>

						<?php
						$terms              = get_terms( 'jetpack-portfolio-type' );
						$hidden_filter      = edupro_get_setting( 'portfolio_hidden_filter' );
						$portfolio_style    = edupro_get_setting( 'portfolio_style' );
						$portfolio_all_text = edupro_get_setting( 'portfolio_all_text' );

						?>
						<?php if ( ! is_wp_error( $terms ) && ! empty( $terms ) && empty( $hidden_filter ) ) :  ?>
							<ul class="portfolio-filter text-center">
								<li class="active" data-filter="*"><?php echo esc_html( $portfolio_all_text ); ?></li>
								<?php
								foreach ( $terms as $term ) {
									echo '<li data-filter=".' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
								}
								?>
							</ul>
						<?php endif; ?>

						<div id="content-projects" class="portfolio-projects <?php echo get_theme_mod( 'portfolio_page_layout_style' ) ?>">
							<div class="row projects <?php echo esc_attr( $portfolio_style ); ?>">
								<?php
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-portfolio' );
								endwhile;
								?>
							</div>
						</div>
					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</main>
			</div>
			<?php get_sidebar('portfolio'); ?>
		</div>
	<!-- #main -->
</div>
</div><!-- #primary -->
<?php
get_footer();


