<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SkiPHP;

/**
 * Description of Model
 *
 * @author Schyzo
 */
abstract class Model
{
    protected static $db;
    
    public static function setConn(\medoo $db)
    {
        self::$db = $db;
    }
}
