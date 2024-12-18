<?php
include_once("mketnoi.php");

class modelLichLamViec {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    
    public function getLichLamViec($mand, $weekOffset = 0) {
        $startOfWeek = new DateTime();
        $startOfWeek->modify('monday this week');
        $startOfWeek->modify("$weekOffset week");
        $startDate = $startOfWeek->format('Y-m-d');
        $endOfWeek = new DateTime($startDate);
        $endOfWeek->modify('+6 days');
        $endDate = $endOfWeek->format('Y-m-d');
    
        $sql = "
            SELECT lichlamviec.ngaylamviec, calam.tenca, lichlamviec.cocalam
            FROM lichlamviec 
            JOIN calam ON lichlamviec.macalam = calam.macalam
            WHERE lichlamviec.mand = '$mand'
            AND lichlamviec.ngaylamviec BETWEEN '$startDate' AND '$endDate'
        ";
        
        $result = $this->conn->query($sql);
        $lichLamViec = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lichLamViec[] = $row;
            }
        }
        return $lichLamViec;
    }

    public function selectNguoiDung($mand) {
        $p = new ketnoi();
        $con = $p->ketnoi();
        if ($con->connect_errno) {
            return false;
        } else {
            $sql = "SELECT mavaitro FROM nguoidung WHERE mand = $mand";
            $kq = mysqli_query($con, $sql);
            
            if ($kq && mysqli_num_rows($kq) > 0) {
                $row = mysqli_fetch_assoc($kq);
                return $row['mavaitro']; 
            } else {
                return null; 
            }
        }
    }
    
    
}
?>
