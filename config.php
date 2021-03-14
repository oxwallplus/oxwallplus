<?php

define('OW_URL_HOME', 'https://oxwallplus.com/');

define('OW_DB_HOST', 'localhost');
define('OW_DB_PORT', null);
define('OW_DB_USER', 'admin_op');
define('OW_DB_PASSWORD', 'fdkD1q6qu');
define('OW_DB_NAME', 'admin_op');

define('OW_DB_PREFIX', 'nw_');

define('OW_DIR_USERFILES', OW_DIR_ROOT.'ow_userfiles'.DS);
define('OW_DIR_STATIC', OW_DIR_ROOT.'ow_static'.DS);
define('OW_URL_STATIC', OW_URL_HOME.'ow_static/');
define('OW_URL_USERFILES', OW_URL_HOME.'ow_userfiles/');
define('OW_DIR_PLUGINFILES', OW_DIR_ROOT.'ow_pluginfiles/');

define('OW_PASSWORD_SALT', '1Ta9Oju92KAzAJ3q');

define('OW_DIR_CORE', OW_DIR_ROOT.'ow_core'.DS);
define('OW_DIR_INC', OW_DIR_ROOT.'ow_includes'.DS);
define('OW_DIR_LIB', OW_DIR_ROOT.'ow_libraries'.DS);
define('OW_DIR_UTIL', OW_DIR_ROOT.'ow_utilities'.DS);
define('OW_DIR_LANG', OW_DIR_ROOT.'ow_langs'.DS);
define('OW_DIR_PLUGIN', OW_DIR_ROOT.'ow_plugins'.DS);
define('OW_DIR_THEME', OW_DIR_ROOT.'ow_themes'.DS);
define('OW_DIR_THEME_PLUGIN', 'plugins'.DS);
define('OW_DIR_THEME_SYSTEM_PLUGIN', 'system'.DS);
define('OW_DIR_SYSTEM_PLUGIN', OW_DIR_ROOT.'ow_system_plugins'.DS);
define('OW_DIR_SMARTY', OW_DIR_ROOT.'ow_smarty'.DS);

define('OW_USE_CLOUDFILES', false);

if ( defined('OW_CRON') )
{
    define('OW_DEBUG_MODE',true);
    define('OW_DEV_MODE', false);
    define('OW_PROFILER_ENABLE', false);
    define('OW_ERROR_LOG_ENABLE', true);
}
else
{
    /**
    * Make changes in this block if you want to enable DEV mode and DEBUG mode
    */

    define('OW_DEBUG_MODE', true);
    define('OW_DEV_MODE', false);
    define('OW_PROFILER_ENABLE', true);
define('OW_ERROR_LOG_ENABLE', true);
}