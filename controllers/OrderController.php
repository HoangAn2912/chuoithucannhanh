<?php
include_once("models/Order.php");

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order(); // Khởi tạo mà không cần tham số
    }

    public function listOrders($storeId) {
        return $this->orderModel->getAllOrdersByStore($storeId);
    }

    public function getOrderDetails($madh) {
        return $this->orderModel->getOrderDetails($madh);
    }

    public function cancelOrder($madh) {
        return $this->orderModel->cancelOrder($madh);
    }
}
?>