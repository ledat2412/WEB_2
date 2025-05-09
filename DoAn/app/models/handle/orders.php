<?php 
    include_once "../../models/tables/database.php";
    include_once "../../models/tables/product.php";
    include_once "../../models/tables/description.php";
    include_once "../../models/tables/sex.php";
    include_once "../../models/tables/color.php";
    include_once "../../models/tables/material.php";
    include_once "../../models/tables/product_variant.php";
    include_once "../../models/tables/order_items.php";
    include_once "../../models/tables/orders.php";
    include_once "../../models/tables/users.php";

    class orders {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function getAllOrders() {
            $sql = "SELECT O.id_order, O.id_users, O.status, A.address, U.username
            FROM orders O
            JOIN `user` U ON O.id_users = U.id_users
            JOIN addresses A ON A.id_address = O.address";
            
            return $this->db->getData($sql);
        }

        public function getFilterOrders($district_filter, $status_filter) {
            $filter = "SELECT O.id_order, O.id_users, O.status, A.address, U.username
            FROM orders O
            JOIN `user` U ON O.id_users = U.id_users
            JOIN addresses A ON A.id_address = O.address
            WHERE 1=1";

            if (!empty($district_filter)) {
                $filter .= " AND A.address LIKE '%$district_filter%'";
            }

            if (!empty($status_filter)) {
                $filter .= " AND O.status = '$status_filter'";
            }

            return $this->db->getData($filter);
        }

        public function getUpdateStatus($id_order, $status_name) {
            $updateStatus = "UPDATE orders SET status = '$status_name' WHERE id_order = '$id_order'";
            return $this->db->handle ($updateStatus);
        }
    }
?>