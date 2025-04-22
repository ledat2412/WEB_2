<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_order_items = $db->exec("CREATE TABLE IF NOT EXISTS order_items (
    id_order_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_order INT UNSIGNED,
    id_product INT UNSIGNED,
    quantity INT NOT NULL,
    price INT NOT NULL,
    FOREIGN KEY (id_order) REFERENCES `order`(id_order),
    FOREIGN KEY (id_product) REFERENCES product(id_product)
)");

class OrderItems {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addOrderItem($id_order, $id_product, $quantity, $price) {
        $sql = "INSERT INTO order_items (id_order, id_product, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->exec($sql, [$id_order, $id_product, $quantity, $price]);
    }

    public function getOrderItem($id) {
        $sql = "SELECT oi.*, p.picture_path, p.size, 
                co.name as color_name, m.name as material_name, s.name as sex_name
                FROM order_items oi
                LEFT JOIN product p ON oi.id_product = p.id_product
                LEFT JOIN colors co ON p.color_id = co.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                WHERE oi.id_order_item = ?";
        $this->db->exec($sql, [$id]);
        return $this->db->getData();
    }

    public function getOrderItems($id_order) {
        $sql = "SELECT oi.*, p.picture_path, p.size, 
                co.name as color_name, m.name as material_name, s.name as sex_name
                FROM order_items oi
                LEFT JOIN product p ON oi.id_product = p.id_product
                LEFT JOIN colors co ON p.color_id = co.id
                LEFT JOIN materials m ON p.material_id = m.id
                LEFT JOIN sex s ON p.sex_id = s.id
                WHERE oi.id_order = ?";
        $this->db->exec($sql, [$id_order]);
        return $this->db->getData();
    }

    public function updateOrderItem($id, $quantity, $price) {
        $sql = "UPDATE order_items SET quantity = ?, price = ? WHERE id_order_item = ?";
        return $this->db->exec($sql, [$quantity, $price, $id]);
    }

    public function deleteOrderItem($id) {
        $sql = "DELETE FROM order_items WHERE id_order_item = ?";
        return $this->db->exec($sql, [$id]);
    }

    public function deleteOrderItems($id_order) {
        $sql = "DELETE FROM order_items WHERE id_order = ?";
        return $this->db->exec($sql, [$id_order]);
    }
}
?> 