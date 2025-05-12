<?php 
    include_once "../../../app/model/database.php";
    include_once "../../../app/model/product.php";
    include_once "../../../app/model/descriptions.php";
    include_once "../../../app/model/sex.php";
    include_once "../../../app/model/colors.php";
    include_once "../../../app/model/materials.php";
    include_once "../../../app/model/product_variant.php";
    include_once "../../../app/model/order_items.php";
    include_once "../../../app/model/users.php";

    class orders {
        private $db;

        public function __construct() {
            $this->db = new database();
        }

        public function getAllOrders() {
            // Sửa lại tên cột cho đúng với bảng orders và addresses
            // Giả sử orders có cột id_address là khóa ngoại tới addresses
            $sql = "SELECT O.id_order, O.payment_method, O.status, A.address, U.username
            FROM orders O
            JOIN users U ON O.id_user = U.id_users
            JOIN addresses A ON A.id_address = O.id_address";
            
            return $this->db->getData($sql);
        }

        public function getFilterOrders($district_filter, $status_filter, $from_date = '', $to_date = '') {
            $filter = "SELECT O.id_order, O.payment_method, O.status, A.address, U.username, O.order_date
            FROM orders O
            JOIN users U ON O.id_user = U.id_users
            JOIN addresses A ON A.id_address = O.id_address
            WHERE 1=1";

            if (!empty($district_filter)) {
                $filter .= " AND A.address LIKE '%$district_filter%'";
            }

            if (!empty($status_filter)) {
                $filter .= " AND O.status = '$status_filter'";
            }

            if (!empty($from_date)) {
                $filter .= " AND DATE(O.order_date) >= '$from_date'";
            }

            if (!empty($to_date)) {
                $filter .= " AND DATE(O.order_date) <= '$to_date'";
            }

            return $this->db->getData($filter);
        }

        public function getUpdateStatus($id_order, $status_name) {
            $updateStatus = "UPDATE orders SET status = '$status_name' WHERE id_order = '$id_order'";
            return $this->db->handle ($updateStatus);
        }
    }
?>

<?php
$district = isset($_POST['district']) ? $_POST['district'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$from_date = isset($_POST['from_date']) ? $_POST['from_date'] : '';
$to_date = isset($_POST['to_date']) ? $_POST['to_date'] : '';

$orderModel = new orders();
$order_product = $orderModel->getFilterOrders($district, $status, $from_date, $to_date);
?>