<?php
    include_once("models/mTiepNhanDonHang.php");
	include_once("../models/mketnoi.php");
    class controlDonHang {
      
        public function getAllDonHang ($mach){
            $p = new modelDonHang();
			$kq = $p -> selectAllDonHang($mach);
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Không có dữ liệu!')</script>";
			}
        }

		public function mUpdateTinhTrang($madh, $mattdh){
			$p = new ketnoi();
			$con = $p->ketnoi();
			
			if ($con->connect_errno) {
				return false; // Trả về false nếu có lỗi kết nối
			} else {
				// Bước 1: Kiểm tra giá trị hiện tại của mattdh cho madh
				$sqlCheck = "SELECT mattdh FROM donhang WHERE madh = $madh";
				$result = mysqli_query($con, $sqlCheck);
				
				if ($result) {
					$row = mysqli_fetch_assoc($result);
					
					// Bước 2: Nếu mattdh hiện tại là 3 hoặc lớn hơn 3, không cho phép cập nhật
					if ($row['mattdh'] >= 3) {
						return false; // Trả về false để chỉ ra rằng không thể cập nhật
					}
				}
		
				// Bước 3: Tiến hành cập nhật nếu điều kiện không bị chặn
				$sqlUpdate = "UPDATE donhang SET mattdh = $mattdh WHERE madh = $madh";
				$kq = mysqli_query($con, $sqlUpdate);
				return $kq; // Trả về kết quả của câu lệnh UPDATE
			}
		}
		

        public function cUpdateTinhTrang($madh, $mattdh){
			var_dump($madh, $mattdh);
			$p = new controlDonHang();
			return $p -> mUpdateTinhTrang($madh,$mattdh);
		}

		public function getTinhTrangOptions() {
			$p = new modelDonHang();
			return $p->selectTinhTrangOptions();
		}
        
    }
?>