<?php
if ( is_home() || is_front_page() || is_category() ) {
	$post_hidden_author     = edupro_get_setting( 'post_hidden_author' );
	$post_hidden_categories = edupro_get_setting( 'post_hidden_categories' );
	$post_hidden_comment    = edupro_get_setting( 'post_hidden_comment' );
}elseif ( is_singular( ) ) {
	$post_hidden_author     = edupro_get_setting( 'post_single_hidden_author_meta' );
	$post_hidden_categories = edupro_get_setting( 'post_single_hidden_category_meta' );
	$post_hidden_comment    = edupro_get_setting( 'post_single_hidden_comment_meta' );
}

if ( !empty( $post_hidden_author ) && !empty($post_hidden_categories) && !empty($post_hidden_comment ) ){
	return;
}
?>
<ul>
	<?php if ( empty( $post_hidden_author ) ): ?>
		<li><i class="fa fa-user"></i>&nbsp&nbsp<?php the_author(); ?></li>
	<?php endif; ?>
	<?php if ( empty( $post_hidden_categories ) && has_category() ): ?>
		<li><i class="fa fa-folder-open"></i>&nbsp&nbsp<?php the_category( ', ' ); ?></li>
	<?php endif; ?>
	<?php if ( empty( $post_hidden_comment ) ): ?>
		<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i>&nbsp&nbsp<?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></li>
	<?php endif; ?>
</ul>