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
define('DB_NAME', 'aktsol_paralymart');

/** MySQL database username */
define('DB_USER', 'aktsol_paralymart');

/** MySQL database password */
define('DB_PASSWORD', 'Paralymart@2018');

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
define('AUTH_KEY',         'x.[nD9G.#UewD])e~G_z2Y}(#xr,AfjW|?qO(N`7Q}/2(uDP|MV)~sy*4htZ T#F');
define('SECURE_AUTH_KEY',  'baUPzjl2}C&pUUZ~YG{FF50D(fTcU8?IKzRmw%BLM+vHZs;G33&!iol [r*1wTL$');
define('LOGGED_IN_KEY',    '(1yZ/jfuNiOPM#g$&(u|c:s8>M&pj=Rl.`F3_YHNm=(s3C/X{zbBeZW@lstkO$cX');
define('NONCE_KEY',        '(43(/vkW0lv,mt+bkBS_,j}0_b/f9DV08k*Ai/.{(9xHm84@9dQJD?GxKW?E8$^-');
define('AUTH_SALT',        'HO`w3t@Z(jl<2.txQH3C:ir.2> >M,.iuKJMOYXWfWQ92/;2uaj5i]qu`@klZJf>');
define('SECURE_AUTH_SALT', 'BMylD}.p$XW(+8 qp-C{26~4c^+]O)_3gS@ZwxX@#COB ;]k#D+hCW;>3*Ta;K:7');
define('LOGGED_IN_SALT',   '4A1zY&SA]G-WgmL1!()p#BdZ^TL:yLEqHS*kfU%^UtM&(~n@ l:Lr|@;Thz8sYWe');
define('NONCE_SALT',       'J8goFe wM?3]f0<x).U1x98c- 33M/Q`IUO-pMVe?2r?TsXMreB$?mlY;Zp%)zBa');

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
