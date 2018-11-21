<?php
/**
 * Content in mega menu
 *
 * @since 1.0
 * @return HTML inner mega menu
 */

function edupro_return_html_mega_menu( $row, $list_cats ) {

	/* Check rows to show number posts */
	if ( ! isset ( $row ) || empty( $row ) ): $row = '1'; endif;

	$col     = 'col-mn-5 mega-row-1';
	$numbers = 5;
	if ( ! empty( $list_cats ) ) {
		$col     = 'col-mn-4 mega-row-1';
		$numbers = 4;
	}

	if ( '2' == $row ) {
		$col     = 'col-mn-5 mega-row-2';
		$numbers = 10;
		if ( ! empty( $list_cats ) ) {
			$col     = 'col-mn-4 mega-row-2';
			$numbers = 8;
		}
	} elseif ( '3' == $row ) {
		$col     = 'col-mn-5 mega-row-3';
		$numbers = 15;
		if ( ! empty( $list_cats ) ) {
			$col     = 'col-mn-4 mega-row-3';
			$numbers = 12;
		}
	}

	ob_start();
	?>
	<?php if ( ! empty( $list_cats ) ): ?>
		<div class="edupro-mega-child-categories">
			<?php $i = 1;

			$arr_has_mega = array(
				'category',
				'course_category',
				'jetpack-portfolio-type',
				'jetpack-portfolio-tag',
				'event_category',
				'event_tag',
				'product_cat',
				'product_tag'
			);

			foreach ( $list_cats as $list_cat ): ?>
				<?php
				$cat_id = isset( $list_cat['object_id'] ) ? $list_cat['object_id'] : '';
				$title  = isset( $list_cat['title'] ) ? $list_cat['title'] : '';
				$tax    = isset( $list_cat['object'] ) ? $list_cat['object'] : '';

				if ( empty( $cat_id ) || ! in_array( $tax, $arr_has_mega ) ) {
					continue;
				}

				printf( '<a class="mega-cat-child %s" data-id="edupro-mega-%s" href="%s" title="%s">%s</a>',
					( $i == 1 ) ? ' cat-active' : '',
					esc_attr( $cat_id ),
					esc_url( get_category_link( $cat_id ) ),
					sanitize_text_field( $title ),
					sanitize_text_field( $title )
				);
				?>
				<?php $i ++; endforeach; ?>
		</div>
	<?php endif; ?>

	<div class="edupro-content-megamenu">
		<div class="edupro-mega-latest-posts <?php echo esc_attr( $col ); ?>">
			<?php $j = 1;
			foreach ( $list_cats as $list_cat ): ?>
				<?php
				$cat_id = isset( $list_cat['object_id'] ) ? $list_cat['object_id'] : '';
				$tax    = isset( $list_cat['object'] ) ? $list_cat['object'] : '';

				if ( empty( $cat_id ) || empty( $tax ) || ! in_array( $tax, $arr_has_mega ) ) {
					continue;
				}

				$post_type = 'post';
				if ( 'course_category' == $tax ) {
					$post_type = 'sfwd-courses';
				} else if ( 'jetpack-portfolio-type' == $tax || 'jetpack-portfolio-tag' == $tax ) {
					$post_type = 'jetpack-portfolio';
				} else if ( 'event_category' == $tax || 'event_tag' == $tax ) {
					$post_type = 'event';
				} else if ( 'product_cat' == $tax || 'product_tag' == $tax ) {
					$post_type = 'product';
				}

				?>
				<div class="edupro-mega-row edupro-mega-<?php echo esc_attr( $cat_id ); ?><?php if ( $j == 1 ): echo ' row-active'; endif; ?>">
					<?php
					$attr = array(
						'post_type' => $post_type,
						'showposts' => $numbers,
						'tax_query' => array(
							array(
								'taxonomy' => $tax,
								'field'    => 'id',
								'terms'    => (int) $cat_id,
							),
						),
					);

					$latest_mega = new WP_Query( $attr );
					if ( $latest_mega->have_posts() ):
						while ( $latest_mega->have_posts() ): $latest_mega->the_post();
							?>
							<div class="edupro-mega-post">
								<div class="edupro-mega-thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php edupro_post_thumbnail( array( 'size' => 'edupro-col-3' ) ); ?>
									</a>
								</div>
								<div class="edupro-mega-meta">
									<h3 class="post-mega-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<?php if ( ! get_theme_mod( 'header_mega_date' ) ): ?>
										<p class="edupro-mega-date"><?php the_time( get_option( 'date_format' ) ); ?>

										</p>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
				<?php $j ++; endforeach; ?>
		</div>
	</div>

	<?php
	$return = ob_get_clean();

	return $return;
}
