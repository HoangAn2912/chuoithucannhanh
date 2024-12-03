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
}
?>
