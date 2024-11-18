<?php
// Kiểm tra xem yêu cầu có phải là POST và có tồn tại 'action' hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // Xử lý action 'getCustomer' khi có mã khách hàng (makh)
    if ($action == 'getCustomer' && isset($_POST['makh'])) {
        $makh = $_POST['makh'];

        // Tạo đối tượng controller và gọi hàm lấy thông tin khách hàng
        $controller = new ControllerQuanLyKhachHang();
        $controller->getMotKhachHang($makh);
    }

    // Các action khác có thể được thêm vào đây nếu cần
} else {
    // Nếu không có yêu cầu hợp lệ, trả về lỗi
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ.']);
}

// Controller
class ControllerQuanLyKhachHang {
    // Hàm để lấy thông tin một khách hàng
    public function getMotKhachHang($makh) {
        $p = new modelQuanLyKhachHang();  // Tạo đối tượng model
        $kq = $p->selectMotKhachHang($makh);  // Gọi hàm trong model để lấy dữ liệu khách hàng

        header('Content-Type: application/json');  // Set content-type là JSON

        // Kiểm tra xem dữ liệu có hợp lệ không
        if ($kq && $kq->num_rows > 0) {
            $data = $kq->fetch_assoc();  // Lấy dữ liệu khách hàng
            echo json_encode(['status' => 'success', 'data' => $data]);  // Trả về dữ liệu dưới dạng JSON
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu!']);  // Nếu không có dữ liệu
        }
    }
}

// Model
class modelQuanLyKhachHang {
    // Hàm để lấy một khách hàng từ cơ sở dữ liệu
    public function selectMotKhachHang($makh) {
        $p = new ketnoi();  // Kết nối cơ sở dữ liệu
        $con = $p->ketnoi();  // Kết nối

        if ($con->connect_errno) {
            return false;  // Nếu có lỗi kết nối, trả về false
        } else {
            $sql = "SELECT * FROM khachhang WHERE makh = '$makh'";  // Truy vấn lấy thông tin khách hàng
            $kq = mysqli_query($con, $sql);  // Thực thi truy vấn
            return $kq;  // Trả về kết quả truy vấn
        }
    }
}

// Class kết nối cơ sở dữ liệu

class ketnoi {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "cuahangthucan_db";
    private $conn;

    public function ketnoi() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            echo "Kết nối không thành công: " . $this->conn->connect_error;
            exit();
        } else {
            return $this->conn;
        }
    }
}




?>
