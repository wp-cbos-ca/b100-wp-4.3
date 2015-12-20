<?php
/**
 * Edit directly to avoid the web based interface.
 */
 
/** 
* MySQL settings: obtain when creating a new database or from web host.
*/
/** The name of the database for WordPress */
define( 'DB_NAME', 'database_name_here' );

/** MySQL database username */
define( 'DB_USER', 'username_here' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password_here' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Generate from: 
 * 
 * https://api.wordpress.org/secret-key/1.1/salt/ 
 * 
 * Change to force new user logins.
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * Make random for better security or multi-site
 */
$table_prefix  = 'tpt_'; 

/**
* Set to false for site development.
*/
define( 'WP_AUTO_UPDATE_CORE', true ); 

/**
 * Set to true for site development.
 */
define( 'WP_DEBUG', false ); 

/**
* Set to theme used for more reliable fallback.
*/
define( 'WP_DEFAULT_THEME', 'the-plugin-theme' );

/**
* Set to true to improve security.
*/
define( 'DISALLOW_UNFILTERED_HTML', true ); 

/**
* Set to true to prevent admin based file edits.
*/
define( 'DISALLOW_FILE_EDIT', true );

/**
* Set to true to speed up site. Requires server side cron.
*/
define( 'DISABLE_WP_CRON', false );

/**
* Defines WP Bundle Package used.
*/
define('WP_BUNDLE', 'WP43B100LTS' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
