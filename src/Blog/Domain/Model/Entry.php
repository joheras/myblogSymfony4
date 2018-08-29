<?php

namespace App\Blog\Domain\Model;

class Entry {
    
    private $id;
    private $title;
    private $text;
    
    function __construct($id, $title, $text) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getTitle() {
        return $this->title;
    }
    
    function getText() {
        return $this->text;
    }
    
    public function __toString() {
        return "Title: " . $this->title . ". Body: " . $this->text;
    }
}
