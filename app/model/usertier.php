<?php
require_once '../model/database.php';
// Định nghĩa các mức hạng để render bảng
$tiers = [
    [
        'name' => 'Not a member',
        'min' => 0,
        'max' => 999999,
        'color' => '#aaa',
        'icon' => 'fa-user-slash',
    ],
    [
        'name' => 'Bronze',
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
            WHERE o.status = 'completed' AND o.id_user = ?
        ";
        $stmt = $this->db->handle($sql, [$user_id]);
        $result = $this->db->getData($stmt);
        $total_spent = $result[0]['total_spent'] ?? 0;

        if ($total_spent < 1000000) {
            $rank = 'Not a member';
        } elseif ($total_spent < 5000000) {
            $rank = 'Bronze';
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