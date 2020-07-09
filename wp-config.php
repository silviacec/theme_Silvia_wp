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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'theme_silvia_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e?W&,x_F/C3g?mQO4iODicpYgK+dg#0onyd{9SvombNt6.QK:5s4t+NMQ`<#!a%1' );
define( 'SECURE_AUTH_KEY',  'TmsRfQ/y41^jcOOTNCT0TBK1S9:))iIORrhY.=p&*>j8Y|p@?`tz>s%:}w{5u?W*' );
define( 'LOGGED_IN_KEY',    '5g))bIH^5* y7c6wum,%W0Is5`n6PJ{)QX6#nhyBj1i-xJm2a9&T+m2U>{cAV~JI' );
define( 'NONCE_KEY',        '7vMocxH~YP7-c@mBR`?P|ca;/PgfIn(o*2AMD>Z]HfD|G&^ZPRAo^t(8@k(O8}z~' );
define( 'AUTH_SALT',        'HHK)!cUNb1WtDZelSbx9{#w_KY-Giavn$Ttip}l3/Fb]MeQ_,&RI<scYk]d(NVd ' );
define( 'SECURE_AUTH_SALT', 'Ey{t5OBJNTH/>+p/ZSpe(403 qycC0)Jl79qNkPjUpEv:c!4!77ZLf3wWqzkm9DV' );
define( 'LOGGED_IN_SALT',   'GjP;_w33}T`)?zp?ZNDB79t2/^E/7qF.i{ajHu+p{G[IonKYnndP%Px9G!q<}N*G' );
define( 'NONCE_SALT',       '/aoDEtRwYBAh2BawxM#s]CuwiJwc0[ZVO0xtXm,doH6CU6$Yq/OwLk1OukoAT#0b' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
