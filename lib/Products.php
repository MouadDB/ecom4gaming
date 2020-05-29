<?php 

class Products
{
    public function get_all_products()
    {
        global $conn;

        $sql = "SELECT * FROM products";

        $result = $conn->query($sql);

        $products = [];

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }

}
