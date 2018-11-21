<div class="row">
	<div class="featured-courses__filter">
		<ul>
			<li class="featured-courses__filter__active" data-filter="*"><?php esc_html_e( 'All', 'edupro-addons' ) ?></li>
			<?php
			// Get active terms for displaying portfolio items only.
			$active_terms = array();
			while ( $query->have_posts() ) {
				$query->the_post();
				$terms = get_the_terms( get_the_ID(), 'course_category' );
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$active_terms[ $term->slug ] = $term->name;
					}
				}
			}
			foreach ( $active_terms as $slug => $name ) {
				echo '<li data-filter=".' . esc_attr( $slug ) . '">' . esc_html( $name ) . '</li>';
			}
			?>
		</ul>
	</div>

	<div class="featured-courses__items">
		<?php
		$query->rewind_posts();
		while ( $query->have_posts() ) : $query->the_post();
			require( plugin_dir_path( __FILE__  ) . 'loop-courses.php' );
		endwhile;
		?>
	</div>
</div><!-- .content -->