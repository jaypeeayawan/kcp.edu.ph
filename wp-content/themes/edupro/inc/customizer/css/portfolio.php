<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_portfolio() {
	$css = '';

	// Portfolio archive
	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		$portfolio_title_color       = edupro_get_setting( 'portfolio_title_color' );
		$portfolio_hover_title_color = edupro_get_setting( 'portfolio_hover_title_color','#7cb342' );
		$portfolio_overlay_color     = edupro_get_setting( 'portfolio_overlay_color' );
		$portfolio_overlay_opacity   = edupro_get_setting( 'portfolio_overlay_opacity' );
		$portfolio_hidden_icon_link  = edupro_get_setting( 'portfolio_hidden_icon_link' );
		$portfolio_cate_color        = edupro_get_setting( 'portfolio_cate_color' );
		$portfolio_catebg_color      = edupro_get_setting( 'portfolio_catebg_color' );

		$portfolio_grid_catebg_color     = edupro_get_setting( 'portfolio_grid_catebg_color' );
		$portfolio_grid_text_color       = edupro_get_setting( 'portfolio_grid_text_color' );
		$portfolio_grid_hidden_line      = edupro_get_setting( 'portfolio_grid_hidden_line' );
		$portfolio_grid_hover_text_color = edupro_get_setting( 'portfolio_grid_hover_text_color' );

		$css = sprintf(
			'body #page.site .projects.masonry .project .project__title a{ color:%s }
			body #page.site .projects.masonry .project .project__title a:hover{ color:%s }
			body #page.site .projects.masonry .project .project__image a:before{ 
				opacity:%s; background: linear-gradient(to bottom, transparent 0, %s %s ); }
			body #page.site .projects.masonry .project .project__image a:after { content: %s }
			body #page.site .projects.masonry .project .project__image .project__term-name { color:%s; background-color: %s }
			body #page.site .projects.grid .project .project__hover { background-color:%s }
			body #page.site .projects.grid .project .project__title,
			body #page.site .projects.grid .project .project__term-name { color:%s }
			body #page.site .projects.grid .project .project__title:after { background:%s;content: %s }
			body #page.site .projects.grid .project .project__title:hover { color:%s; }
			',
			$portfolio_title_color,
			$portfolio_hover_title_color,
			$portfolio_overlay_opacity,
			$portfolio_overlay_color,
			'75%',
			$portfolio_hidden_icon_link ? 'none' : '',
			$portfolio_cate_color,
			$portfolio_catebg_color,
			$portfolio_grid_catebg_color,
			$portfolio_grid_text_color,
			$portfolio_grid_text_color,
			$portfolio_grid_hidden_line ? 'none' : '',
			$portfolio_grid_hover_text_color

		);

	}

	// Portfolio single
	if ( is_singular( 'jetpack-portfolio' ) ) {
		$portfolio_content_pos             = edupro_get_setting( 'portfolio_content_pos', 'content-right' );
		$portfolio_single_title_color      = edupro_get_setting( 'portfolio_single_title_color', '#212121' );
		$off_uppercase_portfolio_title_na  = edupro_get_setting( 'off_uppercase_portfolio_title_na' );
		$off_uppercase_portfolio_title_rel = edupro_get_setting( 'off_uppercase_portfolio_title_rel' );

		$css = sprintf(
			'.single-jetpack-portfolio .jetpack-portfolio .entry-media { float:%s; }
			body.single-jetpack-portfolio .jetpack-portfolio .page-title { color:%s; }
			.single-jetpack-portfolio .post-navigation .nav-links a{ text-transform: %s; }
			.single-jetpack-portfolio .portfolio__related .portfolio__related-title { text-transform: %s; }
			',
			'content-right' == $portfolio_content_pos ? 'left' : 'right',
			$portfolio_single_title_color,
			$off_uppercase_portfolio_title_na ? 'none' : 'uppercase',
			$off_uppercase_portfolio_title_rel ? 'none' : 'uppercase'

		);
	}

	return $css;
}