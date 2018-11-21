<div class="testimonials__wrapper">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="testimonial clearfix">
			<div class="testimonial__text">
				<div class="testimonial__content">
					<?php the_content(); ?>
					<i class="fa fa-caret-down"></i>
				</div>
				<div class="testimonial__thumb">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>
<style>
	<?php if ( !empty( $atts['background_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .testimonial__content,
		.<?php echo esc_html( $unique_class ); ?> .testimonial__content i {
			background-color: <?php echo esc_html( $atts['background_color'] ); ?>;
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['text_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .testimonial__content {
			color: <?php echo esc_html( $atts['text_color'] ); ?>;
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['dots_border_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .slick-slider .slick-dots li button {
			border-color: <?php echo esc_html( $atts['dots_border_color'] ); ?>;
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['dots_active_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .slick-slider .slick-dots li.slick-active button {
			border-color: <?php echo esc_html( $atts['dots_active_color'] ); ?>;
			background: <?php echo esc_html( $atts['dots_active_color'] ); ?>;
		}
	<?php endif; ?>
</style>