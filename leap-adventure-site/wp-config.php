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
define('DB_NAME', 'sherinam_leap');

/** MySQL database username */
define('DB_USER', 'sherinam_leap');

/** MySQL database password */
define('DB_PASSWORD', 'leap');

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
define('AUTH_KEY',         '.~dD|+8(-!gC1!JN93g#zwh]o9=Xw t|w*wFk$=.ecz/iCA(f5o`Zsu1=aC(<m.E');
define('SECURE_AUTH_KEY',  '58UWp+GQQ[^ev.J}I3n!VtngE|7O>W4f)Cmrz>=G[t&:a;-^u%SAi/lS|EH]cB,f');
define('LOGGED_IN_KEY',    'k4-j&/-+b~-,X$*a;P=hY?+-lx@fh<idni|Qcml #YS&,cg^y<?j<0Ndpy+wWc]M');
define('NONCE_KEY',        'I;-zaXk[,x.Dw4+VtnB|3sw~+,#<-r1.,45KEmaN)bwYus||hu:w5_Ww$8a3$~KD');
define('AUTH_SALT',        'QXgg$-Yl^.Agh:z G9:&-^=}>IiH+zi~OXDv}~Id!Chf6#4nj{->Kn-R~EBV0^ ?');
define('SECURE_AUTH_SALT', 'N}}~e.TjM@B{w002;O$)8!%aolB1XQD<<OulcNmi4s-m<J:KNU+oj/X_OK9D%Nkw');
define('LOGGED_IN_SALT',   'c)Xe4; 2Zj=<]ZZA6+oexpm]63[l!&>yJhG{ $<CYgi?%+^DF:i|h5 dYpnbt4Ux');
define('NONCE_SALT',       '@HD2MIt#m;qNLdlw_}&&PAs%ivLfM1t8t^&@h+?211vL+e~s<04v-?*^S!T y!6&');


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
