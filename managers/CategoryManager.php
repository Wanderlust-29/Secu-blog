<?php

class categoryManager extends AbstractManager {

    public function findAll() : array
    {
        $list = [];
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if($result !== false)
        {
            foreach($result as $item)
            {
                $category = new Category($category["title"], $category["description"]);
                $category->setId($item["id"]);
                $list[] = $category;
            }
        }

        return $list;
    }


    public function findOne(int $id) : ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $parameters = [
            "id" => $id,
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result !== false)
        {
            $category = new Category($category["title"], $category["description"]);
            $category->setId($result["id"]);

            return $category;
        }

        return null;
    }
}
?>
