<?php
class EduPro_Filter_Events {

	public function __construct() {
		add_action( 'wp_ajax_get_events', array( $this, 'get_events' ) );
		add_action( 'wp_ajax_nopriv_get_events', array( $this, 'get_events' ) );
	}

	public function get_events() {
		check_ajax_referer( 'nonce-events' );
		$this->query();
		wp_die();
	}

	protected function query() {
		$args = array(
			'post_type'      => 'event',
			'post_status'    => 'publish',
			'posts_per_page' => filter_input( INPUT_GET, 'posts_per_page' ),
			'paged'    => filter_input( INPUT_GET, 'paged' ),
		);

		// Sort
		$sort = filter_input( INPUT_GET, 'sort' );
		if ( $sort == 'all') {
			$args['orderby'] = '';
			$args['order'] = '';
			$args['meta_key'] =  '';
		};

		if ( $sort == 'happening') {
			$args['meta_query'] = array(
                'relation' => 'AND',
                array(
                        'key' => 'start_date',
                        'value' => date( "Y-m-d H:i:s" ),
                        'compare' => '<=',
                ),
                array(
                        'key' => 'end_date',
                        'value' => date( "Y-m-d H:i:s" ),
                        'compare' => '>=',
                ),
			);
		}

		if ( $sort == 'upcoming') {
			$args['meta_key']     = 'start_date';
			$args['meta_value']   = date( "Y-m-d H:i:s" ); // change to how "event date" is stored
			$args['meta_compare'] = '>';
		};

		if ( $sort == 'expired') {
			$args['meta_key']     = 'end_date';
			$args['meta_value']   = date( "Y-m-d H:i:s" ); // change to how "event date" is stored
			$args['meta_compare'] = '<';
		};


		$query = new WP_Query( $args );

		// List or grid
		$style = filter_input( INPUT_GET, 'style' );
		if( 'list' == $style ){ $style = ''; };
		$count = 0;

		$total_post_query = $query->post_count;

		if ( $query->have_posts() ) :
			echo '<div class="row">';
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part( 'template-parts/content-event', $style );
			endwhile;
			echo '</div>';
		endif;
		?>
		<div class="row">
			<div class="pagination">
				<?php
					$args = array(
						'current' => max( 1,filter_input( INPUT_GET, 'paged' ) ),
						'total' => $query->max_num_pages,
						'prev_text' => '<i class="fa fa-angle-left"></i>',
						'next_text' => '<i class="fa fa-angle-right"></i>',
					);
				?>
				<div class="nav-links">
					<?php echo paginate_links( $args ); ?>
				<div>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php
	}
}
