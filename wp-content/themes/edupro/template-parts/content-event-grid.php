<?php
$hide_date    = edupro_get_setting( 'event_hidden_date' );
$hide_time    = edupro_get_setting( 'event_hidden_time' );
$hide_address = edupro_get_setting( 'event_hidden_address' );
$hide_desc    = edupro_get_setting( 'event_hidden_description' );
?>
<div class="featured-event col-sm-4">
	<div class="featured-event__thumb">
		<?php
		edupro_post_thumbnail( array(
			'post'   => get_the_ID(),
			'size'   => 'edupro-col-4',
			'before' => '<a href="'. get_the_permalink( get_the_ID() ) .'" title="'. the_title_attribute( array( 'echo' => false ) ) .'">',
			'after'  => '</a>',
		) );
		?>
		<?php if ( ! $hide_date ): ?>
		<div class="featured-event__date">
			<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
			<div class="featured-event__day"><?php echo date_i18n("d", strtotime( $start ) ); ?></div>
			<div class="featured-event__separator">/</div>
			<div class="featured-event__month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
		</div>
		<?php endif; ?>
	</div>
	<div class="featured-event__text">
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php if ( ! $hide_time || ! $hide_address ): ?>
		<div class="featured-event__info">
			<?php if ( empty( $hide_time ) ): ?>
			<div class="featured-event__time">
				<i class="fa fa-clock-o"></i>
				<?php edupro_even_time(); ?>
			</div>
			<?php
			endif;
			if ( empty( $hide_address ) ): 
			?>
			<div class="featured-event__location">
				<i class="fa fa-map-marker"></i> <?php echo esc_html( get_post_meta( get_the_ID(), 'location', true ) ); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php if( empty( $hide_desc ) ): ?>
			<div class="edupro-event-desc">
				<?php
				$event_content_limit = edupro_get_setting( 'event_content_limit' );
				edupro_content_limit( $event_content_limit , '', true );
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
