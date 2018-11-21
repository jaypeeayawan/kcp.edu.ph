<?php

/**
 * Helper class.
 */
class EduPro_Helper {

	function __construct() {
		add_action( 'edupro_iframe_video', array( $this, 'iframe_video' ) );
		add_filter( 'vc_google_fonts_get_fonts_filter', array( $this, 'add_google_fonts' ) );
	}

	function iframe_video() {
		echo '<iframe width="770" height="433" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';
	}

	/**
	 * Get Currency symbol.
	 *
	 * @param string $currency (default: '')
	 *
	 * @return string
	 */
	public static function get_currency_symbol( $currency = '' ) {
		$symbols = array(
			'AED' => '&#x62f;.&#x625;',
			'AFN' => '&#x60b;',
			'ALL' => 'L',
			'AMD' => 'AMD',
			'ANG' => '&fnof;',
			'AOA' => 'Kz',
			'ARS' => '&#36;',
			'AUD' => '&#36;',
			'AWG' => '&fnof;',
			'AZN' => 'AZN',
			'BAM' => 'KM',
			'BBD' => '&#36;',
			'BDT' => '&#2547;&nbsp;',
			'BGN' => '&#1083;&#1074;.',
			'BHD' => '.&#x62f;.&#x628;',
			'BIF' => 'Fr',
			'BMD' => '&#36;',
			'BND' => '&#36;',
			'BOB' => 'Bs.',
			'BRL' => '&#82;&#36;',
			'BSD' => '&#36;',
			'BTC' => '&#3647;',
			'BTN' => 'Nu.',
			'BWP' => 'P',
			'BYR' => 'Br',
			'BZD' => '&#36;',
			'CAD' => '&#36;',
			'CDF' => 'Fr',
			'CHF' => '&#67;&#72;&#70;',
			'CLP' => '&#36;',
			'CNY' => '&yen;',
			'COP' => '&#36;',
			'CRC' => '&#x20a1;',
			'CUC' => '&#36;',
			'CUP' => '&#36;',
			'CVE' => '&#36;',
			'CZK' => '&#75;&#269;',
			'DJF' => 'Fr',
			'DKK' => 'DKK',
			'DOP' => 'RD&#36;',
			'DZD' => '&#x62f;.&#x62c;',
			'EGP' => 'EGP',
			'ERN' => 'Nfk',
			'ETB' => 'Br',
			'EUR' => '&euro;',
			'FJD' => '&#36;',
			'FKP' => '&pound;',
			'GBP' => '&pound;',
			'GEL' => '&#x10da;',
			'GGP' => '&pound;',
			'GHS' => '&#x20b5;',
			'GIP' => '&pound;',
			'GMD' => 'D',
			'GNF' => 'Fr',
			'GTQ' => 'Q',
			'GYD' => '&#36;',
			'HKD' => '&#36;',
			'HNL' => 'L',
			'HRK' => 'Kn',
			'HTG' => 'G',
			'HUF' => '&#70;&#116;',
			'IDR' => 'Rp',
			'ILS' => '&#8362;',
			'IMP' => '&pound;',
			'INR' => '&#8377;',
			'IQD' => '&#x639;.&#x62f;',
			'IRR' => '&#xfdfc;',
			'ISK' => 'Kr.',
			'JEP' => '&pound;',
			'JMD' => '&#36;',
			'JOD' => '&#x62f;.&#x627;',
			'JPY' => '&yen;',
			'KES' => 'KSh',
			'KGS' => '&#x43b;&#x432;',
			'KHR' => '&#x17db;',
			'KMF' => 'Fr',
			'KPW' => '&#x20a9;',
			'KRW' => '&#8361;',
			'KWD' => '&#x62f;.&#x643;',
			'KYD' => '&#36;',
			'KZT' => 'KZT',
			'LAK' => '&#8365;',
			'LBP' => '&#x644;.&#x644;',
			'LKR' => '&#xdbb;&#xdd4;',
			'LRD' => '&#36;',
			'LSL' => 'L',
			'LYD' => '&#x644;.&#x62f;',
			'MAD' => '&#x62f;. &#x645;.',
			'MDL' => 'L',
			'MGA' => 'Ar',
			'MKD' => '&#x434;&#x435;&#x43d;',
			'MMK' => 'Ks',
			'MNT' => '&#x20ae;',
			'MOP' => 'P',
			'MRO' => 'UM',
			'MUR' => '&#x20a8;',
			'MVR' => '.&#x783;',
			'MWK' => 'MK',
			'MXN' => '&#36;',
			'MYR' => '&#82;&#77;',
			'MZN' => 'MT',
			'NAD' => '&#36;',
			'NGN' => '&#8358;',
			'NIO' => 'C&#36;',
			'NOK' => '&#107;&#114;',
			'NPR' => '&#8360;',
			'NZD' => '&#36;',
			'OMR' => '&#x631;.&#x639;.',
			'PAB' => 'B/.',
			'PEN' => 'S/.',
			'PGK' => 'K',
			'PHP' => '&#8369;',
			'PKR' => '&#8360;',
			'PLN' => '&#122;&#322;',
			'PRB' => '&#x440;.',
			'PYG' => '&#8370;',
			'QAR' => '&#x631;.&#x642;',
			'RMB' => '&yen;',
			'RON' => 'lei',
			'RSD' => '&#x434;&#x438;&#x43d;.',
			'RUB' => '&#8381;',
			'RWF' => 'Fr',
			'SAR' => '&#x631;.&#x633;',
			'SBD' => '&#36;',
			'SCR' => '&#x20a8;',
			'SDG' => '&#x62c;.&#x633;.',
			'SEK' => '&#107;&#114;',
			'SGD' => '&#36;',
			'SHP' => '&pound;',
			'SLL' => 'Le',
			'SOS' => 'Sh',
			'SRD' => '&#36;',
			'SSP' => '&pound;',
			'STD' => 'Db',
			'SYP' => '&#x644;.&#x633;',
			'SZL' => 'L',
			'THB' => '&#3647;',
			'TJS' => '&#x405;&#x41c;',
			'TMT' => 'm',
			'TND' => '&#x62f;.&#x62a;',
			'TOP' => 'T&#36;',
			'TRY' => '&#8378;',
			'TTD' => '&#36;',
			'TWD' => '&#78;&#84;&#36;',
			'TZS' => 'Sh',
			'UAH' => '&#8372;',
			'UGX' => 'UGX',
			'USD' => '&#36;',
			'UYU' => '&#36;',
			'UZS' => 'UZS',
			'VEF' => 'Bs F',
			'VND' => '&#8363;',
			'VUV' => 'Vt',
			'WST' => 'T',
			'XAF' => 'Fr',
			'XCD' => '&#36;',
			'XOF' => 'Fr',
			'XPF' => 'Fr',
			'YER' => '&#xfdfc;',
			'ZAR' => '&#82;',
			'ZMW' => 'ZK',
		);

		return isset( $symbols[ $currency ] ) ? $symbols[ $currency ] : '';
	}

