<?php

class PostManager extends AbstractManager
{
    public function findLatest() : array
    {   
        $list = [];
        $query = $this->db->prepare('SELECT * FROM posts ORDER BY created_at DESC LIMIT 4');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
         if($result !== false)
        {
            foreach($result as $item)
            {
                $post = new Post($post["title"], $post["excerpt"], $post["content"], $post["author"], DateTime::createFromFormat('Y-m-d H:i:s', $post["created_at"]));
                $post->setId($item["id"]);
                $list[] = $category;
            }
        }

        return $list;
    }
    
    public function findOne(int $id) : ?Post
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id = :id');
        $parameters = [
            "id" => $id,
        ];
        $query->execute($parameters);
        $post = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($post !== false) {
            $item = new Post($post["title"], $post["excerpt"], $post["content"], $post["author"], DateTime::createFromFormat('Y-m-d H:i:s', $post["created_at"]));
            $item->setId($post["id"]);
        } else {
            $item = new User("", "", "", "", new DateTime());
        }
    
        return $item;
    }
    
    public function findByCategory(int $categoryId): array
    {
        $query = $this->db->prepare('SELECT post.* FROM posts post
                                    INNER JOIN posts_categories post_category ON post.id = post_category.post_id
                                    WHERE post_category.category_id = :categoryId');
        $parameters = [
            "categoryId" => $categoryId,
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $list =[];
        if($result !== false)
        {
            foreach($result as $item)
            {
                $post = new Post($post["title"], $post["excerpt"], $post["content"], $post["author"], DateTime::createFromFormat('Y-m-d H:i:s', $post["created_at"]));
                $post->setId($item["id"]);
                $list[] = $category;
            }
        }
        
        return $list;
    }

}