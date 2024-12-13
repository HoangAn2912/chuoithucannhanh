<?php
include_once("mketnoi.php");

class modelPhanCongCaLam {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    
    public function getLichLamViec($weekOffset = 1) {
        $startOfWeek = new DateTime();
        $startOfWeek->modify('monday this week');
        $startOfWeek->modify("$weekOffset week");
        $startDate = $startOfWeek->format('Y-m-d');
        $endOfWeek = new DateTime($startDate);
        $endOfWeek->modify('+6 days');
        $endDate = $endOfWeek->format('Y-m-d');
    
        $sql = "SELECT 
            lichlamviec.ngaylamviec, 
            calam.tenca, 
            nguoidung.tennd,
            vaitro.tenvaitro
        FROM 
            lichlamviec 
        JOIN 
            calam ON lichlamviec.macalam = calam.macalam
        JOIN 
            nguoidung ON lichlamviec.mand = nguoidung.mand
        JOIN 
            vaitro ON nguoidung.mavaitro = vaitro.mavaitro
        WHERE 
            lichlamviec.ngaylamviec BETWEEN '$startDate' AND '$endDate'";

        
        $result = $this->conn->query($sql);
        $lichLamViec = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lichLamViec[] = $row;
            }
        }
        return $lichLamViec;
    }

    public function selectNguoidung($ngaydangky, $macalam) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, calam.tenca, vaitro.tenvaitro
                FROM lichlamviec 
                JOIN nguoidung ON lichlamviec.mand = nguoidung.mand
                JOIN calam ON lichlamviec.macalam = calam.macalam
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE lichlamviec.ngaylamviec = '$ngaydangky' AND calam.tenca = N'$macalam'";
        $result = $this->conn->query($sql);
        $registeredEmployees = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registeredEmployees[] = $row;
            }
        }
        return $registeredEmployees;

        
    }

    public function getAllEligibleEmployees() {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, vaitro.tenvaitro
                FROM nguoidung
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE vaitro.tenvaitro IN ('Nhân viên bán hàng', 'Nhân viên bếp')";
        $result = $this->conn->query($sql);
    
        $eligibleEmployees = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $eligibleEmployees[] = $row;
            }
        }
        return $eligibleEmployees;
    }


    public function getNhanVienTheoVaiTroVaMach($mach) {
        $sql = "SELECT nguoidung.mand, nguoidung.tennd, vaitro.tenvaitro
                FROM nguoidung
                JOIN vaitro ON nguoidung.mavaitro = vaitro.mavaitro
                WHERE nguoidung.mach = '$mach' AND 
                      (vaitro.tenvaitro = 'Nhân viên bán hàng' OR vaitro.tenvaitro = 'Nhân viên bếp')";
    
        $result = $this->conn->query($sql);
        $employees = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        return $employees;
    }

    public function assignShift($ngaydangky, $tenca, $mand) {
        $sql = "INSERT INTO lichlamviec (ngaylamviec, macalam, mand)
                SELECT '$ngaydangky', c.macalam, '$mand'
                FROM calam c
                WHERE c.tenca = '$tenca'
                LIMIT 1";
       
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false; 
        }
    }
    
}
?>
