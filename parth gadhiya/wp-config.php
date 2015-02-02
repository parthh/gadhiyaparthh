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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8888');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '64M');

error_reporting(E_ALL); ini_set('display_errors', 1);



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0sDxAz^.LZp,@4ib3hR7KYVORzZppi*4!H&JMBHRj;L8S8blpoYfj$7QLjqbnu?b');
define('SECURE_AUTH_KEY',  'WSsAxPr/X]A,gv#n7IB)ryq1Pa3_KCJ#z[fqdPU5<t3uKBx$wZg0 eyPazt;qVzi');
define('LOGGED_IN_KEY',    '*STzWn#Gqj=(JTdYZe-TvR.0B>s!gM#gdPs>LlMU~p/d%A0[|c9gJicGp8sBa#Hb');
define('NONCE_KEY',        '_xQ-~D9peY1sxfj~W^p)e%Z/Yn2LI,1sLS{|MmU_D{<y14Ov,#GXhY/r?XG.zs_e');
define('AUTH_SALT',        'tPJ:Ml+$U)_rtsiB8hSBKutg# $CT*-UUBE%a Y,;l)-$n&<G?4~nl(2?}Eh#/{-');
define('SECURE_AUTH_SALT', '-hy@U2q)os50u97iJI2)mn7ZI}D#hA7sUeEmF>S^0Ap+K=jXb_G28X0u4v0r4a,.');
define('LOGGED_IN_SALT',   'JG)@-G[AAa6cUOqmTGw>ZZ;/LgX~=.04|r7D]{ywoBr~nw-z|? 3[cpUOtppz4%`');
define('NONCE_SALT',       '|2f[N|n5.G)BN l2TfYlx(dm$57.3XsB9U[6L0 |HgD>I6i>f#gE41>7{-??|7!Z');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
