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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home2/iqsmarte/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'hello');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'aun}GmRh*8+F:7qlN42bZN*qbe.}=SX[kK{(_5x}>KYNZ9>sE0J1rwM/gHN2I/>W');
define('SECURE_AUTH_KEY',  '/VzczqGu`r@HsejOn_X?3QL~I6+/V+G,<b^mBP+,6D5|3)=L7HP]%p:vjOD7 ]Er');
define('LOGGED_IN_KEY',    'Z?B>8Lxq$2{.sc,AWXs]=GH+~_6Fd&}W ^mi_S~GTnR9qCvi!N+tI`Q:*F@9:G{g');
define('NONCE_KEY',        '$V](umT{7ndhIQ~s.n_s$OpEt(U}c_U<S_VFJc@jCc?Cwl=UwJ{4bn_UsYlLhuid');
define('AUTH_SALT',        '=^>JzXAEkmxBCHB3:#612GQhDW{8$#Fa2R5,8@Z-|T5enwW}npF`nmql}%xvDdUo');
define('SECURE_AUTH_SALT', '>:D+* N6i)nD|}=l=|5XHsSm||Nn}S]*8(EFu3`|3@eaFhUpft&W/$le}cEkK_VN');
define('LOGGED_IN_SALT',   'v!HkC2-@J9KR+P#0BRco8G&Jp$qMMC7t$N2:~^LK;h%JAw|!02jE*~u8ra:>W6L~');
define('NONCE_SALT',       '#mznAkZY7UosS[1iUWO#*DYh#XI]. R<X4^9{z:sxS9WF-ag^p<nG%uk:Aw_&^>[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
