<?php
include_once("models/mketnoi.php");
class mEmployeeModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllEmployees() {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, nguoidung.sodienthoai, nguoidung.email, nguoidung.diachi, vaitro.tenvaitro 
                FROM nguoidung 
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro";
        $result = $this->conn->query($sql);
        $employees = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        return $employees;
    }
}
?>
