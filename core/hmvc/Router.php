<?php

namespace SkiPHP;

class Router
{
    
    public $module;
    
    public $controller;
    
    public $method;
    
    public $params;
    
    protected $default_module;
    
    public function __construct($default_module)
    {
        $this->default_module = $default_module;
    }
    
    public function determine_route($uri = array())
    {
        $commands = array_values($uri);
	
        $this->determine_Module($commands);
        // Suppression du module dans l'URI
        $commands = array_slice($commands, 1);
        
        // Définition du controller
        // Si pas de controller spécifié on prend le même nom que le module
        $this->controller = ucfirst(isset($commands[0]) && $commands[0] != '' ? $commands[0] : $this->default_module);
        // Suppression du controller dans l'URI
        $commands = array_slice($commands, 1);

        // Définition de la méthode
        // Si pas de méthode spécifiée on lance 'index'
        $this->method = (isset($commands[0]) && $commands[0] != '' ? $commands[0] : 'index');
        // Suppression de la méthode dans l'URI
        $commands = array_slice($commands, 1);
        
        // Nettoyage du tableau
        $commands = array_filter($commands);

        // Mise en place des paramètres
        $this->params = $commands;
    }
    
    public function get_Callback()
    {
        return '\\' . $this->module . '\Controllers\\' . $this->controller;
    }
    
    protected function determine_Module($commands)
    {
        // Définition du module
        // Si pas de module spécifié on prend celui dans la config
        $this->module = ucfirst(isset($commands[0]) && $commands[0] != '' ? $commands[0] : $this->default_module);
    }
}
