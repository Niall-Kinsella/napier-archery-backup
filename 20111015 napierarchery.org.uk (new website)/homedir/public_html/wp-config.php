<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'napierar_webdb');

/** MySQL database username */
define('DB_USER', 'napierar_web');

/** MySQL database password */
define('DB_PASSWORD', '8bk7z^h70f5C');

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
define('AUTH_KEY',         '!v5H-IiTolsQDku|B,Aa]-;sfjD(ZJ/k^tgN3]1<0kR=1u@9+MP3`q|9A7o` )}r');
define('SECURE_AUTH_KEY',  'd<)Bk/Z!jf.A5H g[:+7CynslrAgXQ/|K|GFzRgXFAKww+1r_Val@RNWpvRx-q*_');
define('LOGGED_IN_KEY',    'vR~$go4&aP+-</_mxd,D-?4OxG;l?/9I;+>|:nGs|K]N}#:A-4rud_YU{j;>XB`l');
define('NONCE_KEY',        'e)3$|N!;Qk?F]@:jj3oQS#szc-Q65+C__Wj}$VBu_FZ]&hI|Eh>kdhx83$iJ0@C!');
define('AUTH_SALT',        ';ItJ@{Yi2FitKT))k+[t~x~Dbzl{YOZ@,(+)fL5yvyNEKykFV!K3t4Y|Wt#)$P^g');
define('SECURE_AUTH_SALT', 'wGVS|zcrJKWb@MDp6RvcRe+#rMukDP8!#<>iCH;%50i%KHzF7@oy?TQ_D/c$9CJd');
define('LOGGED_IN_SALT',   'Y|*_+sAVPE[*C/:fn7a`U}*JP_M?||C?=+jkJh [lg^0GxgT/lc&-R.._Za:#gPN');
define('NONCE_SALT',       '7+Y6|pU{Nj7sVOsT]g92g%fJQcTofiQ~MoBviMhg|~@5kP*fcLs09M)|JiYS`7J`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
