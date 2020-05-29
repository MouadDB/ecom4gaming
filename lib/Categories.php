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

    public function add_category($name)
    {
        global $conn;

        if (is_string($name)) {
            $sql = "INSERT INTO categories (name) VALUES ('$name')";

            $result = $conn->query($sql);

            return [
                'status' => 'success',
                'msg' => 'category has been added',
            ];
        } else {
            return [
                'status' => 'error',
                'msg' => 'Error',
            ];
        }
    }

    public function update_category($id, $name)
    {
        global $conn;

        if (is_numeric($id) || is_string($name)) {
            $sql = "UPDATE categories SET name='$name' WHERE id='$id'";

            $result = $conn->query($sql);

            return [
                'status' => 'success',
                'msg' => 'category has been updated',
            ];
        } else {
            return [
                'status' => 'error',
                'msg' => 'Error',
            ];
        }
    }

    public function delete_category($id)
    {
        global $conn;

        $sql = "DELETE FROM categories WHERE id='$id'";

        $conn->query($sql);
    }

}
