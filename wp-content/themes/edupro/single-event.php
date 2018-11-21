<?php
/**
 * The template for displaying all single event.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-event
 *
 * @package EduPro
 */
get_header(); ?>

<div class="single__banner-top">
	<div class="container">
		<div class="single__breadcrumbs">
			<div class="breadcrumbs">
				<?php
				edupro_breadcrumbs( array(
					'separator'         => '<i class="fa fa-angle-right"></i>',
					'home_label'        => esc_html__( 'Home', 'edupro' ),
					'home_class'        => 'home',
					'before'            => '',
					'before_item'       => '',
					'after_item'        => '',
					'taxonomy'          => 'event_category',
					'display_last_item' => true,
				) );
				?>
			</div>
		</div>
	</div>
</div>
<?php
$hide_start_time   = edupro_get_setting( 'event_single_start_time' );
$finish_time       = edupro_get_setting( 'event_single_finish_time' );
$hide_address      = edupro_get_setting( 'event_single_address' );
$hide_ticket_price = edupro_get_setting( 'event_single_ticket_price' );
$hide_share        = edupro_get_setting( 'event_single_share' );
?>
<div class="main container">

	<div class="row">
		<div class="main__content <?php echo esc_attr( ( function_exists('WC') ) && ( is_cart() || is_checkout() ) ? 'col-md-12' : 'col-md-8' ) ?> main__content-sticky">
			<div class="clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<h2 class="event_heading__title"><?php the_title(); ?></h2>
						<div class="event__content">
							<div class="event__thumnail">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
							<div class="entry-text">
								<?php
								while ( have_posts() ) : the_post();
									// set and update views
									if ( function_exists( 'edupro_set_post_views' ) ) {
										edupro_set_post_views( get_the_ID() );
									}
									the_content( sprintf(
										/* translators: %s: Name of current post. */
										wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edupro' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupro' ),
										'after'  => '</div>',
									) );

									endwhile; // End of the loop.
								?>
							</div>
						</div><!-- .event__content -->
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			</div>
		</div>

		<?php
		$show_sidebar = true;

		if( function_exists('WC') ) {
			if( is_cart() || is_checkout() ) {
				$show_sidebar = false;
			}
		}
		?>
		<?php if ( $show_sidebar ): ?>
			<div class="col-md-4 main__content-sticky">
				<div class="main__sidebar">
					<?php 
						$sb_bbpress = get_post_meta( get_the_ID(), 'sidebar_bbpress', true );

						$name_sidebar = ( function_exists( 'is_bbpress' ) && $sb_bbpress ) ? 'sidebar-bbpress' : 'sidebar-1';

						dynamic_sidebar( $name_sidebar );
					?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
