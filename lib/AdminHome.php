<?php 

class AdminHome
{
    public function get_sales()
    {
        global $conn;

        $sql = "SELECT SUM(total) FROM orders";

        $result = $conn->query($sql);

        $row = $result->fetch_array();

        return $row[0];
    }

    public function get_orders()
    {
        global $conn;

        $sql = "SELECT id FROM orders";

        $result = $conn->query($sql);

        return $result->num_rows;
    }

    public function get_products()
    {
        global $conn;

        $sql = "SELECT id FROM products";

        $result = $conn->query($sql);

        return $result->num_rows;
    }
}
