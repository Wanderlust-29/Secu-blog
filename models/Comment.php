<?php

class Comment {
    private ?int $id = null;
    
    public function __construct(private string $content, private int $userId, private string $postId){
    }
    //GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getContent() : string
    {
        return $this->content;
    }
    public function getUserId() : int
    {
        return $this->userId;
    }
    public function getPostId() : int
    {
        return $this->postId;
    }

    //SETTERS
    public function setId (int $id) : void
    {
        $this->id = $id;
    }
    public function setContent (string $content) : void
    {
        $this->content = $content;
    }
    public function setUserId (string $userId) : User
    {
        $this->userId = $userId;
    }
    public function setPostId (string $postId) : Post
    {
        $this->postId = $postId;
    }
}
?>