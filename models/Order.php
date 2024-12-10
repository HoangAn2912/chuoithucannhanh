    <?php
    include_once("models/mketnoi.php");

    class Order {
        private $conn;

        public function __construct() {
            $ketnoi = new ketnoi();
            $this->conn = $ketnoi->ketnoi();
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

        // hàm tìm kiếm 
        public function searchOrdersByCustomerNameOrPhone($searchQuery, $mach) {
            // Truy vấn lấy danh sách đơn hàng
            $stmt = $this->conn->prepare(
                "SELECT donhang.*, tinhtrangdonhang.tenttdh, tinhtrangdonhang.mattdh
                 FROM donhang
                 LEFT JOIN tinhtrangdonhang ON donhang.mattdh = tinhtrangdonhang.mattdh
                 WHERE (donhang.tennguoinhan LIKE ? OR donhang.sdtnguoinhan LIKE ?)
                 AND donhang.mach = ?"
            );
        
            $searchTerm = "%" . $searchQuery . "%";
            $stmt->bind_param("ssi", $searchTerm, $searchTerm, $mach);
            $stmt->execute();
            $result = $stmt->get_result();
            $orders = $result->fetch_all(MYSQLI_ASSOC);
        
            // Lấy danh sách tất cả trạng thái đơn hàng
            $statusSql = "SELECT * FROM tinhtrangdonhang";
            $statusStmt = $this->conn->prepare($statusSql);
            $statusStmt->execute();
            $statusResult = $statusStmt->get_result();
            $statusList = $statusResult->fetch_all(MYSQLI_ASSOC);
        
            // Gắn danh sách trạng thái vào từng đơn hàng dưới dạng mảng
            foreach ($orders as &$order) {
                // Lấy tất cả các trạng thái và gắn vào đơn hàng
                $order['statusList'] = $statusList;
            }
        
            return $orders;
        }
    }
    ?>
