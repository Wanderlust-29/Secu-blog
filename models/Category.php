<?php

class Category {
    private ?int $id = null;
    
    public function __construct(private string $title, private string $description){
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
    public function getDescription() : string
    {
        return $this->description;
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
    public function setDescription (string $description) : void
    {
        $this->description = $description;
    }
}
?>
