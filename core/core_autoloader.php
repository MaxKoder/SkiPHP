<?php

function core_autoloader($class) 
{
    $classes = array(
        //Config folder
        '\SkiPHP\Config' => 'config/Config',
        //HMVC folder
        '\SkiPHP\Model' => 'hmvc/Model',
        '\SkiPHP\Router' => 'hmvc/Router',
        '\SkiPHP\URI' => 'hmvc/URI',
        //Objects folder
            //Files folder
            '\SkiPHP\Folder' => 'classes/files/Folder',
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
