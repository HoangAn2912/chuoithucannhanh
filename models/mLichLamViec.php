<?php
    include_once("mketnoi.php");
    class modelLichLamViec {
        public function selectLichLamViec($mand) {
            if (!$mand) {
                echo "Mã nhân viên không hợp lệ!";
                return false;
            }

            $p = new ketnoi();
            $con = $p->ketnoi();

            if ($con->connect_errno) {
                echo "Lỗi kết nối: " . $con->connect_error;
                return false;
            }

            // Lấy ngày bắt đầu tuần hiện tại (Thứ 2)
            $startOfWeek = date('Y-m-d', strtotime('monday this week'));
            // Lấy ngày kết thúc tuần hiện tại (Chủ Nhật)
            $endOfWeek = date('Y-m-d', strtotime('sunday this week'));

            // Câu lệnh SQL lấy lịch làm việc của nhân viên trong tuần này
            $sql = "SELECT * FROM lichlamviec WHERE mand = $mand AND ngaylamviec BETWEEN '$startOfWeek' AND '$endOfWeek' ORDER BY ngaylamviec ASC";
            $kq = mysqli_query($con, $sql);

            if (!$kq) {
                echo "Lỗi truy vấn SQL: " . mysqli_error($con);
                return false;
            }

            return $kq;
        }
    }
?>
