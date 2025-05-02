<?php
require_once '../model/database.php';

$user_id = $_SESSION['user_id'] ?? 0;
$username = $_SESSION['username'] ?? 'Khách';

$conn = new mysqli("localhost", "root", "", "lining_1");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "
    SELECT 
        SUM(oi.price * oi.quantity) AS total_spent
    FROM orders o
    JOIN order_items oi ON o.id_order = oi.id_order
    WHERE o.status = 'finish' AND o.id_user = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_spent);
$stmt->fetch();
$stmt->close();

$total_spent = $total_spent ?? 0;

if ($total_spent < 1000000) {
    $rank = 'Chưa là thành viên';
} elseif ($total_spent < 5000000) {
    $rank = 'Đồng';
} elseif ($total_spent < 9000000) {
    $rank = 'Silver';
} elseif ($total_spent < 15000000) {
    $rank = 'Platinum';
} elseif ($total_spent >= 20000000) {
    $rank = 'Diamond';
} else {
    $rank = 'Platinum'; // 15-20 triệu vẫn là Platinum
}

// Định nghĩa các mức hạng để render bảng
$tiers = [
    [
        'name' => 'Chưa là thành viên',
        'min' => 0,
        'max' => 999999,
        'color' => '#aaa',
        'icon' => 'fa-user-slash',
    ],
    [
        'name' => 'Đồng',
        'min' => 1000000,
        'max' => 4999999,
        'color' => '#b87333',
        'icon' => 'fa-medal',
    ],
    [
        'name' => 'Silver',
        'min' => 5000000,
        'max' => 8999999,
        'color' => '#b0b0b0',
        'icon' => 'fa-medal',
    ],
    [
        'name' => 'Platinum',
        'min' => 9000000,
        'max' => 14999999,
        'color' => '#e5e4e2',
        'icon' => 'fa-crown',
    ],
    [
        'name' => 'Diamond',
        'min' => 20000000,
        'max' => PHP_INT_MAX,
        'color' => '#00bfff',
        'icon' => 'fa-gem',
    ],
];

class UserTier {
    private $db;
    public function __construct() {
        $this->db = new database();
    }

    public function getUserTierInfo($user_id) {
        $sql = "
            SELECT 
                SUM(oi.price * oi.quantity) AS total_spent
            FROM orders o
            JOIN order_items oi ON o.id_order = oi.id_order
            WHERE o.status = 'finish' AND o.id_user = ?
        ";
        $stmt = $this->db->handle($sql, [$user_id]);
        $result = $this->db->getData($stmt);
        $total_spent = $result[0]['total_spent'] ?? 0;

        if ($total_spent < 1000000) {
            $rank = 'Chưa là thành viên';
        } elseif ($total_spent < 5000000) {
            $rank = 'Đồng';
        } elseif ($total_spent < 9000000) {
            $rank = 'Silver';
        } elseif ($total_spent < 15000000) {
            $rank = 'Platinum';
        } elseif ($total_spent >= 20000000) {
            $rank = 'Diamond';
        } else {
            $rank = 'Platinum'; // 15-20 triệu vẫn là Platinum
        }
        return [
            'total_spent' => $total_spent,
            'rank' => $rank
        ];
    }
}
?>