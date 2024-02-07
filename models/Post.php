<?php

class User {
    private ?int $id = null;
    
    public function __construct(private string $title, private string $excerpt, private string $content, private int $author, private string $createdAt){
    }
    //GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
    public function getExcerpt() : string
    {
        return $this->excerpt;
    }
    public function getContent() : string
    {
        return $this->content;
    }
    public function getAuthor() : int
    {
        return $this->author;
    }
    public function getCreatedAt() : string
    {
        return $this->createdAt;
    }

    //SETTERS
    public function setId (int $id) : void
    {
        $this->id = $id;
    }
    public function setTitle (string $title) : void
    {
        $this->title = $title;
    }
    public function setExcerpt (string $excerpt) : void
    {
        $this->excerpt = $excerpt;
    }
    public function setContent (string $content) : void
    {
        $this->content = $content;
    }
    public function setAuthor (string $author) : void
    {
        $this->author = $author;
    }
    public function setCreatedAt (string $createAt) : void
    {
        $this->createdAt = $createdAt;
    }
}
?>