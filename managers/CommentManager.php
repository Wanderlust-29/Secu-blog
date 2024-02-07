<?php

class CommentManager extends AbstractManager
{
    public function findByPost(int $postId) : array
    {
        $query = $this->db->prepare('SELECT * FROM comments WHERE post_id = :postId');
        $parameters = [
            "postId" => $postId,
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $commentsArray = [];
        
        foreach ($result as $item) {
            $comment = new Comment($item["content"]);
            $comment->setId($item["id"]);
            $commentsArray[] = $comment;
        }
        
        return $commentsArray;
    }
    public function create(Comment $comment) : void
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $query = $this->db->prepare('INSERT INTO comments (id, content, userId, postId) VALUES (NULL, :content, :userId, :postId)');
        $parameters = [
            "content" => $comment->getContent(),
            "userId" => $comment->getUserId(),
            "postId" => $comment->getPostId()
        ];

        $query->execute($parameters);

        $comment->setId($this->db->lastInsertId());
    }

}