<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

get_template_part( 'template-parts/banner-top' );
?>
<?php
$hide_filter = edupro_get_setting( 'event_hidden_filter' );
$event_archive_layout = edupro_get_setting( 'event_archive_layout' );
$event_archive_sort = edupro_get_setting( 'event_archive_sort' );
?>
<div id="content" class="container">
	<div id="primary">
			<main id="main" class="site-main <?php echo esc_attr( $event_archive_layout ); ?>-main" role="main">
				<?php if( empty( $hide_filter ) ): ?>
				<form id="form_itemsperpage" action="" method="get" role="form" class="row">
					<div class="col-md-8">
						<div class="content__orderby">
							<span class="content-all <?php echo esc_attr( 'all' == $event_archive_sort ? 'orderby_current' : '' ); ?>" data="all"><i class="fa fa-globe"></i><?php esc_html_e( 'All Event','edupro' ); ?></span>
							<span class="content-happening <?php echo esc_attr( 'happening' == $event_archive_sort ? 'orderby_current' : '' ); ?>" data="happening"><i class="fa fa-bolt "></i><?php esc_html_e( 'Happening','edupro' ); ?></span>
							<span class="content-upcoming <?php echo esc_attr( 'upcoming' == $event_archive_sort ? 'orderby_current' : '' ); ?>" data="upcoming"><i class="fa fa-star"></i><?php esc_html_e( 'Upcoming','edupro' ); ?></span>
							<span class="content-expired <?php echo esc_attr( 'expired' == $event_archive_sort ? 'orderby_current' : '' ); ?>" data="expired"><i class="fa fa-clock-o"></i><?php esc_html_e( 'Expired','edupro' ); ?></span>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<div class="content__control">
							<div class="content-style">
								<span class="content-grid <?php echo esc_attr( 'grid' == $event_archive_layout ? 'layout_current' : '' ); ?>" data="grid"><i class="fa fa-th-large"></i></span>
								<span class="content-list <?php echo esc_attr( 'list' == $event_archive_layout ? 'layout_current' : '' ); ?>" data="list"><i class="fa fa-list"></i></span>
							</div>

							<select class="items_per_page">
								<?php
								$numbers = array( 6, 9, 12 );
								$items_per_page = isset( $_GET['posts_per_page'] ) ? filter_input( INPUT_GET, 'posts_per_page', FILTER_SANITIZE_NUMBER_INT ) : get_option( 'posts_per_page' );
								foreach ( $numbers as $number ) {
									printf(
										'<option value="%s" %s>%s</option>',
										$number,
										selected( $items_per_page, $number, false ),
										sprintf( esc_html__( 'Showing %1$d of %2$d items', 'edupro' ),
											$number,
											$wp_query->found_posts
										)
									);
								};
								?>
							</select>
						</div>
					</div>
				</form>
				<?php endif; ?>
				<div class="events__item">
					<?php
					$style = filter_input( INPUT_GET, 'style' ) ? filter_input( INPUT_GET, 'style' ) : $event_archive_layout;
					if( 'list' == $style ){ $style = ''; };
					echo '<div class="row">';
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-event', $style );
					endwhile;
					echo '</div>';
					?>
					<div class="row">
						<?php get_template_part( 'template-parts/pagination' ); ?>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
</div>

<?php get_footer(); ?>