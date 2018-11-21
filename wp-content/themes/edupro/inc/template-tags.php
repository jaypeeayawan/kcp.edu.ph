<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EduPro
 */

if ( ! function_exists( 'edupro_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function edupro_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

			$posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'edupro' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			$byline = sprintf(
				esc_html_x( 'by %s', 'post author', 'edupro' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'edupro_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edupro_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'edupro' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links"><strong>Tags: </strong>' . esc_html__( '%1$s', 'edupro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( esc_html__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'edupro' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function edupro_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'edupro_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'edupro_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so edupro_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so edupro_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in edupro_categorized_blog.
 */
function edupro_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'edupro_categories' );
}
add_action( 'edit_category', 'edupro_category_transient_flusher' );
add_action( 'save_post',     'edupro_category_transient_flusher' );

/**
 * Generate profile link for users and instructors.
 *
 * @param  string $type Profile type
 * @return string
 */
function edupro_profile_link( $type = '', $user_id = null ) {
	$user_id = $user_id ? $user_id : get_the_author_meta( 'ID' );
	$link = get_author_posts_url( $user_id );
	if( $type != '' ) {
		return add_query_arg( 'profile-type', $type, $link );
	}else{
		return $link;
	}
}

add_filter( 'widget_tag_cloud_args', 'edupro_tag_cloud_args' );
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'edupro_tag_cloud_args' );

/**
 * Change the tag could args
 * @param $args
 * @return mixed
 *
 */
function edupro_tag_cloud_args( $args )
{
	$args['largest']  = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit']     = 'px'; //tag font unit

	return $args;
}



add_filter( 'comment_form_fields', 'edupro_move_comment_field_to_bottom' );

/**
 * Moving the Comment Text Field to Bottom
 *
 * @param $fields
 * @return mixed
 */
function edupro_move_comment_field_to_bottom( $fields )
{
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

