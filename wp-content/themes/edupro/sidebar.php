<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPro
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$post_layout = edupro_get_setting( 'post_layout' );
if ( 'no-sidebar' == $post_layout )
{
	return;
}

$class = 'sidebar-right' == $post_layout ? 'col-md-4' : 'col-md-4 col-md-pull-8';
?>
<div class="add_sticky_sidebar <?php echo esc_attr( $class ); ?>">
	<div class="main__sidebar">
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->
	</div>
</div>
