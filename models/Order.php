    <?php
    include_once("models/mketnoi.php");

    class Order {
        private $conn;

        public function __construct() {
            $ketnoi = new ketnoi();
            $this->conn = $ketnoi->ketnoi();
        }

        public function getAllOrdersByStore($storeId) {
            $sql = "SELECT donhang.*, khachhang.tennd, khachhang.diachi, khachhang.sodienthoai, tinhtrangdonhang.tenttdh 
                    FROM donhang 
                    JOIN khachhang ON donhang.makh = khachhang.makh 
                    JOIN tinhtrangdonhang ON donhang.mattdh = tinhtrangdonhang.mattdh 
                    WHERE donhang.mach = ?"; // Bỏ điều kiện loại trừ trạng thái 6 (Đã hủy)
            $stmt = $this->conn->prepare($sql);
            
            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }
        
            $stmt->bind_param("i", $storeId);
            $stmt->execute();
            
            $result = $stmt->get_result();
            if ($result === false) {
                die("Error executing query: " . $stmt->error);
            }
        
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về tất cả đơn hàng dưới dạng mảng
        }
        
        //lấy đơn hàng theo trạng thái
        public function getAllOrderStatuses() {
            $sql = "SELECT * FROM tinhtrangdonhang";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về danh sách trạng thái
        }

        public function getOrdersByStatus($statusId) {
            $sql = "SELECT donhang.*, khachhang.tennd, khachhang.diachi, khachhang.sodienthoai, tinhtrangdonhang.tenttdh 
                    FROM donhang 
                    JOIN khachhang ON donhang.makh = khachhang.makh 
                    JOIN tinhtrangdonhang ON donhang.mattdh = tinhtrangdonhang.mattdh 
                    WHERE donhang.mattdh = ?";
        
            $stmt = $this->conn->prepare($sql); 
        
            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }
        
            $stmt->bind_param("i", $statusId);
            $stmt->execute();
            
            $result = $stmt->get_result();
            
            if ($result === false) {
                die("Error executing query: " . $stmt->error);
            }
        
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về danh sách đơn hàng theo trạng thái
        }

        //chi tiết đơn hàng
        public function getOrderDetails($madh) {
            // Lấy thông tin đơn hàng
            $sql = "SELECT donhang.*, khachhang.tennd, khachhang.diachi, khachhang.sodienthoai, tinhtrangdonhang.tenttdh 
                    FROM donhang 
                    JOIN khachhang ON donhang.makh = khachhang.makh 
                    JOIN tinhtrangdonhang ON donhang.mattdh = tinhtrangdonhang.mattdh
                    WHERE donhang.madh = ?";
            $stmt = $this->conn->prepare($sql);
            
            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }

            $stmt->bind_param("i", $madh); // Sửa kiểu dữ liệu thành int
            $stmt->execute();
            
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Trả về thông tin đơn hàng
        }

        public function getOrderDetailsById($madh) {
            // Lấy chi tiết các món ăn trong đơn hàng
            $sql = "SELECT chitietdonhang.*, monan.tenma 
                    FROM chitietdonhang 
                    JOIN monan ON chitietdonhang.mama = monan.mama 
                    WHERE chitietdonhang.madh = ?";
            $stmt = $this->conn->prepare($sql);
            
            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }

            $stmt->bind_param("i", $madh);
            $stmt->execute();
            
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC); // Trả về chi tiết món ăn trong đơn hàng
        }



        // danh sách đơn hàng
        public function danhsachdonhang($mach) {
            $sql = "SELECT dh.*, tt.tenttdh 
                    FROM donhang dh 
                    INNER JOIN tinhtrangdonhang tt ON dh.mattdh = tt.mattdh
                    WHERE dh.mach = ?"; // where mã cửa hàng

            $stmt = $this->conn->prepare($sql);

            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }

            // Gán tham số
            $stmt->bind_param("i", $mach);

            // Thực thi câu lệnh
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();

            if ($result === false) {
                die("Error executing query: " . $stmt->error);
            }

            $orderList = $result->fetch_all(MYSQLI_ASSOC);

            // Lấy danh sách trạng thái
            $statusSql = "SELECT * FROM tinhtrangdonhang";
            $statusStmt = $this->conn->prepare($statusSql);
            $statusStmt->execute();
            $statusResult = $statusStmt->get_result();
            $statusList = $statusResult->fetch_all(MYSQLI_ASSOC);

            // Gắn danh sách trạng thái vào từng đơn hàng
            foreach ($orderList as &$order) {
                $order['statusList'] = $statusList;
            }

            return $orderList;
        }

        public function xemchitietdonhang($madh, $mach) {
            // Câu lệnh truy vấn SQL
            $sql = "SELECT dh.*, ct.*, tt.tenttdh, ma.tenma 
                    FROM donhang dh 
                    INNER JOIN chitietdonhang ct ON dh.madh = ct.madh 
                    INNER JOIN tinhtrangdonhang tt ON tt.mattdh = dh.mattdh 
                    INNER JOIN monan ma ON ct.mama = ma.mama 
                    WHERE dh.madh = ? AND dh.mach = ?"; // where mã cửa hàng

            // Chuẩn bị câu lệnh truy vấn
            $stmt = $this->conn->prepare($sql);

            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }

            // Gán tham số cho truy vấn
            $stmt->bind_param("ii", $madh, $mach);

            // Thực thi câu lệnh
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();

            if ($result === false) {
                die("Error executing query: " . $stmt->error);
            }

            // Trả về danh sách chi tiết đơn hàng
            return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Tìm kiếm đơn hàng theo tên người nhận hoặc số điện thoại
    public function searchOrdersByCustomerNameOrPhone($searchQuery, $mach) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM donhang 
            WHERE (tennguoinhan LIKE ? OR sdtnguoinhan LIKE ?) 
            AND mach = ?"
        );
        $searchTerm = "%" . $searchQuery . "%";
        $stmt->bind_param("ssi", $searchTerm, $searchTerm, $mach);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    }
    ?>
