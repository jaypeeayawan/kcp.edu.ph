<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

	<?php if( is_singular( 'post' ) ): ?>
	<h4 class="edupro-comments-title">
		<?php
		printf( // WPCS: XSS OK.
			esc_html( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'edupro' ) ),
			number_format_i18n( get_comments_number() )
		);
		?>
	</h4>
	<?php endif; ?>

	<?php
	//Check show only Couses
	if ( ( is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) ) && defined( 'LEARNDASH_VERSION' ) )
	{ ?>

		<h2 class="comments-title">
			<?php esc_html_e( 'Reviews','edupro' ); ?>
		</h2>
		<div class="row">
			<div class="ratingCircle col-sm-4">
				<span class="rating-circle"><?php echo esc_html( edupro_score_rating() ); ?></span>
			</div>
			<div class="rating-breakdown col-sm-8">
				<ul data-view="ratingBreakdown" class="js-rating-breakdown">
					<?php for ( $i = 5; $i > 0; $i-- ) :   ?>
						<li class="key_<?php echo $i; ?>">
							<span class="rating-breakdown__key"><?php echo $i;
							esc_html_e( ' Star', 'edupro' ); ?> </span>
							<div class="rating-breakdown__meter">
								<div class="rating-breakdown__meter-bar">
									<div class="rating-breakdown__meter-progress" style="width: <?php echo esc_html( edupro_percent_rating( $i ) ); ?>;">0%</div>
								</div>
							</div>
							<span class="rating-breakdown__count"><?php echo esc_html( edupro_percent_rating( $i ) ); ?></span>
						</li>
					<?php endfor; ?>
				</ul>
			</div>
		</div>

		<?php
			//Check show only Courses.
			if ( ( is_post_type_archive( 'sfwd-courses' ) || is_singular( 'sfwd-courses' ) ) && ! edupro_get_setting( 'courses_single_hidden_rating' ) )
			{
				if( function_exists( 'rate_calculate' ) ){ echo rate_calculate(); }
				if( function_exists( 'edupro_total_rating' ) ){
				    printf( '<div class="rating-total">(%s Ratings)</div>', edupro_total_rating() );
				}
			}
	}	?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'edupro' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'edupro' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'edupro' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>
		<?php if( is_singular( 'sfwd-courses') ) { ?>
			<?php if( !edupro_get_setting( 'courses_single_hidden_listcomment' ) ) { ?>
				<ol class="comment-list">
					<?php
					wp_list_comments( array(
						'callback'   => 'edupro_comment',
						'style'      => 'ol',
						'short_ping' => true,
					) );
					?>
				</ol><!-- .comment-list -->

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
					<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
						<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'edupro' ); ?></h2>
						<div class="nav-links">

							<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'edupro' ) ); ?></div>
							<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'edupro' ) ); ?></div>

						</div><!-- .nav-links -->
					</nav><!-- #comment-nav-below -->
					<?php
				endif; // Check for comment navigation.
			}
		}else {
			?>
			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'callback'   => 'edupro_comment',
					'style'      => 'ol',
					'short_ping' => true,
				) );
				?>
			</ol><!-- .comment-list -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'edupro' ); ?></h2>
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'edupro' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'edupro' ) ); ?></div>

					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
				<?php
			endif; // Check for comment navigation.
		}
	 endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'edupro' ); ?></p>
	<?php
	endif;

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );

	comment_form( array(
		'title_reply'   => esc_html__( 'Leave a comment', 'edupro' ),
		'fields'        => array(
			'author' =>
				'<div class="comment__contact__comment clearfix">' .
				'<div class="comment__form__meta comment__form__author">' .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . $aria_req . ' placeholder="' . esc_html__( 'Your name', 'edupro' ) . ( $req ? ' *' : '' ) . '" /></div>',

			'email' =>
				'<div class="comment__form__meta comment__form__email">' .
				'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' placeholder="' . esc_html__( 'Your Email', 'edupro' ) . ( $req ? ' *' : '' ) . '"  /></div>',

			'url' =>
				'<div class="comment__form__meta comment__form__url">' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" placeholder="' . esc_html__( 'Website', 'edupro' ) . '" /></div>' .
				'</div>',
		),
		'comment_field' => '<p class="comment__form__comment"><textarea id="comment" name="comment" cols="45" rows="8" aria__required="true" placeholder="' . esc_html__( 'Your Comment', 'edupro' ) . '"></textarea></p>',
		'label_submit'  => esc_html__( 'Submit', 'edupro' ),
		'class_submit'  => 'submit button__style1',
		'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
	) );
	?>

</div><!-- #comments -->
