<?php
namespace App\Model;

class Post 
{
    private $id;
    private $title;
    private $body;
    private $comments;

    public function __construct($data){
        foreach ($data as $key => $value) $this->{$key} = $value;
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getTitle()
    {
        return $this->title;
    }
 
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
 
    public function getBody()
    {
        return $this->body;
    }

    public function getBodyExcerpt()
    {
        if (strlen($this->body) < 30) {
            return $this->body;
        } 
        else {
            $excerpt = wordwrap($this->body, 28);
            $excerpt = explode("\n", $excerpt);
        
            $excerpt = $excerpt[0] . '...';
        
            return $excerpt;
        }
    }
 
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
 
    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }
}