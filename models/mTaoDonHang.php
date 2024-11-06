<<<<<<< HEAD
<?php
require_once 'models/mketnoi.php';
=======
 <?php
// class ketnoi {
//     private $host = "localhost";
//     private $user = "root";
//     private $pass = "";
//     private $db = "cuahangthucan_db";
//     private $conn;

//     public function ketnoi() {
//         $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
//         if ($this->conn->connect_error) {
//             echo "Kết nối không thành công: " . $this->conn->connect_error;
//             exit();
//         } else {
//             return $this->conn;
//         }
//     }
// } 
include_once('models/mketnoi.php');
>>>>>>> 72d0b56c72a1f1f66374952d16330d26de431460
class MonAnModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllMonAn() {
        $query = "SELECT * FROM monan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function searchMonAn($keyword) {
        $query = "SELECT * FROM monan WHERE tenma LIKE ?";
        $stmt = $this->conn->prepare($query);
        $searchTerm = "%$keyword%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
