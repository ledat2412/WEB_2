<?php
require_once 'database.php';

// Khởi tạo kết nối database
$db = new DB();

$table_order_items = $db->exec("CREATE TABLE IF NOT EXISTS order_items (
    id_order_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_order INT UNSIGNED NOT NULL,
    id_variant INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_order) REFERENCES `order`(id_order),
    FOREIGN KEY (id_variant) REFERENCES product_variants(id_variant)
)");

class OrderItems {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function addOrderItem($id_order, $id_variant, $quantity, $price) {
        $sql = "INSERT INTO order_items (id_order, id_variant, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->exec($sql, [$id_order, $id_variant, $quantity, $price]);
    }

    public function getOrderItems($id_order) {
        $sql = "SELECT oi.*, pv.size, p.name as product_name,
                c.name as color_name, m.name as material_name
                FROM order_items oi
                JOIN product_variants pv ON oi.id_variant = pv.id_variant
                JOIN product p ON pv.id_product = p.id_product
                LEFT JOIN colors c ON pv.color_id = c.id
                LEFT JOIN materials m ON pv.material_id = m.id
                WHERE oi.id_order = ?";
        $this->db->exec($sql, [$id_order]);
        return $this->db->getData();
    }

    public function getOrderItem($id) {
        $sql = "SELECT * FROM order_items WHERE id_order_item = ?";
        $this->db->exec($sql, [$id]);
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

    public function getOrderItemsTotal($id_order) {
        $sql = "SELECT SUM(quantity * price) as total
                FROM order_items
                WHERE id_order = ?";
        $this->db->exec($sql, [$id_order]);
        $result = $this->db->getData();
        return $result[0]['total'] ?? 0;
    }
}
?> 