<?php
$class     = array();
$terms     = get_the_terms( get_the_ID(), 'jetpack-portfolio-type' );
$term_name = '';

if ( $terms && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) {
		$class[] = $term->slug;
	}
	$term      = reset( $terms );
	$term_name = $term->name;
}

// Images sizes
$portfolio_col = edupro_get_setting( 'portfolio_column' );

$img_size = 'edupro-col-4';
$col_class = 'col-md-4';

if( ! is_singular( 'jetpack-portfolio' ) ) {
	if ( 'column-2' == $portfolio_col ) {
		$img_size  = 'edupro-col-6';
		$col_class = 'col-md-6';
	} elseif ( 'column-4' == $portfolio_col ) {
		$img_size  = 'edupro-col-3';
		$col_class = 'col-md-3';
	}
}


$portfolio_page_style = edupro_get_setting( 'portfolio_style' );

$class[] = $col_class;
$class[] = 'project project__content';
$class   = implode( ' ', $class );

$port_hidden_cate = edupro_get_setting( 'portfolio_hidden_categories' );

?>

<div <?php post_class( $class ) ?>>
	<div class="project__image">
		<a href="<?php the_permalink(); ?>">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( $img_size );
			else :
				echo '<img src="' . get_template_directory_uri()  . '/img/thumb-default.png" />';
			endif;
			?>
		</a>
		<?php  if( 'masonry' == $portfolio_page_style ):  ?>
			<?php if ( $term_name && empty( $port_hidden_cate ) ) : ?>
				<div class="project__term-name">
					<?php printf( '%s %s <span class="sep">,</span> %s', '<i class="fa fa-folder-open"></i>', $term_name, esc_html__( 'workshop', 'edupro' ) ); ?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="project__hover">
				<a class="project__hover_content" href="<?php the_permalink(); ?>">
					<?php if ( $term_name && empty( $port_hidden_cate ) ) : ?>
						<div class="project__term-name">
							<?php printf( '%s %s <span class="sep">,</span> %s', '<i class="fa fa-folder-open"></i>', $term_name, esc_html__( 'workshop', 'edupro' ) ); ?>
						</div>
					<?php endif; ?>
					<h4 class="project__title"><?php the_title(); ?></h4>
				</a>
			</div>
		<?php endif; ?>
	</div>
	<?php  if( 'masonry' == $portfolio_page_style ):  ?>
		<h4 class="project__title""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php endif; ?>

</div>
