<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

if ( filter_input( INPUT_GET, 'post_type' ) == 'sfwd-courses' ) {
	get_template_part( 'search-courses' );
	return;
}
?>

<?php get_header(); ?>

<header class="single__banner-top">
	<div class="container">
		<div class="single__breadcrumbs">
			<div class="breadcrumbs">
				<?php edupro_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</header>

<div class="main container">
	<?php get_search_form(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'edupro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</div>
		<?php
		$post_types = array();
		while ( have_posts() ) {
			the_post();
			$post_type = get_post_type();

			if ( ! isset( $post_types[ $post_type ] ) ) {
				$post_types[ $post_type ] = array();
			}
			$post_types[ $post_type ][] = get_the_id();
		}
		?>

		<?php foreach ( $post_types as $post_type => $ids ):
			$post_type_object = get_post_type_object( $post_type );
			?>
			<h4 class="search-title-post-type"><?php echo esc_html( $post_type_object->label ); ?></h4>
			<div class="row">
				<?php foreach ( $ids as $id ): ?>
					<div class="col-sm-3">
						<?php
						if ( has_post_thumbnail( $id ) ) {
							echo get_the_post_thumbnail( $id, 'edupro-col-4' );
						} else {
							echo '<img src="' . get_template_directory_uri() . '/img/thumb-default.png" />';
						}
						?>
						<h4><a href="<?php echo get_the_permalink( $id ); ?>" title="<?php the_title_attribute( $id ); ?>"><?php echo get_the_title( $id ); ?></a></h4>
					</div>
				<?php endforeach ?>
			</div>
		<?php endforeach ?>

	<?php else : ?>

		<h4 class="alert alert-danger"><?php esc_html_e( 'No results found!', 'edupro' ); ?></h4>

	<?php endif; ?>

	<div class="row">
		<?php get_template_part( 'template-parts/pagination' ); ?>
	</div>
</div>

<?php get_footer(); ?>
