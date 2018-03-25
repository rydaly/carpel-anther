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
define('DB_NAME', 'scotchbox');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', 'root');
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
 define('AUTH_KEY',         'REQ1LOF?j(oy^kL-zG:;-^z+AJ[~0/+J|yYvY6EugWvwo6=zbYS6^+Z6u(3WO<vx');
define('SECURE_AUTH_KEY',  '-n7Q_d|IY(V/bthh;1-];Z2#!]^kxT!cjs,r,gV=YMJiAIIuOW6z3|&aJP0pE_](');
define('LOGGED_IN_KEY',    ';+9)[Vb-o:#-_Mbr!-ok;2(<|Fok8x?AL>aFGL/cMn&_.znAEHL0f<z*%82Hr$af');
define('NONCE_KEY',        ';-mRFt51+u3o^4kC>QyZf|R?g|mMcWqDZ|d_<e+G6PAC,*@3q,7ua!?Z~!|a--|0');
define('AUTH_SALT',        'xVV^g+;v3*yW7IFKE`v`+ OGFb+q%PB$M|q8P5%HQo<V)yz^<n$~:[F)OZ<nlZ|m');
define('SECURE_AUTH_SALT', 'Jh`k2.j`%?[&.G>c*@Cjr~7zU/vU=|T+Ij%=Q.D<sx2cSoiokaE}aJun[1O%|tPN');
define('LOGGED_IN_SALT',   '0a}_#>IC&MQ8RZpQ-L~I|hRjr:Xf6.Q:[71Snu4pFiC?,XamnuT)a0?)+$lVA,e@');
define('NONCE_SALT',       '[+<|P]Xv$H/Qzm/W.CV.:}iV#_jODRxFM,TQee~9yQn];c1`*3(R$<{BEbQhSU{(');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'd97_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
/**
 * This is a HUGE hack. But we need it to override on the server level due to the way WP gets and sets wp-admin level form properties for _wp_http_referrer
 * Since this is a Reverse Proxy setup, the location in which WP tries to search in the admin is incorrectly set.
 * Reference the wp_referer_field() method found in /wp-includes/functions.php found on line 1379 as of this writing
 */
// $_SERVER['REQUEST_URI'] = preg_replace('/^\/wp-admin/','/blog/wp-admin',$_SERVER['REQUEST_URI']);
/** These are used in function.php to establish proper URL updates in admin. Production will have different values. */

define('PROXY_DT_SERVER_HOST', 'carpelanther.dev');
define('DT_SERVER_HOST', 'carpelanther.dev');


/** Disabling WP Cron - running own cron on the server */
// define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
