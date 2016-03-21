<?php

require_once 'core_autoloader.php';

require_once 'modules/autoloader.php';

$URI = new \SkiPHP\URI($_SERVER["REQUEST_URI"]);
$Config = new \SkiPHP\Config();

$site_config = $Config->load_core('site');

$Router = new \SkiPHP\Router($site_config['default_module']);
$Router->determine_route($URI->segment());

$Router->dispatch();
