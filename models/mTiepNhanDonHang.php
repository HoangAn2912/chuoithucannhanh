<?php
    include_once("mketnoi.php");
    class modelDonHang {
       
        public function selectAllDonHang (){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "SELECT s.*, t.soluong, t.giamgia, t.dongia 
                FROM donhang s 
                LEFT JOIN chitietdonhang t ON s.madh = t.madh
                ORDER BY s.ngaydat DESC;  -- Lấy các đơn hàng theo thứ tự mới nhất
                ";
				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function mUpdateTinhTrang($madh,$mattdh){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            $sql = "Update donhang set mattdh = $mattdh where madh = $madh";	
            $kq = mysqli_query($con, $sql);
            return $kq;
        }
    }
?>