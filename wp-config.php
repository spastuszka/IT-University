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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '80Ia4mmD3qxlYv/DzDiJ/UYbsPsXalAOmtY6KBSYKidaKtLVY4fmGk5TtKlNQiw5G9PwzW2AOSo4NBB9dt3hkQ==');
define('SECURE_AUTH_KEY',  'CGAZ7jwI0vS5HLnUqjV5sjPdlmu+3OX9E+MWdu0q94AznLHufMHRNvZDh2dhAkY7XxMXOnelZJ2CWDdp49UKAw==');
define('LOGGED_IN_KEY',    'VESWce9Cl6ee2EUUETjA19iPi/dQCutmaOEkiBSf2pqhcaG0GKXLQbXD7THQTWXVEkp4PLQ1NXITd1m3vjctDQ==');
define('NONCE_KEY',        'ZuxwWn5/uF5MErLM2sGmQRztI0Cc53Uh0DMoy2pTiTmgE73DQ42wF29/BisGKXr1CdiWojfxTAa6RY/MMqOiug==');
define('AUTH_SALT',        '2kfPqkIx7twCFDvJQBDFZ4E9HDN8zq9KP3xdMSnvoCmtSYScetCmPFbbxKV/ktWOa/EoQ7n0uTAw+GAsEKjlTA==');
define('SECURE_AUTH_SALT', 'qXJhkJuBQKXKux3bWn33zFqjsD9nR7Map3sPNKQ0TIbm2mYKYgc9jk9hprgvS7QSFM/+Zy4zt85h6JkWQ95nVg==');
define('LOGGED_IN_SALT',   'kP0yGBQStgm/6WJNCt5r96lor+r9UjCw/jQS0OhX+N0OwNR1NlSJduL8DX03TSGemtmRBYYMW4K+9AKcYaMMHw==');
define('NONCE_SALT',       '+Pl9NW4bhLluGjSTpIx8WV5WoIm6wZEBJWXCmFJ87utZ8eG4b4ttfCbIAixa/Wvuj3Tu45PPj7g115EC6bpG0Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
