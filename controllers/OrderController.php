    <?php
    include_once("models/Order.php");

    class OrderController {
        private $orderModel;

        public function __construct() {
            $this->orderModel = new Order(); // Khởi tạo mà không cần tham số
        }

        //  chi tiết đơn hàng
        public function selectdanhsachdonhang($mach){
            return $this->orderModel->danhsachdonhang($mach);
        }
        public function getchitietdonhang($madh,$mach){
            return $this->orderModel->xemchitietdonhang($madh,$mach);
        } 

        //tìm kiếm
        public function searchOrders($searchQuery, $mach) {
            return $this->orderModel->searchOrdersByCustomerNameOrPhone($searchQuery, $mach);
        }
    }
    ?>