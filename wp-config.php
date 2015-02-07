<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mirensdb');

/** MySQL database username */
define('DB_USER', 'mirensadm');

/** MySQL database password */
define('DB_PASSWORD', 'KarenMikeHighway-7');

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
define('AUTH_KEY',         '<WWvDY@7Z5g|@_D1juR=,c}+ILY`c0%q@+T 3{9bR>-Ri@FL!A|YqW|+I*d}szic');
define('SECURE_AUTH_KEY',  '-3dfX|QrbD2#N. Gw[]<t+4o9#Yn[q5./6DNwKzOtoJ ZF}Ng=h-Z&>p@ ow53A4');
define('LOGGED_IN_KEY',    '-0kA,DNp1+gmLqb[eoH2Dl 12p=eC^8V|gS]XE#l&hRL)o=:#,2w-|[s@t7*{o F');
define('NONCE_KEY',        '_?(U]^a]7H7uN;}|fZGI z$CB,%}R3T[SrLR1}Ez]Q){EL)cTwa6^Pf!:IZz@4K4');
define('AUTH_SALT',        '.1,hL9EgNd ?)|y[;)]I5ok+J-cb,7!71=^W`ND!/rbc|swFb3]|p8rNc+FjC(C[');
define('SECURE_AUTH_SALT', 'DyBN4|-y7B>S{/?n0}-5A>@-KPSn^KI`#%~e7u-QpX~*g%NWJ$8fI67Xny.2`=GE');
define('LOGGED_IN_SALT',   '-5,:;{.kM|-J9rPzf!P!Lf28&:6!fMIg<[#9N#d-EN|n07e-@&!>kfsrrL2O:pLX');
define('NONCE_SALT',       ' {Z`gZa1pTw!^6-@3kKbiM|fVsuV#4+COf3q4o089()(%`0xg^7-$R`0tDGhyM4N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
