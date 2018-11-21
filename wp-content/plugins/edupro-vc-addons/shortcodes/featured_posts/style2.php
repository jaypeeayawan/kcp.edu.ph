<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="lastest-news col-sm-<?php echo esc_html( $col ); ?>">
	<div class="lastest-news__thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-4', ) ); ?>
		</a>
	</div>
	<div class="lastest-news__text">
		<div class="lastest-news__meta">
			<div class="lastest-news__author">
				<i class="fa fa-user"></i>
				<a href="<?php echo esc_url( edupro_profile_link() ); ?>"><?php the_author(); ?></a>
			</div>
			<div class="lastest-news__time">
				<i class="fa fa-clock-o"></i>
				<?php the_time( get_option( 'date_format' ) ); ?>
			</div>
		</div>
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<a class="lastest-news__title__button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php echo esc_html( 'read more' ); ?>
		</a>
	</div>
</div>
<?php endwhile; ?>

