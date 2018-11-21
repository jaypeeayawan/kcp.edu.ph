<?php
if ( ! function_exists( 'edupro_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own edupro_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Twenty Ten 1.0
	 *
	 * @param object $comment The comment object.
	 * @param array  $args    An array of arguments. @see get_comment_reply_link()
	 * @param int    $depth   The depth of the comment.
	 */
	function edupro_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div id="comment-<?php comment_ID(); ?>">
						<div class="row">
							<div class="comment-author col-sm-2">
								<?php echo get_avatar( $comment, 90 ); ?>
							</div><!-- .comment-author .vcard -->
							<div class="comment-content col-sm-10">
								<div class="col-sm-6 author__comment">
									<div class="author-name">
										<?php echo get_comment_author_link(); ?>
										<div class="author__rating">
											<?php
												//Check show only Couses
												if ( ( is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) ) && defined( 'LEARNDASH_VERSION' ) )
												{
												    the_comment_rating();
												}
											?>
										</div>
									</div>
								</div>
								<div class="col-sm-6 reply__comment">
									<div class="reply">
										<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
									</div><!-- .reply -->
								</div>

								<div class="comment__date">
								<i class="fa fa-clock-o"></i>&nbsp&nbsp<?php
									$date = "F j, Y \a\\t g:i A";
									$comment_date = get_comment_date( $date );
									echo $comment_date;
								?></div>

								<?php if ( $comment->comment_approved == '0' ) : ?>
									<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'edupro' ); ?></em>
									<br />
								<?php endif; ?>
									<?php  get_the_title(); ?>
									<div class="comment-body"><?php comment_text(); ?></div>


							</div>
						</div>
					</div><!-- #comment-##  -->
				<?php
			break;
				case 'pingback'  :
				case 'trackback' :
					?>
					<li class="post pingback">
					<p><?php esc_attr_e( 'Pingback:', 'edupro' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'edupro' ), ' ' ); ?></p>
				<?php
			break;
			endswitch;
	}
	endif;


function edupro_score_rating() {
	global $wpdb;

	$sql = $wpdb->prepare(
		"SELECT AVG(comment_karma) FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_karma > 0 AND comment_approved = 1",
		get_the_ID()
	);
	$rating = $wpdb->get_var( $sql );

	$rating = number_format( $rating, 1 );
	return $rating;
}

function edupro_total_rating( $star = 0 ) {
	global $wpdb;

	$sql = $wpdb->prepare(
		"SELECT COUNT(comment_karma) FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_karma = %d AND comment_approved = 1",
		get_the_ID(), $star
	);
	if ( $star == 'all' ) {
		$sql = $wpdb->prepare(
			"SELECT COUNT(comment_karma) FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_karma > %d AND comment_approved = 1",
			get_the_ID(), $star
		);
	}
	$total = $wpdb->get_var( $sql );

	$total = (float) number_format( $total, 1, '.', '' );
	return $total;
}

function edupro_percent_rating( $star = 0 ) {

	if ( edupro_total_rating( 'all' ) != 0 ) {
		$percent = edupro_total_rating( $star ) / edupro_total_rating( 'all' ) * 100;
	} else {
		$percent = 0;
	}
	$percent = number_format( $percent ) . '%';
	return $percent;
}


?>
