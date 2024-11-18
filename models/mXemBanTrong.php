<?php
include_once("mketnoi.php");

class modelBan {
    // Phương thức lấy tất cả bàn
    public function selectAllBan ($mach) {
        $p = new ketnoi();
        $con = $p->ketnoi();
        if ($con->connect_errno) {
            return false;
        } else {
            $sql = "SELECT * FROM ban WHERE mach = $mach";
            $kq = mysqli_query($con, $sql);
            return $kq;
        }
    }

    // Phương thức cập nhật trạng thái bàn
    public function updateTrangThaiBan($maban, $trangthai) {
        $p = new ketnoi();
        $con = $p->ketnoi();
        if ($con->connect_errno) {
            error_log("Connection error: " . $con->connect_error);
            return false;
        } else {
            // Cập nhật trạng thái bàn với prepared statement
            $sql = "UPDATE ban SET trangthai = ? WHERE maban = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("si", $trangthai, $maban);  // "s" for string, "i" for integer
            $result = $stmt->execute();

            if ($result) {
                return true;
            } else {
                error_log("SQL error: " . $stmt->error);
                return false;
            }
        }
    }
    
    }
    
    
    // public function updateTableStatus($maban) {
    //     $p = new ketnoi();
    //     $con = $p->ketnoi();
    //     if ($con->connect_errno) {
    //         return false;
    //     } else {
    //         // Cập nhật trạng thái bàn thành "Đã đặt"
    //         $sql = "UPDATE ban SET trangthai = 'Đã đặt' WHERE maban = $maban";
            
    //         $kq = mysqli_query($con, $sql);

    //         return $kq;
    //     }
    // }

?>
