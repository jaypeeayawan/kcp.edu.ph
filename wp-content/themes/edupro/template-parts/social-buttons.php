<?php
$link     = get_permalink();
$text     = get_the_title();
$img_link = get_the_post_thumbnail_url();
?>
<ul class="socials">
	<?php
	// Facebook
	printf(
		'<li><a class="facebook" target="_blank" title="%s" href="%s"><i class="fa fa-facebook"></i></a></li>',
		esc_html__( 'Share this on Facebook', 'edupro' ),
		htmlentities( add_query_arg( array(
			'u' => rawurlencode( $link ),
		), 'https://www.facebook.com/sharer/sharer.php' ) )
	);

	// Twitter
	printf(
		'<li><a class="twitter" target="_blank" title="%s" href="%s"><i class="fa fa-twitter"></i></a></li>',
		esc_html__( 'Tweet on Twitter', 'edupro' ),
		htmlentities( add_query_arg( array(
			'url'  => rawurlencode( $link ),
			'text' => rawurlencode( $text ),
		), 'https://twitter.com/intent/tweet' ) )
	);

	// Google+
	printf(
		'<li><a class="googleplus" target="_blank" title="%s" href="%s"><i class="fa fa-google-plus"></i></a></li>',
		esc_html__( 'Share on Google+', 'edupro' ),
		htmlentities( add_query_arg( array(
			'url' => rawurlencode( $link ),
		), 'https://plus.google.com/share' ) )
	);

	// Pinterest
	if ( $img_link )
	{
		printf(
			'<li><a class="pinterest" target="_blank" title="%s" href="%s"><i class="fa fa-pinterest-p"></i></a></li>',
			esc_html__( 'Pin it on Pinterest', 'edupro' ),
			htmlentities( add_query_arg( array(
				'url'         => rawurlencode( $link ),
				'media'       => rawurlencode( $img_link ),
				'description' => rawurlencode( $text ),
			), esc_url ( 'http://pinterest.com/pin/create/button' ) ) )
		);
	}


	// LinkedIn
	printf(
		'<li><a class="linkedin" target="_blank" title="%s" href="%s"><i class="fa fa-linkedin"></i></a></li>',
		esc_html__( 'Share on LinkedIn', 'edupro' ),
		htmlentities( add_query_arg( array(
			'mini'  => 'true',
			'url'   => rawurlencode( $link ),
			'title' => rawurlencode( $text ),
		), esc_url ('http://www.linkedin.com/shareArticle' ) ) )
	);
	?>
</ul>