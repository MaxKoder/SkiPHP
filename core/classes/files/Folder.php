<?php

namespace SkiPHP;

class Folder
{
    public $name;
    
    public $path;
    
    public function __construct($path)
    {
        if (substr($path, -1, 1) === '/')
        {
            $path = substr($path,0,-1);
        }
        $this->path = $path;
        $parts = explode('/', $path);
        $this->name = end($parts);
    }
    
    public function getChildren($recursive = true)
    {
        
    }
}
