<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace News\Models;

/**
 * Description of News
 *
 * @author Schyzo
 */
class NewsManager extends \SkiPHP\Model
{
    protected $table = 'news';
    
    protected $nb_to_display = 10;
    
    public function getLastNews()
    {
        $datas = self::$db->select($this->table, '*', [
            "ORDER" => "creation_timestamp",
            "LIMIT" => [0, $this->nb_to_display]
        ]);
        
        $news_array = [];
        foreach ($datas as $data)
        {
            $news_array[] = $this->create_news($data);
        }
        return $news_array;
    }
    
    protected function create_news($data)
    {
        $news = new \News\Objects\News();
        $news->hydrate_by_data($data);
        return $news;
    }
}
