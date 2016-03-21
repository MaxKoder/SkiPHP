<?php

namespace SkiPHP;

class Config
{
    protected static $loaded_core = array();
    
    protected static $loaded_modules = array();
    
    protected $core_path_files; 
    
    public function __construct()
    {
        $this->core_path_files = CORE_PATH . 'config/';
    }
    
    public function load_core($file)
    {
        if (!array_key_exists($file, self::$loaded_core))
        {
            $pathfile = $this->core_path_files . $file . '.php';
            if (is_file($pathfile))
            {
                include $pathfile;
                self::$loaded_core[$file] = $config[strtolower($file)];
            }
            else
            {
                echo $file . 'not found in ' . $this->core_path_files;
            }
        }
        return self::$loaded_core[$file];
    }
}
