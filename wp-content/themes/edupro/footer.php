<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPro
 */
?>

	</div><!-- #content -->

	<?php
	$footer_sidebars = array( 'footer', 'footer-2', 'footer-3', 'footer-4' );
	$has_widget      = false;
	foreach ( $footer_sidebars as $footer_sidebar ) {
		if ( is_active_sidebar( $footer_sidebar ) ) {
			$has_widget = true;
			break;
		}
	}
	?>

	<?php if ( $has_widget ) : ?>
		<?php
		$cols = edupro_get_setting( 'footer-columns' );
		$class = '';

		if ( '4' == $cols ) {
			$class = 'col-md-3';
		} elseif ( '3' == $cols ) {
			$class = 'col-md-4';
		} elseif ( '2' == $cols ) {
			$class = 'col-md-6';
		} else {
			$class = 'col-md-12';
		}

		?>
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php foreach ( $footer_sidebars as $footer_sidebar ) : ?>
						<?php if ( is_active_sidebar( $footer_sidebar ) ) : ?>
							<div class="column <?php echo esc_attr( $class ); ?> <?php echo esc_attr( $footer_sidebar ); ?>">
								<div class="widgets">
									<?php dynamic_sidebar( $footer_sidebar ); ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		<div class="col-md-6">
			<div class="site-info">
				<?php echo wp_kses_post( edupro_get_setting( 'footer_text' ) ); ?>
			</div><!-- .site-info -->
		</div>
		<div class="col-md-6">
			<?php if ( has_nav_menu( 'menu-5' ) ) : ?>
				<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'edupro' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-5',
						'container'      => '',
						'menu_class'     => 'footer-menu',
						'menu_id'        => 'footer-menu',
					) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_template_part( 'template-parts/mobile-sidebar' ); ?>
<?php if ( edupro_get_setting( 'go_to_top' ) ) : ?>
	<a href="#" id="scroll-to-top"><i class="fa fa-angle-up"></i></a>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
