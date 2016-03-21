<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SkiPHP;

/**
 * Description of URI
 *
 * @author Schyzo
 */
class URI
{
	
	/* @var array	URI segments */
	protected $explodedURI;
	
	/* @var array	Directory Name */
	protected $scriptPath;
    
    public function __construct($uri)
    {
		$this->explodedURI = explode("/", $uri);
		$this->scriptPath = explode("/", $_SERVER["SCRIPT_NAME"]);
		
		$this->cleanRequestURI();
	}
    
    public function segment($id = false)
	{
		if ($id !== false)
		{
			return (isset($this->explodedURI[$id]) ? $this->explodedURI[$id] : false);
		}
		return $this->explodedURI;
	}
    
    /**
	 * Clean URI to keep only true URI, delete script folders and put array keys to 0
	 */
	private function cleanRequestURI()
	{
		for ($i = 0; $i < sizeof($this->scriptPath); $i++)
		{
			if ($this->explodedURI[$i] == $this->scriptPath[$i])
			{
				unset($this->explodedURI[$i]);
			}
		}
		$this->explodedURI = array_values($this->explodedURI);
	}
}
