
<?php
// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
const URL_SEPARATOR = '/';

const DS = DIRECTORY_SEPARATOR;

// -----------------------------------------------------------------------
// DEFINE ROOT PATHS
// -----------------------------------------------------------------------
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
const LIB_PATH_INC = SITE_ROOT . DS;


require_once(LIB_PATH_INC.'config.php');
require_once(LIB_PATH_INC.'functions.php');
require_once(LIB_PATH_INC.'Session.php');
require_once(LIB_PATH_INC.'Media.php');
require_once(LIB_PATH_INC.'MySqli_DB.php');
require_once(LIB_PATH_INC.'sql.php');

?>
