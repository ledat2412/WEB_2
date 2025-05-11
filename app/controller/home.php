<?php
require_once __DIR__ . '/../model/order_items.php';

$orderItemsModel = new OrderItems();
$bestSellers = $orderItemsModel->getBestSellerProducts(8);
$normalProducts = $orderItemsModel->getNormalProducts(8);

include __DIR__ . '/../view/base/home.php';
