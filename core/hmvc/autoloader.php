<?php

function modules_autoloader($class) {
    $class = explode('\\', $class);
    if ($class[0] !== 'SkiPHP')
    {
        $path = MODULES_PATH . strtolower($class[0]) . '/' . strtolower($class[1]) . '/' . $class[2] . '.php';
        if (is_file($path))
        {
            require $path;
        }
    }
}

spl_autoload_register('modules_autoloader');

