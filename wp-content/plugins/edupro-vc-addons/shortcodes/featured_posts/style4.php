<div class="row">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<div class="lastest-news col-sm-<?php echo esc_html( $col ); ?>">
		<div class="lastest-news__thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-6', ) ); ?>
			</a>
		</div>
		<div class="lastest-news__text">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>	
			<div class="lastest-news__meta">
				<div class="lastest-news__time">
					<i class="fa fa-clock-o"></i>
					<?php the_time( get_option( 'date_format' ) ); ?>
				</div>
				<div class="lastest-news__comment">
					<a href="<?php echo get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i>
						<?php comments_number(); ?>
					</a>
				</div>
			</div>				
		</div>
	</div>
	<?php endwhile; ?>
</div>