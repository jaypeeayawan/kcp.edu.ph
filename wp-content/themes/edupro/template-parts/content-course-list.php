<div class="featured-course clearfix">
	<div class="featured-course__thumb col-md-6">
		<?php
		edupro_post_thumbnail( array(
			'before' => '<a href="' . get_permalink() . '" rel="bookmark">',
			'after'  => edupro_is_video_course() ? '<i class="fa fa-video-camera"></i></a>' : '</a>',
			'size'   => 'edupro-col-6',
			'scan'   => false,
		) );
		?>
	</div>
	<div class="featured-course__wrap col-md-6">
		<div class="featured-course__text">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php
				$courses_hidden_author = edupro_get_setting( 'courses_hidden_author' );
				if( ! $courses_hidden_author ) :
			?>
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
				<div class="featured-course__author"><?php the_author(); ?></div>
				<a class="featured-course__author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View profile', 'edupro' ); ?></a>
			<?php endif; ?>
		</div>
		<?php
		$hidden_price = edupro_get_setting( 'courses_hidden_des' );
		$courses_des  = edupro_content_limit( 25, '', false );

		if ( ! $hidden_price && !empty( $courses_des ) ):  ?>
		<div class="featured-course__des">
			<?php echo  wp_kses_post( $courses_des ); ?>
		</div>
		<?php endif; ?>

		<?php
		$hidden_price                        = edupro_get_setting( 'courses_hidden_price' );
		$courses_hidden_count_total_user     = edupro_get_setting( 'courses_hidden_count_total_user' );
		$courses_hidden_number_total_comment = edupro_get_setting( 'courses_hidden_number_total_comment' );

		if( !$hidden_price || ! $courses_hidden_count_total_user || ! $courses_hidden_number_total_comment ) :	?>
		<div class="featured-course__meta clearfix">
			<?php if( ! $hidden_price ){ ?>
			<a class="featured-course__type featured-course__type--<?php echo esc_attr( edupro_price_type( 'class' ) ); ?>" href="<?php the_permalink(); ?>">
				<?php edupro_price_type(); ?>
			</a>
			<?php } ?>
			<div class="featured-course__info">
				<?php if( ! $courses_hidden_number_total_comment ) { ?>
				<div class="featured-course__comments">
					<a href="<?php echo get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?></a>
				</div>
				<?php } ?>

				<?php  if( ! $courses_hidden_count_total_user ) {  ?>
				<?php
				$info = get_post_meta( get_the_ID(), '_sfwd-courses', true );
				$access_list = $info['sfwd-courses_course_access_list'];
				$access_list = array_filter( array_map( 'absint', explode( ',', $access_list . ',' ) ) );
				?>
				<div class="featured-course__users">
					<a href="<?php the_permalink(); ?>"><i class="fa fa-user"></i> <?php echo isset( $info['sfwd-courses_course_access_list'] ) ? intval( count( $access_list ) ) : 0; ?></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
