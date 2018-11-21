<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

get_template_part( 'template-parts/banner-top' );
?>
<?php
$pagination = edupro_get_setting( 'post_paging_style' );
$post_layout = edupro_get_setting( 'post_layout' );
if ( 'no-sidebar' == $post_layout ) {
	$class = 'col-md-12';
} elseif ( 'sidebar-left' == $post_layout ) {
	$class = 'col-md-8 col-md-push-4 sidebar-left';
} else {
	$class = 'col-md-8';
}
?>
<div class="main container">
	<div class="row">
	<div class="<?php echo esc_attr( $class ); ?> main__content main__content-sticky">
		<div id="content-posts" class="content-posts clearfix row edupro-infinite-scroll <?php echo esc_attr( $pagination ) ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    <!--LOOP POST-->
				<?php
					$style = edupro_get_setting( 'post_style' );
					get_template_part( 'template-parts/content', $style );
			      ?>
			<?php endwhile; ?>
				<div id="<?php  echo esc_attr( 'default' != $pagination ? 'infinite-handle' : '' );  ?>" class="<?php echo esc_attr( $pagination ) ?>">
					<?php
					if ( 'default' == $pagination ) {

						get_template_part( 'template-parts/pagination' );
					} else {
						$link = edupro_get_next_posts_link( edupro_get_setting( 'pagination_load_more_text' ) );
						if ( $link ) {
							echo $link;
						}
					}
					?>
				</div>
			<?php else : ?>
			<p><?php esc_html_e( 'No post.', 'edupro' ); ?></p>
		<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
