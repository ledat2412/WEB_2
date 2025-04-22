<?php
require_once '../model/database.php';

class Cart {
    public function __construct() {
        session_start();
    }


}
    <h2>Giỏ hàng</h2>
<?php if (!empty($_SESSION['cart'])): ?>
    <ul>
        <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
            <li>Sản phẩm #<?= $id ?> | Số lượng: <?= $qty ?>
                <a href="/cart/remove/<?= $id ?>">[X]</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/checkout">Tiến hành thanh toán</a>
<?php else: ?>
    <p>Giỏ hàng trống.</p>
<?php endif; ?>
