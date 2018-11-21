<?php

class EduPro_Relation_Course extends WP_Widget {
	protected $default;

	public function __construct() {
		$this->default = array(
			'title' => ''
		);
		$widget_ops    = array(
			'classname'   => 'widget__courses-relation',
			'description' => esc_html__( 'Show relation course', 'edupro' )
		);
		parent::__construct( 'edupro-courses-relation', esc_html__( '.EduPro: Courses Relation', 'edupro' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->default );

		$args_query = array(
			'post_type'      => 'sfwd-courses',
			'author'         => get_the_author_meta( 'ID' ),
			'orderby'        => 'post_date',
			'order'          => 'ASC',
			'posts_per_page' => 4,
		);
		$query      = new WP_Query( $args_query );
		echo $args['before_widget'];

		$title    = $instance['title'] ? $instance['title'] : esc_html__( 'From', 'edupro' );
		?>
		<div class="inline course-relation__infomation">
			<h4 class="sidebar-single__title"><?php if ( ! empty( $instance['title'] ) ) {
					echo apply_filters( 'widget_title', $title ) . ' ';
				} ?><span><?php the_author(); ?></span></h4>
			<div class="course-relation__infomation__items">
				<?php
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post(); ?>

						<div class="course-relation__infomation__item">
							<?php
							edupro_post_thumbnail( array(
								'post'   => get_the_ID(),
								'size'   => 'thumbnail',
								'before' => '<a class="thumbnail" href="'. get_the_permalink( get_the_ID() ) .'" title="'. the_title_attribute( array( 'echo' => false ) ) .'">',
								'after'  => '</a>',
							) );
							?>
							<div class="excrept">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
						</div>

					<?php endwhile;
				endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->default );
		$title    = $instance['title'] ? $instance['title'] : esc_html__( 'From', 'edupro' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>" class="widefat" value="<?php echo esc_attr( $title ) ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}