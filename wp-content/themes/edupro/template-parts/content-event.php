<?php
$hide_date    = edupro_get_setting( 'event_hidden_date' );
$hide_time    = edupro_get_setting( 'event_hidden_time' );
$hide_address = edupro_get_setting( 'event_hidden_address' );
$hide_desc    = edupro_get_setting( 'event_hidden_description' );
?>
<div class="content__event col-md-12">
	<div class="content__event__container row">
		<div class="content__event__thumb col-sm-4">
			<?php if( empty( $hide_date ) ): ?>
			<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
			<div class="content__event__thumb__meta col-sm-1">
				<div class="date"><?php echo date_i18n("d", strtotime( $start ) ); ?></div>
				<div class="month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
			</div>
			<?php endif; ?>
			<?php
			edupro_post_thumbnail( array(
				'post'   => get_the_ID(),
				'size'   => 'edupro-col-4',
				'before' => '<a href="'. get_the_permalink( get_the_ID() ) .'" title="'. the_title_attribute( array( 'echo' => false ) ) .'">',
				'after'  => '</a>',
			) );
			?>
		</div>
		<div class="content__event__wrap col-sm-8">
			<div class="content__event__wrap__meta clearfix">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<?php if ( ! $hide_time || ! $hide_address ): ?>
					<ul>
						<?php if ( empty( $hide_time ) ): ?>
							<li><i class="fa fa-clock-o"></i>
							<?php edupro_even_time(); ?>
						<?php
						endif;
						if ( empty( $hide_address ) ):
							?>
							<li><i class="fa fa-map-marker"></i>&nbsp&nbsp<?php echo get_post_meta( get_the_ID(), 'location', true ); ?></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
			<?php if( empty( $hide_desc ) ): ?>
				<div class="content__event__wrap__content-event">
					<?php
					$event_content_limit = edupro_get_setting( 'event_content_limit' );
					edupro_content_limit( $event_content_limit , '', true );
					?>
				</div>
			<?php endif; ?>
			<!--button type="button" class="content__event__wrap__joinnow"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Join Now', 'edupro' ); ?></a></button-->
		</div>
	</div>
	<div class="content__event__line"></div>
</div>
