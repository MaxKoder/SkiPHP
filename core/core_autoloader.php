<?php

function core_autoloader($class) 
{
    $classes = array(
        '\SkiPHP\Folder' => 'classes/files/Folder',
        '\SkiPHP\Config' => 'config/Config',
        '\SkiPHP\Router' => 'router/Router',
        '\SkiPHP\URI' => 'router/URI',
    );
    if (substr($class, 0, 1) !== '\\')
    {
        $class = '\\' . $class;
    }
    if (substr($class, -1, 1) === '/')
    {
        $class = substr($class,0,-1);
    }

    if (array_key_exists($class, $classes))
    {
        require CORE_PATH . $classes[$class] . '.php';
    }
}

spl_autoload_register('core_autoloader');
