<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace News\Controllers;

/**
 * Description of Plop
 *
 * @author Schyzo
 */
class News
{    
    public function index()
    {
        $manager = new \News\Models\NewsManager();
        $news = $manager->getLastNews();

    }
}
