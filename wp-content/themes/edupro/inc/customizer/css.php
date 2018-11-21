<?php

/**
 * Output custom CSS of the theme in <head>.
 */
class EduPro_Customizer_CSS {
	/**
	 * Add hook to <head> to output custom CSS.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'output' ) );
	}

	/**
	 * Output custom CSS.
	 */
	public function output() {
		if ( $css = $this->get_css() ) {
			wp_add_inline_style( 'edupro-style', $css );
		}
	}

	/**
	 * Get custom CSS.
	 */
	protected function get_css() {

		$css = '';
		$css .= edupro_customizer_general();
		$css .= edupro_customizer_main_color();
		$css .= edupro_customizer_custom_theme_color();
		$css .= edupro_customizer_topbar();
		$css .= edupro_customizer_header();
		$css .= edupro_customizer_css_portfolio();
		$css .= edupro_customizer_css_product();
		$css .= edupro_customizer_css_courses();
		$css .= edupro_customizer_css_blog();
		$css .= edupro_customizer_css_page();
		$css .= edupro_customizer_css_event();
		$css .= edupro_customizer_css_sidebar();
		$css .= edupro_customizer_css_footer();
		$css .= edupro_customizer_css_megamenu();
		$css .= $this->banner();

		// Allow modules to add custom CSS later (see Typography module)
		$css = apply_filters( get_template() . '_custom_css', $css );

		// Custom CSS has highest priority
		$css .= $this->custom();

		return $css;
	}

	/**
	 * Set background for title area: from theme option and page settings.
	 *
	 * @return string
	 */
	public function banner() {
		$banner = edupro_get_setting( 'header_image' );

		if ( $banner ) {
			return ".page__banner-top { background-image: url($banner); }";
		}
	}

	/**
	 * Get custom CSS entered by user in the Customizer.
	 *
	 * @return string
	 */
	protected function custom() {
		return get_theme_mod( 'custom_css' );
	}
}
new EduPro_Customizer_CSS;