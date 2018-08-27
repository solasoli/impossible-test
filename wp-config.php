<?php
define('WP_CACHE', true);
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
define('DB_NAME', 'imp');

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
define('AUTH_KEY',         '{ej/8<J0=_Z^?mC.w2)upK@X.&I;]x&]*Qrg^~f: ?3P2GL+umti{RS `%+)<q0{');
define('SECURE_AUTH_KEY',  'ERPA>x,;}ZJQb=j4P&)J<f:K&j2y!HeA*Elj/:VeRvu,SU]SKlKx=&)E{nCE*_Yv');
define('LOGGED_IN_KEY',    '@0@`)&eW[<t~pldF9Dza42i*QbZ+v1!(KS}O72q_(KXFRu#=x]p$1YCmDE?s_le(');
define('NONCE_KEY',        'w71?S/.fo;tHi-9(*_Ps9Sb(<R`~?k[}}UZbjmY.Y9W5jOMQ#>&P4c@~vrtkhZ[@');
define('AUTH_SALT',        '=h1P(Wvi!D!(EYB[0e%wbb(0S}uuYs93fo_BW#=y?d;ims7mJD&7[LvBaD:{v/TA');
define('SECURE_AUTH_SALT', '379I{HXeC@PuE^%z5_E17[pnR|~%EQ[RTVNEufRs5hB0GmP!yrso23.wg~n]OnX7');
define('LOGGED_IN_SALT',   ']9~fxh<Bn&.=1I=@~u8EI4*a&$pY,ijsgo)A[@9D/B({5bxWDZPT%7q`Ag Vvs`_');
define('NONCE_SALT',       '}RO_A{}xiz3b2;1wlk4b:YcNy/3AWBZ1vW2i`#DURB9a<~7U>I*;&TD-*c-qra/$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
