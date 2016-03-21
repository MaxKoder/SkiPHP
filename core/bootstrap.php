<?php
(defined('CORE_PATH')) OR exit('No direct script access allowed');

require_once 'core_autoloader.php';

require_once 'hmvc/autoloader.php';

require_once 'libs/loader.php';

$URI = new \SkiPHP\URI($_SERVER["REQUEST_URI"]);
$Config = new \SkiPHP\Config();

$site_config = $Config->load_core('site');
$db_config = $Config->load_core('database');


$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => $db_config['dbname'],
	'server' => $db_config['host'],
	'username' => $db_config['user'],
	'password' => $db_config['password'],
	'charset' => 'utf8',
 
	// [optional]
	'port' => $db_config['port'],
 
	// [optional] Table prefix
	'prefix' => $db_config['prefix'],
]);

\SkiPHP\Model::setConn($database);

$Router = new \SkiPHP\Router($site_config['default_module']);
$Router->determine_route($URI->segment());

$callback = $Router->get_Callback();

$SkiPHP = new $callback();

call_user_func_array(array(&$SkiPHP, $Router->method), $Router->params);
