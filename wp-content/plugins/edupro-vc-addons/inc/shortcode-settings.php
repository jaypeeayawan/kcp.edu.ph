<?php
/**
 * Shortcode settings base class.
 */

/**
 * Shortcode settings base class.
 */
class EduPro_Shortcode_Settings {
	/**
	 * Shortcode tag
	 * @var string
	 */
	protected $shortcode;

	/**
	 * Shortcode settings.
	 * @var array
	 */
	protected $settings;

	/**
	 * Constructor.
	 *
	 * @param string $shortcode Shortcode tag.
	 * @param array $settings Shortcode settings.
	 */
	public function __construct( $shortcode, $settings ) {
		$this->shortcode = $shortcode;
		$this->settings  = $settings;

		add_action( 'vc_before_init', array( $this, 'init' ) );
	}

	/**
	 * Register shortcode.
	 */
	public function init() {
		// Default shortcode settings
		$settings = wp_parse_args( $this->settings, array(
			'base'          => "edupro_{$this->shortcode}",
			'class'         => '',
			'icon'          => EDUPRO_ADDONS_URL . "shortcodes/{$this->shortcode}/icon.png",
			'controls'      => 'full',
			'category'      => esc_html__( 'EduPro', 'edupro-addons' ),
			'html_template' => EDUPRO_ADDONS_DIR . "shortcodes/{$this->shortcode}/frontend.php",
			'params'        => array(),
		) );

		// Always add CSS options and extra CSS class.
		$settings['params'][] = array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'CSS Box', 'edupro-addons' ),
			'param_name' => 'css',
			'group'      => esc_html__( 'Design Options', 'edupro-addons' ),
		);
		$settings['params'][] = array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra Class', 'edupro-addons' ),
			'param_name'  => 'class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'edupro-addons' ),
		);

		vc_map( $settings );
	}
}
