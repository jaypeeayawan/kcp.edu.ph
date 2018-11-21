<?php
if ( is_home() && is_front_page() ) {
	return;
}
?>

<div class="archive__banner-top">
	<div class="container">
		<div class="archive__breadcrumbs">
			<div class="breadcrumbs">
				<?php if ( function_exists( 'is_shop' ) && (is_shop() || is_product_category() || is_singular( 'product' ) ) ) : ?>

					<?php woocommerce_breadcrumb(); ?>

				<?php elseif ( ! ( is_home() && is_front_page() ) ) : ?>
					<?php
					$taxonomy = 'category';

					if ( is_post_type_archive( 'jetpack-portfolio' ) || is_singular( 'jetpack-portfolio' ) ) {
						$taxonomy = 'jetpack-portfolio-type';
					} elseif ( is_post_type_archive( 'event' ) || is_singular( 'event' ) ) {
						$taxonomy = 'event_category';
					} elseif ( is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) ) {
						$taxonomy = 'course_category';
					}
					?>

					<nav class="content-breadcrumb">
						<?php
						edupro_breadcrumbs( array(
							'separator'         => '<i class="fa fa-angle-right"></i>',
							'home_label'        => esc_html__( 'Home', 'edupro' ),
							'home_class'        => 'home',
							'before'            => '',
							'before_item'       => '',
							'after_item'        => '',
							'taxonomy'          => $taxonomy,
							'display_last_item' => true,
						) );
						?>
					</nav>

				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
