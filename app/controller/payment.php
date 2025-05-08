<?php
require_once __DIR__ . '/../model/payments.php';

class PaymentController {
    private $paymentModel;

    public function __construct() {
        $this->paymentModel = new Payments();
    }

    // Thêm thanh toán mới
    public function createPayment($id_user, $payment_method) {
        return $this->paymentModel->addPayment($id_user, $payment_method);
    }

    // Lấy thông tin thanh toán theo ID
    public function viewPayment($id_payment) {
        return $this->paymentModel->getPayment($id_payment);
    }

    // Lấy danh sách thanh toán của người dùng
    public function listPaymentsByUser($id_user) {
        return $this->paymentModel->getPaymentsByUser($id_user);
    }

    // Hiển thị danh sách thanh toán của người dùng
    public function showPaymentsByUser($id_user) {
        $payments = $this->listPaymentsByUser($id_user);
        require_once __DIR__ . '/../view/payment/list.php';
    }

    // Hiển thị chi tiết thanh toán
    public function showPaymentDetail($id_payment) {
        $payment = $this->viewPayment($id_payment);
        require_once __DIR__ . '/../view/payment/detail.php';
    }
    
}
?>
