<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<div class="popular_courses_s1__thumb">
		<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-4', ) ); ?>
		<?php if( edupro_score_rating( get_the_ID() ) !== '0.0' ): ?>
			<div class="rating-score"><?php esc_html_e( edupro_score_rating( get_the_ID() ) ); ?></div>
		<?php endif; ?>
	</div>
</a>
<div class="popular_courses_s1__text">
	<h3>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h3>
	<div class="popular_courses_s1__meta">
		<div class="popular_courses_s1__author">
			<i class="fa fa-user"></i>
			<a href="<?php echo esc_url( edupro_profile_link() ); ?>"><?php the_author(); ?></a>
		</div>
	</div>
</div>
