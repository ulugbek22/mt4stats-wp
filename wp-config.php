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
define('AUTH_KEY',         'TIDyXswHhwXqNZi7t2ykuHDfwi5qqtgNtolWY5hQll/bQiTNQ0ew10IbmL5ZjNipKOm6zrYew+eTfHvLQY/6gw==');
define('SECURE_AUTH_KEY',  'Cj7d1OLO0XbhYvE18NhzTlLdaiuN9duuP6zpyTCUS+LM8hOHc7etNfcYU07ITxwPC4CKvKNT5mC7UK5vDbAfvA==');
define('LOGGED_IN_KEY',    'P3TCH6djECrnzBGVdWynoqwoIcGoCnFlCEnITkt12S1Cn2I5QQXgPp94ftQ6DNAOmTXUOLRVXLLPDG5XC6tT0w==');
define('NONCE_KEY',        '+Zhc2pYsvFNc5cHD3HwRwugw8HKxIvtpv4hscQRkhc6Z9wfkveBB2tfy9G0r4eJA5tMD7o2ZebVZ9s/HK8xBvA==');
define('AUTH_SALT',        'urVegJm1hGDo2VUh1w8PpNkzIe0LWJV3VPOpENSJbHbi/vG30A8EPG8gI3pb+iP35NT6iOX59g5EKoY1ubxwOg==');
define('SECURE_AUTH_SALT', 'mW1OL5uF7N0pwl+O7U3aY3GKzVegsYlmyNo3RuIvd/JMqLlzuJfro5lakPe8nd+TqB6JwCGTOZl6Fgo0WzRq5w==');
define('LOGGED_IN_SALT',   'b4p00zPHT2CnTwwIyHrS7Bz1gEbY4uEytGjQOHLk7/Dxv5Cgp0toAyhZUXZgujwR/DV9p64hcV4/9eTVqH3zqg==');
define('NONCE_SALT',       'BI/Erlp1U7DaYlFI/R9fzWM+BW6oXxX7c2p38stfs5T2h3t+DjrIQ2K/OT3jtdAWQ3h3JkXgszviZ8aQG2DRlg==');

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
