<?php

class Categories
{
    public function get_all_cats()
    {
        global $conn;

        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);

        $categories = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $categories[] = $row;
        }

        return $categories;
    }

    public function get_names()
    {
        global $conn;

        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);

        $categories = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $categories[$row['id']] = $row['name'];
        }

        return $categories;
    }
    
}
