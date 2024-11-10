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
define( 'DB_NAME', 'anasacad_wp828' );

/** Database username */
define( 'DB_USER', 'anasacad_wp828' );

/** Database password */
define( 'DB_PASSWORD', 'V)324Pi)Sp' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'bz4zcfacgesbqlgta0dtygsuxmjqj7v6med4oygjs6b40jt4jypve0ec6x01polj' );
define( 'SECURE_AUTH_KEY',  'exwxcwhdicieyyckps4c2ilk6l7l3l0ufl9qoxlfmlyitnirnhgwzfpsfk1i0fuz' );
define( 'LOGGED_IN_KEY',    's36vzjwd4hicmppxgsnyz22bi0q7ih8qgtbfpdye0vutkykpxiykxiafdgjgj7hz' );
define( 'NONCE_KEY',        'hlo9a7k6gqocrqqklausvkrptfp6isuhlubfzypfpbjvlhy1bfxvrvxdlby4unjh' );
define( 'AUTH_SALT',        'abdz2xla1l0oe5xcosgelnzpvmmrrhisxe9bjfld7o4aux0uswglnfwqya2iqrni' );
define( 'SECURE_AUTH_SALT', '6wcnoon727pncbxptjypvsqnxinzzwgzut6mmwjqblwsjyrw4dohqwv20dlouana' );
define( 'LOGGED_IN_SALT',   'lgoorjgivxjlvbkigleorty3lxjvfffloqlafncb4nfabapmrooj5skglnwtraoh' );
define( 'NONCE_SALT',       'lgs5luczfxqwnp9qs7fex8anu97pkvxjhkr8tonznznpsrddkx5vqaw2sec6fyd8' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpv9_';

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