	/**
	 * Get list of terms.
	 *
	 * @param string $taxonomy
	 *
	 * @return array
	 */
	public static function get_terms( $taxonomy = 'category' ) {
		$terms   = get_terms( array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => true,
		) );
		$options = array(
			esc_html__( 'All', 'edupro-addons' ) => '',
		);
		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[ $term->name ] = $term->term_id;
			}
		}

		return $options;
	}

	public static function edu_list_categories() {
		$args2 = array(
			'taxonomy'         => 'course_category',
			'show_count'       => true,
			'hierarchical'     => true,
			'echo'             => 0,
			'title_li'         => '',
			'current_category' => 1,
			'hide_empty'       => 0,
		);

		$terms = get_terms( array(
			'taxonomy'   => 'course_category',
			'hide_empty' => false,
		) );

		$options = array(
			esc_html__( 'All', 'edupro-addons' ) => '',
		);
		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[ $term->name ] = $term->term_id;
			}
		}

		return $options;
	}

	/**
	 * Display limited post content
	 *
	 * Strips out tags and shortcodes, limits the content to `$num_words` words and appends more link to the end.
	 *
	 * @param integer $num_words The maximum number of words
	 * @param string $more More link. Default is "...". Optional.
	 * @param bool $echo Echo or return output
	 *
	 * @return string Limited content.
	 */
	public static function content_limit( $num_words, $more = '...', $echo = true ) {
		// Strip tags and shortcodes so the content truncation count is done correctly
		$content = wp_strip_all_tags( strip_shortcodes( get_the_content() ) );

		// Truncate $content to $max_char
		$content = wp_trim_words( $content, $num_words );

		$output = '<p>' . $content . '</p>';
		if ( $more ) {
			$output .= sprintf(
				'<p><a href="%s" class="more-link">%s</a></p>',
				esc_url( get_permalink() ),
				$more
			);
		}

		if ( $echo ) {
			echo $output;
		}

		return $output;
	}

	public function add_google_fonts( $fonts_list ) {
		$fonts = edupro_list_google_fonts_array();
		array_walk( $fonts, array( $this, 'parse_google_font' ) );
		$fonts_list = array_merge( $fonts_list, array_values( $fonts ) );

		return $fonts_list;
	}

	protected function parse_google_font( &$font, $font_data ) {
		list( $name, $styles ) = explode( ',', $font_data . ',' );
		$styles = str_replace( ':', ',', trim( $styles ) );

		$font_class              = new stdClass();
		$font_class->font_family = $name;
		$font_class->font_types  = implode( ',', $this->parse_font_types( $styles ) );
		$font_class->font_styles = $styles;

		$font = $font_class;
	}

	protected function parse_font_types( $styles ) {
		$styles = array_filter( explode( ',', $styles . ',' ) );
		array_walk( $styles, array( $this, 'parse_font_type' ) );

		return $styles;
	}

	protected function parse_font_type( &$style ) {
		$types = array(
			'100'       => '100 thin:100:normal',
			'100i'      => '100 thin italic:100:italic',
			'100italic' => '100 thin italic:100:italic',
			'200'       => '200 thin:200:normal',
			'200i'      => '200 thin italic:200:italic',
			'200italic' => '200 thin italic:200:italic',
			'300'       => '300 light:300:normal',
			'300i'      => '300 light italic:300:italic',
			'300italic' => '300 light italic:300:italic',
			'400'       => '400 regular:400:normal',
			'regular'   => '400 regular:400:normal',
			'400i'      => '400 regular italic:400:italic',
			'400italic' => '400 regular italic:400:italic',
			'italic'    => '400 regular italic:400:italic',
			'500'       => '500 medium:500:normal',
			'500i'      => '500 medium italic:500:italic',
			'500italic' => '500 medium italic:500:italic',
			'600'       => '600 medium:600:normal',
			'600i'      => '600 medium italic:600:italic',
			'600italic' => '600 medium italic:600:italic',
			'700'       => '700 bold:700:normal',
			'bold'      => '700 bold:700:normal',
			'700i'      => '700 bold italic:700:italic',
			'700italic' => '700 bold italic:700:italic',
			'800'       => '800 bolder:800:normal',
			'800i'      => '800 bolder italic:800:italic',
			'800italic' => '800 bolder italic:800:italic',
			'900'       => '900 black:900:normal',
			'900i'      => '900 black italic:900:italic',
			'900italic' => '900 black italic:900:italic',
		);
		$style = isset( $types[ $style ] ) ? $types[ $style ] : '400 regular:400:normal';
	}
}