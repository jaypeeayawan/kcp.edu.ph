<div class="row">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="featured-post col-sm-<?php echo esc_html( $col ); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<div class="featured-post__thumb">
					<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-4', ) ); ?>
				</div>
			</a>
			<div class="featured-post__text">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<div class="featured-post__meta">
					<div class="featured-post__author">
						<i class="fa fa-user"></i>
						<a href="<?php echo esc_url( edupro_profile_link() ); ?>"><?php the_author(); ?></a>
					</div>
					<div class="featured-post__time">
						<i class="fa fa-clock-o"></i>
						<?php the_time( 'M j, Y' ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>