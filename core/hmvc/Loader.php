<?php

namespace SkiPHP;


class Loader
{
    protected static $loaded_modules = array();
    
    public function load($module)
    {
        if (!in_array($module, self::$loaded_modules))
        {
            $path = MODULES_PATH . $module .'/includes';
            if (is_dir($path))
            {
                include $path;
                self::$loaded_module[$file] = $config[strtolower($file)];
            }
            else
            {
                echo $file . 'not found in ' . $this->core_path_files;
            }
        }
        return self::$loaded_core[$file];
    }
}
