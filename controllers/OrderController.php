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

       
    
        public function getOrderFoodList($madh) {
            return $this->orderModel->getOrderDetailsById($madh);
        }


        
        public function mUpdateTinhTrang($madh, $mattdh) {
            $p = new ketnoi();
            $con = $p->ketnoi();
            
            if ($con->connect_errno) {
                return false;
            } else {
                // Sử dụng Prepared Statement
                $stmt = $con->prepare("UPDATE donhang SET mattdh = ? WHERE madh = ?");
                $stmt->bind_param("ii", $mattdh, $madh); // Giả định cả hai đều là số nguyên
                
                $result = $stmt->execute();
                $stmt->close();
                
                return $result;
            }
        }

        public function cUpdateTinhTrang($madh, $mattdh){
			var_dump($madh, $mattdh);
			$p = new OrderController();
			return $p -> mUpdateTinhTrang($madh,$mattdh);
		}

        // hàm này dùng để phục vụ cho chi tiết đơn hàng
        public function selectdanhsachdonhang($mach){
            return $this->orderModel->danhsachdonhang($mach);
        }
        public function getchitietdonhang($madh,$mach){
            return $this->orderModel->xemchitietdonhang($madh,$mach);
        } 
    }
    ?>