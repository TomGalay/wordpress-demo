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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tomgalay' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'GAt1l1F3jrKW0S1OSbuI4hZ5HgXijvOsYjmJ1AyiQmLHam3Lb1nNQkSAhM5hRV3n' );
define( 'SECURE_AUTH_KEY',  'uavwD7BqCSyhXnab5tfMxRzcffktcZZ1Oc6etuCmsksWWNcAEvR6SClOork3MWgP' );
define( 'LOGGED_IN_KEY',    '6peimZECQH3oIlddITrqimbXhVg5py0iw9RBvK0IYmQUrpcLyS4RlLWdVfqZVKpL' );
define( 'NONCE_KEY',        'kvciIKqvtjcX1THonPx1rfkiu6CiCUYBHKoibGzKssuAnCyB9U7oMVYJLhIewCiN' );
define( 'AUTH_SALT',        'xMPdERma4hYVweXWBn6dsgSNx8bWo38btSJttFMFWdDHS43kM6wsjIjSmTnHrLOb' );
define( 'SECURE_AUTH_SALT', '5mRQBrJWaNFQJLxJkYa8V2jPfwynGdW1mQ7PJ4WMswYwy9igOLpgX9yzoPf4d0bS' );
define( 'LOGGED_IN_SALT',   'K5BPwgjLyAkKOnhEjC1S99H0MBPIfo7tkfuKW94vYDUcj3VMwGxrand3FWcmq9uH' );
define( 'NONCE_SALT',       'y8I64Fgq02z2XSY47S58VLrUZeemDoVPWAHJKYVHvaW0K14MZ1gx24EVVLDPn2k3' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
