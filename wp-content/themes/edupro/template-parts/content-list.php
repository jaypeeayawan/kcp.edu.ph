<?php
$post_hidden_thumb      = edupro_get_setting( 'post_hidden_thumb' );
$post_hidden_date       = edupro_get_setting( 'post_hidden_date' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-list col-md-12 clearfix' ); ?>>
	<div class="item clearfix">
	<?php if ( has_post_thumbnail( get_the_ID() ) ): ?>
		<div class="blog__thumnail">
			<?php
			if( ! $post_hidden_thumb ) {
				edupro_post_thumbnail( array(
					'before' => '<a href="' . get_permalink() . '" rel="bookmark">',
					'after'  => '</a>',
					'size'   => 'edupro-col-12',
					'scan'   => false,
				) );
			}
			?>
		</div>
	<?php endif; ?>
		<div class="blog__content">
			<?php if( ! $post_hidden_date ) : ?>
			<div class="blog__content__date col-sm-1">
				<div class="date"><?php the_time( 'j' ); ?></div>
				<div class="month"><?php the_time( 'M' ); ?></div>
			</div>
			<?php endif; ?>
			<div class="blog__content__info col-sm-10">
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php get_template_part( 'template-parts/loop-meta' ); ?>
			</div>
			<div class="blog__content__line">
				<div></div>
			</div>
			<div class="blog__content__post col-md-12 row">
				<?php edupro_entry_content(); ?>
			</div>
		</div>
	</div>
</article>