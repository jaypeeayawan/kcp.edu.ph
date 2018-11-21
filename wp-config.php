<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kcp.edu.ph');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y,7/ye@6Yx>{`4VH?4v$k/O<zC#Kw8T}9-vdr8N+DLc<jTglU-HIkn^5kH5Y_o|h');
define('SECURE_AUTH_KEY',  'o:jysa/b@m<$cax:niX!4EdNq|eC_.M tq.Hvs/=Ma~dD[tIyyJl2mj,L2m+[Y_a');
define('LOGGED_IN_KEY',    'S*b~[t|Df1%o]Du+xW|xV[b~W|!8[s%Vu~(pHC0~h|Klh0UgjaCK}-JVqE4nOY5l');
define('NONCE_KEY',        '[E(;Bx/Q* q@REWl9CSILR]T4KG|H)>&q(YQ7;ctr6J]1$JV|SSo=>U&7*Qj5%AS');
define('AUTH_SALT',        'Bb.~SD~|;,$?ju2~3?YD2^2KX!/ ypK26%8CdLw1kW9ck]1;s%?Q)kXnzjarq:-7');
define('SECURE_AUTH_SALT', '9Yx)i&2lQDa{=JZl/};$)e?;?m}iG<C9bY>A^>~:{9=i<.phUILM}`ys?]>`=~Q6');
define('LOGGED_IN_SALT',   'O_7xItZy+3JUP(w[JyBv_W}#dTd03(V^>^?@}xhpNg:)U{E][Rx.bQxR+_0UCEA,');
define('NONCE_SALT',       '?aAe6QXsyCUmh+VvCnBD,|tDs6Tz~cw.3F]l$ecdDc6b3`$GdKVt<c|Fu)ocGnjl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kcp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
