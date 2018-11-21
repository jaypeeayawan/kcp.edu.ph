<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_blog() {
	$css = '';

	//  Archive
	if ( is_home() || is_front_page() || is_category() ) {

		$hidden_more_link = edupro_get_setting( 'post_hidden_more_link' );
		$more_link_align  = edupro_get_setting( 'post_more_link_align' );
		$paging_align     = edupro_get_setting( 'post_paging_align' );

		// Color
		$title_color       = edupro_get_setting( 'post_title_color' );
		$hover_title_color = edupro_get_setting( 'post_hover_title_color' );
		$meta_color        = edupro_get_setting( 'post_meta_color' );
		$date_bg           = edupro_get_setting( 'post_date_bg' );
		$date_color        = edupro_get_setting( 'post_date_color' );
		$more_bg           = edupro_get_setting( 'post_more_bg' );
		$more_color        = edupro_get_setting( 'post_more_color' );
		$hover_more_bg     = edupro_get_setting( 'post_hover_more_bg' );
		$hover_more_color  = edupro_get_setting( 'post_hover_more_color' );


		$css .= $hidden_more_link ? '.content-list .blog__content .blog__content__readmore { display:none; }' : '';
		$css .= $more_link_align ? sprintf( '.blog__content .parent-more-link { text-align:%s; }', $more_link_align ) : '';
		$css .= $paging_align ? sprintf( '.main .pagination, .content-posts #infinite-handle { text-align:%s; }', $paging_align ) : '';

		// Color
		$css .= $title_color ? sprintf( 'body #page.site .blog__content .blog__content__info .title a { color:%s; }', $title_color ) : '';
		$css .= $hover_title_color ? sprintf( 'body #page.site .blog__content .blog__content__info .title a:hover { color:%s; }', $hover_title_color ) : '';
		$css .= $meta_color ? sprintf( 'body #page.site .blog__content .blog__content__info ul li, body #page.site .blog__content .blog__content__info a,  body #page.site .content-grid .blog__content .blog__content__info ul li a { color:%s; }', $meta_color ) : '';
		$css .= $date_bg ? sprintf( 'body #page.site .blog__content .blog__content__date { background-color:%s; }', $date_bg ) : '';
		$css .= $date_color ? sprintf( 'body .site#page .blog__content .blog__content__date .date, body .site#page .blog__content .blog__content__date .month { color:%s; }', $date_color ) : '';
		$css .= ( $more_bg || $more_color ) ? sprintf( 'body #page.site .blog__content .blog__content__readmore { background-color:%s;border-color:%s;color:%s; }', $more_bg, $more_bg, $more_color ) : '';
		$css .= ( $hover_more_bg || $hover_more_color ) ? sprintf( 'body #page.site .blog__content .blog__content__readmore:hover { background-color:%s;border-color:%s;color:%s; }', $hover_more_bg, $hover_more_bg, $hover_more_color ) : '';
	}

	// Single
	if ( is_singular( ) ) {

		// Layout
		$layout = edupro_get_setting( 'post_single_layout' );
		if ( 'sidebar-left' == $layout ) {
			$css .= '.single-post .main .main__content{ float:right;padding-right: 15px; padding-left:0; }
			.single-post .main .main__sidebar { float:left; }';
		} elseif ( 'no-sidebar' == $layout ) {
			$css .= '.single-post .main .main__content{ width:100% }';
		}


	}

	return $css;
}