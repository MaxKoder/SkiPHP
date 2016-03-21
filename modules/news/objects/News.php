<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace News\Objects;

/**
 * Description of News
 *
 * @author Schyzo
 */
class News
{
    public 
        $id,
        $title,
        $content,
        $creation_timestamp,
        $author_id;
    
    public $is_new = true;
    
    public function hydrate_by_data($data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->creation_timestamp = $data['creation_timestamp'];
        $this->author_id = $data['author_id'];
        
        $this->is_new = false;
    }
        
        
}
