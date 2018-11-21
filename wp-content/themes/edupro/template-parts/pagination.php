<div class="col-sm-12 pagination">
	<?php
	$args = array(
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'next_text' => '<i class="fa fa-angle-right"></i>',
	);
	the_posts_pagination( $args );
	?>
</div>