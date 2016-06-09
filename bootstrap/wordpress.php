<?php

// Dirty hacky.
use Dotenv\Dotenv;

$dotenv = new Dotenv(dirname(__DIR__));
$dotenv->load();
$dotenv->required(['DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);

// End dirty hacky.

/* Database Settings (Wordpress) */
define('DB_NAME', env('DB_DATABASE'));
define('DB_USER', env('DB_USERNAME'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ? env('DB_HOST') : 'localhost');


define('WP_HOME', env('APP_URL'));
define('WP_SITEURL', WP_HOME . "/wp");

define('SAVEQUERIES', true);
define('WP_DEBUG', env('APP_DEBUG', false));
define('SCRIPT_DEBUG', env('SCRIPT_DEBUG', false));

define('WP_ENV', env('APP_ENV') ? env('APP_ENV') : 'development');

define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', public_path(CONTENT_DIR));
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = env('DB_PREFIX') ? env('DB_PREFIX') : 'wp_';

/**
 * Authentication Unique Keys and Salts
 */

define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', true);
define('DISALLOW_FILE_EDIT', true);


if (!defined('ABSPATH')) {
    define('ABSPATH', public_path('wp/'));
}