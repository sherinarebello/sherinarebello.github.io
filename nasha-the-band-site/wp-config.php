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
define('DB_NAME', 'sherinam_nasha');

/** MySQL database username */
define('DB_USER', 'sherinam_nasha');

/** MySQL database password */
define('DB_PASSWORD', 'nasha007');

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
define('AUTH_KEY',         'U#cl<VlA@!*)jDCQi-Z{.&vqo[`<W~:ml7TCqMYM|giE}s>w{-Afoy:`Nyd(CGKD');
define('SECURE_AUTH_KEY',  'KIk1K.B^zHk$YXhv]s<iJ<!K}$5]3Jb]:n]@`iu{fZ2{1K/D>+mq|HrVfe4GIIU2');
define('LOGGED_IN_KEY',    '4KQXC8z #sZ_hw%?bL8mVf|/aQlUu4=^|3i?p})QkOo?(Vj,PB~0L{w_@U-*$lf8');
define('NONCE_KEY',        '?dr=N$}:,VQrAoT~]-Dy<S5vY/aSdB,9(:2euME1wUg_XEk&N}N/YD}*:lS%Ld.w');
define('AUTH_SALT',        'r |Pe&@/`-pN$`wy].PSi5K*dBsX@5O-;RG>q-%$G{8FEDA7wkk:{2&U{37m...H');
define('SECURE_AUTH_SALT', 'A63>BBpMXh+`Ty|B`1(=BREOLD[/H<lrZxN+]M]U+$Z/V~+0lH}c|=/iBdP9fOw9');
define('LOGGED_IN_SALT',   '0/~+iJ6s&3$Pcw^+wdi87B+9cFUk^v|^8D|+0ZY|3#gG?lU-UBGOBvvMXmA~(xsG');
define('NONCE_SALT',       '|aT[1.CF8&R*Mns<{AP,Aj*qFt`1S-o*.+<UcE+s@vYGyaM74ZwnB ](;Vjjo.4(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ns_';

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
