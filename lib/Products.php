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

    public function add_product($result)
    {
        global $conn;

        if (is_array($result) && $result['product_name'] &&
        $result['product_cats'] &&
        $result['product_thumb'] &&
        $result['product_price'] &&
        $result['product_quantity'] ) {
            $sql = "INSERT INTO products (name, categories, thumbnail, price, quantity)
                VALUES (
                    '{$result['product_name']}',
                    '{$result['product_cats']}',
                    '{$result['product_thumb']}',
                    '{$result['product_price']}',
                    '{$result['product_quantity']}'
                    )";

            $result = $conn->query($sql);

            return [
                'status' => 'success',
                'msg' => 'Product has been added',
            ];
        } else {
            return [
                'status' => 'error',
                'msg' => 'Error',
            ];
        }
    }
}
