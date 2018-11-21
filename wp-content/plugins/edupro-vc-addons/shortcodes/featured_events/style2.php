<div class="row">
	<?php  $z = 0;  ?>
	<?php $i = 0; while ( $query->have_posts() ) : $query->the_post(); $i++;
		if( $i == 1 || $i == 2) : ?>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="featured-event">
				<div class="featured-event__thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-6', ) ); ?>
					</a>
					<div class="featured-event__date">
						<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
						<div class="featured-event__day"><?php echo date_i18n("d", strtotime( $start ) ); ?></div>
						<div class="featured-event__month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
					</div>
				</div>
				<div class="featured-event__text">
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>
					<div class="featured-event__info">
						<div class="featured-event__time">
							<i class="fa fa-clock-o"></i>
							<?php edupro_even_time(); ?>
						</div>
						<div class="featured-event__location">
							<i class="fa fa-map-marker"></i> <?php echo esc_html( get_post_meta( get_the_ID(), 'location', true ) ); ?>
						</div>
					</div>
				</div>

				<div class="featured-event_summary clearfix">
				<?php
					$regex = '#\[vc_column_text\](.*?)\[\/vc_column_text\]#';
					preg_match_all( $regex, get_the_content(), $matches );
					if( ! empty( $matches[1][0] ) ) {
						echo wp_trim_words( $matches[1][0], 30);
					}else{
						edupro_content_limit( 30 , '', true );
					}
				?>
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php  $z ++;  ?>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 <?php  echo esc_attr( ( $z % 2 ) ? 'col-featured-event' : '' );  ?>">
			<div class="featured-event short-style">
				<div class="row">
					<div class="featured-block-img col-sm-4">
						<div class="featured-event__thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php if (has_post_thumbnail()):
									the_post_thumbnail('edupro-col-6');
								else: ?>
									<img src="http://placehold.it/570x390">
								<?php endif; ?>
							</a>
							<div class="featured-event__date">
								<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
								<div class="featured-event__day"><?php echo date_i18n("d", strtotime( $start ) ); ?></div>
								<div class="featured-event__month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
							</div>
						</div>
					</div>
					<div class="featured-block-text col-sm-8">
						<div class="featured-event__text">
							<h3>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="featured-event__info">
								<div class="featured-event__time">
									<i class="fa fa-clock-o"></i>
									<?php edupro_even_time(); ?>
								</div>
								<div class="featured-event__location">
									<i class="fa fa-map-marker"></i><?php echo esc_html( get_post_meta( get_the_ID(), 'location', true ) ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; endwhile; ?>
</div>