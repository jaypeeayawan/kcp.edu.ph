<?php
/**
 * The template for displaying user profile pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

get_template_part( 'template-parts/banner-top' );
?>

<div class="main container">
	<?php do_action( 'edupro_page_user', '[ld_profile user_id="' . absint( get_queried_object_id() ) . '" ]' ); ?>
</div>

<?php get_footer();
