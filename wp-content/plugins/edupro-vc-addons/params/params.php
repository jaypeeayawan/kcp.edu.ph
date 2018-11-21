<?php
// Constants for admin scripts.
define( 'FITWP_VC_PARAMS_URL', trailingslashit( plugins_url( 'params', dirname( __FILE__ ) ) ) );

// Load all params.
$dirs = glob( dirname( __FILE__ ) . '/*', GLOB_ONLYDIR );
foreach ( $dirs as $dir ) {
	// Load param callback functions.
	$param = basename( $dir );
	require_once "$dir/register.php";

	// Register param.
	$script = file_exists( "$dir/admin.js" ) ? FITWP_VC_PARAMS_URL . "$param/admin.js" : '';
	vc_add_shortcode_param( "fitwp_$param", "fitwp_vc_param_$param", $script );
}