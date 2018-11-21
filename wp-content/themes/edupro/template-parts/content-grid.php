<?php
$post_hidden_thumb   = edupro_get_setting( 'post_hidden_thumb' );
$post_hidden_date    = edupro_get_setting( 'post_hidden_date' );
$post_hidden_comment = edupro_get_setting( 'post_hidden_comment' );
$post_layout         = edupro_get_setting( 'post_layout' );

$col = 'no-sidebar' == $post_layout ? 'col-md-4' : 'col-md-6';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-grid clearfix ' . $col ); ?>>
	<div class="item clearfix">
		<div class="blog__thumnail">
			<?php
			if ( ! $post_hidden_thumb ) {
				edupro_post_thumbnail( array(
					'before' => '<a href="' . get_permalink() . '" rel="bookmark">',
					'after'  => '</a>',
					'size'   => 'edupro-col-4',
					'scan'   => false,
				) );
			}
			?>
		</div>
		<div class="blog__content">
			<div class="blog__content__info">
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
				if ( ! $post_hidden_comment || ! $post_hidden_date ) : ?>
					<ul>
						<?php if ( ! $post_hidden_date ): ?>
							<li><i class="fa fa-clock-o"></i><?php the_time( 'M j, Y' ); ?></li>
						<?php endif; ?>
						<?php if ( ! $post_hidden_comment ): ?>
							<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>