<?php
/*Security Note
*.inc files are bad because if an attaker discovers their url they can be read 
*as plain text if the server is not configured to parse them as php
*/
$dbConfig['host'] = '127.0.0.1';
$dbConfig['dbname'] = 'c9';
$dbConfig['user'] = 'dariothornhill1';
$dbConfig['pass'] = '';
$dbConfig ['port'] = 3306;

if(!defined('DB_HOST')){define("DB_HOST",$dbConfig['host']);}
define("DB_USR",$dbConfig['user']);
define("DB_PASS",$dbConfig['pass']);
define("DB_NAME",$dbConfig['dbname']);
define("DB_PORT",$dbConfig['port']);

/*
*TODO: Learn PSR4 and implment a PSR4 compliant ClassLoader
*/

if(!defined('APP_ROOT')){define("APP_ROOT",dirname(__FILE__));}
if(!defined('APP_LIB')){define("APP_LIB",APP_ROOT."/libraries/");}
if(!defined('APP_CTRL')){define("APP_CTRL",APP_ROOT."/controllers/");}
if(!defined('APP_MDL')){define("APP_MDL",APP_ROOT."/models/");}
if(!defined('APP_VIEW')){define("APP_VIEW",APP_ROOT."/views/");}

/* Can you see problems that could arise with this autoloader? 
 *How would you resolve it? Hint: psr-4, namespaces 
 */
function model_autoloader($className){
    if(file_exists(APP_MDL.$className.".php"))
    {
        include(APP_MDL.$className.".php");
    }
}

spl_autoload_register('model_autoloader');
/*
function __autoload($className){
    if(file_exists(APP_LIB.$className."lib.php"))
    {
         require_once(APP_LIB.$className."lib.php");
    } 
    else if(file_exists(APP_CTRL.$className."ctrl.php")) 
    {
        require_once(APP_CTRL.$className."ctrl.php");
    } else if(file_exists(APP_MDL.$className.".php")) 
    {
        require_once(APP_MDL.$className.".php");
    }
    else 
    {
        trigger_error("Uh oh");
    }
}
*/