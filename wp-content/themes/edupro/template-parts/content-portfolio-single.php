<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TheM
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-8 entry-media">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full' );
			endif;
			?>
		</div>
		<div class="col-md-4">
			<div class="entry-text">
				<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupro' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</div>

			<?php
			$portfolio_single_hidden_cat       = edupro_get_setting( 'portfolio_single_hidden_cat' );
			$portfolio_single_hidden_tag       = edupro_get_setting( 'portfolio_single_hidden_tag' );
			$portfolio_single_hidden_share     = edupro_get_setting( 'portfolio_single_hidden_share' );

			if( empty( $portfolio_single_hidden_cat ) || empty( $portfolio_single_hidden_tag ) || empty( $portfolio_single_hidden_share ) ):  ?>
				<div class="portfolio-meta">
				<?php  if( empty( $portfolio_single_hidden_cat ) ):  ?>
					<div class="categories post-categories">
						<label><?php esc_html_e( 'Category', 'edupro' ); ?></label>
						<?php the_terms( '', 'jetpack-portfolio-type' ); ?>
					</div>
				<?php endif; ?>
				<?php  if( empty( $portfolio_single_hidden_tag ) ):  ?>
					<div class="tags post-tags">
						<label><?php esc_html_e( 'Tags', 'edupro' ); ?></label>
						<?php the_terms( get_the_ID(), 'jetpack-portfolio-tag', '', ', ' ); ?>
					</div>
				<?php endif; ?>
				<?php  if( empty( $portfolio_single_hidden_share ) ):  ?>
					<div class="share post-share">
						<label><?php esc_html_e( 'Share', 'edupro' ); ?></label>

						<div class="social__icon">
							<?php  get_template_part( 'template-parts/social-buttons' ); ?>
						</div>
					</div>
				<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-## -->



