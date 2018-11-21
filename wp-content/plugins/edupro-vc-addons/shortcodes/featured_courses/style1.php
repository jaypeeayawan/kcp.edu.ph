<div class="row">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php require( plugin_dir_path( __FILE__  ) . 'loop-courses.php' ); ?>
	<?php endwhile; ?>
</div>