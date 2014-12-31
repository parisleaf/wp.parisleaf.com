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

require_once('vendor/autoload.php');
Dotenv::load(__DIR__);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER') ?: 'root');

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');

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
define('AUTH_KEY',         'Q+/^#,T5D[va:()a]3]E|h|?0H+[^ykr2> +gt+!-3AnKWU(B|/oQG)mm$JD]F:_');
define('SECURE_AUTH_KEY',  'bcgcy=ov:--W:D]X;Iz=T=vii^-U8f9.D|bgvJ&VcvBrJO[Zz(_]cXu/,g$v|OX1');
define('LOGGED_IN_KEY',    ':3IJ|soX^Z]qi(`%|1]zbb+C$~4%*cX0|tA[12 Bl6d`PD+:P4tXZbXJ)_ybg$O(');
define('NONCE_KEY',        'NOuItP?uS.rb8-BE i$j/7<iQ=3HuI)-at~Gbqq{8g}U}P34|H;:Uafq[BWA9mOD');
define('AUTH_SALT',        '*{iG-N{c|{C= Ys)E&gW#W7AXT8iJI4EX.o{DpyUagFoKu~~]T)_EsHxFRRB%#EZ');
define('SECURE_AUTH_SALT', '% D8Pv5*Y@#E>IfN4$7tb.,e-j{;=:8q/Zi7 yozizKj|-.,#ipG30+re)MFk+-{');
define('LOGGED_IN_SALT',   '^-Mv/ln|rQ]_@|*C%XAqa_m@.a]I;-Vk}QVcQw8+zhLygc!TcP=.H+d6afhYt#]G');
define('NONCE_SALT',       'P}zNwOuU94XR9-n_]|06P}P{(KTv]}>%]|N](gXffBF:zFp8M+W4DMm>WA>=.a$@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv('WP_TABLE_PREFIX') ?: 'wp_';

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
