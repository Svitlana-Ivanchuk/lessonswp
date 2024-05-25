<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '$gD0~w;Y@?-7pk9l!7ErPl7OW+K![%.gR*-1WVN.()-?xw-W,K^n&mp!h1c5XKRz' );
define( 'SECURE_AUTH_KEY',   'RD:*HuvCS=VhnxVqIFbIF}7D&d`p**%J.?H&p(&I1AdM0!y$UfZx,3u8eKoVP;Ld' );
define( 'LOGGED_IN_KEY',     'j!.zu=0&>e3AG^t<}(ET^#v:-wABM4Zg@qOfzrJ]u%-nAVNd5q}{LxTm*qhJ[Op8' );
define( 'NONCE_KEY',         'LESLVz(:pg7dglP8F?O|.*{F653M^HeJ;gSMcO8@nj7_8*pi2bDrNKFU8PEU0tb|' );
define( 'AUTH_SALT',         'I$:=%5;$i$5&9je,Y8P5^!Y+OV)ILVEVwT&,I M3J)KT`[%J%_]-K3j_8>YjCcfa' );
define( 'SECURE_AUTH_SALT',  ')9+*]+tWnWk[M^qETgF!f)vio$MQM]f@1n9<go*xxV> hp#9xW,,36[[,}:_CK_S' );
define( 'LOGGED_IN_SALT',    ';U= /j+ I2N[!/X6NvK?gLdO{bZE E%Z=:C`C1|vFrBNL_5z-;g^VZG<te/aBA#C' );
define( 'NONCE_SALT',        't#Fxpo73RZr>@e-~ q%4.{PFdD?4Y2;G#N_B*F5oz1rGOKC FQA9l#!^[wU%*2U3' );
define( 'WP_CACHE_KEY_SALT', 'j4U8]e.KNA~@8(D=yASNxw6(0]~oV8O|w|gANz5/cZLAk}N<]7pOwUklRxW]VTIR' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
