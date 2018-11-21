<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

?>
<article class="single__content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) : ?>
		<div class="blog__content__info clearfix">
			<?php get_template_part('template-parts/loop-meta'); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<div class="blog__thumnail">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edupro' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	$hidden_social_link = edupro_get_setting( 'post_single_hidden_social_link' );
	$hidden_tag_meta    = edupro_get_setting( 'post_single_hidden_tag_meta' );


	if( ! $hidden_social_link || ! $hidden_tag_meta ):
	?>
	<footer class="entry-footer">
		<div class="main__content__line">
			<?php
			if( empty( $hidden_tag_meta ) ) {
				edupro_entry_footer();
			}

			if( empty( $hidden_social_link ) ) {
				get_template_part( 'template-parts/social-buttons' );
			}
			?>
		</div>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
