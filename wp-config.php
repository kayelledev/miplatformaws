<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define( 'AWS_ACCESS_KEY_ID', 'AKIAJF23H2MFPASN6Z5Q' );
define( 'AWS_SECRET_ACCESS_KEY', 'k7fbdMXLPxntc8+s49gWw7sfVHOM+UOHDxRrxhTO' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mirens_two');

/** MySQL database username */
define('DB_USER', 'mirens_two');

/** MySQL database password */
define('DB_PASSWORD', 'i0FnN4zE55');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '_FZO;L|b.UB$&uWT]8Z:$%8^%Fj|.-12aC|++p[r]^zl52rC^3=^y!}FXAZsb2p;');
define('SECURE_AUTH_KEY',  'uuStgaZ6y|H^/-M|`Q&)VF+~GX+!cI%ol;>Q,9`NX,/-%TSVrVKV<{*_y|55Tqk]');
define('LOGGED_IN_KEY',    'T[01%B{9.;0&A8IDVw(@=d%9o[b42p#4key_RO.#2R;>yPfR-5lg9;7u8Y)0#Gdk');
define('NONCE_KEY',        'q,m};<CSM;gK#IXeJ 5tqPL:g+/jx|xL9bCuf$EhpP@f.sXB$qIuX^gn^r{m!MtJ');
define('AUTH_SALT',        'm7xI0+$ppkNdMmSdaF}wv@2DUIzY44f^T D.(-9(VCbCW3f(IV?*E|4.A|-Dfe.p');
define('SECURE_AUTH_SALT', '>-9Ue-+9nX|-*vAC#4~5Syi9^JBw$1{is-X{=sowt$y@x{=.%$@_{-<!)v)1VZ),');
define('LOGGED_IN_SALT',   'tFFm[>r*0#%d7:qUPWlpoz+:y;hSwgXC&-)t1Hp;VjLf=mN>iq=^}D5v+-iEekei');
define('NONCE_SALT',       '{lP/DFR^_~R6:EtBY$Q_u3YR{PS[L|L$M6!</+2+,DT$&hGE]`@m5hnH6+aVTE4/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wtxc_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
