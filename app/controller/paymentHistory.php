<?php
require_once 'models/PaymentHistory.php';

class PaymentHistoryController
{
    private $model;

    public function __construct() {
        $this->model = new PaymentHistory();
    }

    public function index() {
        $histories = $this->model->getAllHistory();
        include 'views/payment_history/index.php';
    }

    public function show($id) {
        $history = $this->model->getHistory($id);
        include 'views/payment_history/show.php';
    }

    public function delete($id) {
        $this->model->deleteHistory($id);
        header("Location: index.php?controller=payment_history&action=index");
    }
}
?>
