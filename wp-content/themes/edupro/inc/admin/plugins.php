<?php
add_action( 'tgmpa_register', 'edupro_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function edupro_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => esc_attr__( 'WPBakery Visual Composer', 'edupro' ),
			'slug'     => 'js_composer',
			'source'   => get_stylesheet_directory() . '/plugins/js_composer.zip',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Meta Box', 'edupro' ),
			'slug'     => 'meta-box',
			'required' => true,
		),
		array(
			'name'     => esc_attr__( 'EduPro Addons', 'edupro' ),
			'slug'     => 'edupro-vc-addons',
			'source'   => get_stylesheet_directory() . '/plugins/edupro-vc-addons.zip',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'One click demo import', 'edupro' ),
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'Jetpack', 'edupro' ),
			'slug' => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Contact Form 7', 'edupro' ),
			'slug' => 'contact-form-7',
		),
		array(
			'name' => esc_html__( 'WooCommerce', 'edupro' ),
			'slug' => 'woocommerce',
		),
		array(
			'name' => esc_html__( 'WordPress Social Login', 'edupro' ),
			'slug' => 'wordpress-social-login',
		),
		array(
			'name' => esc_html__( 'Max Mega Menu', 'edupro' ),
			'slug' => 'megamenu',
		),
		array(
			'name'     => esc_html__( 'Slider Revolution', 'edupro' ),
			'slug'     => 'revslider',
			'source'   => get_stylesheet_directory() . '/plugins/revslider.zip',
			'required' => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'edupro',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'edupro' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'edupro' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'edupro' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'edupro' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'edupro' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'edupro'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'edupro'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'edupro'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'edupro'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'edupro'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'edupro'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'edupro'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'edupro'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'edupro'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'edupro' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'edupro' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'edupro' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'edupro' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'edupro' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'edupro' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'edupro' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'edupro' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'edupro' ),
			'nag_type'                        => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}
