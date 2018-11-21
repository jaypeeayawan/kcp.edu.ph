<div class="row">
	<div class="featured-courses__items">
		<?php
		$query->rewind_posts();
		while ( $query->have_posts() ) : $query->the_post();
			require( plugin_dir_path( __FILE__  ) . 'loop-courses-horizontal-s6.php' );
		endwhile;
		?>
	</div>
</div>