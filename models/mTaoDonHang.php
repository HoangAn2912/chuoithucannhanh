<?php
require_once 'models/mketnoi.php';
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
