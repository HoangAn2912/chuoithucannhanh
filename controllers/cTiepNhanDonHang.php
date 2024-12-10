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
				return false; 
			} else {
				$sqlCheck = "SELECT mattdh FROM donhang WHERE madh = $madh";
				$result = mysqli_query($con, $sqlCheck);
				
				if ($result) {
					$row = mysqli_fetch_assoc($result);
					$current_mattdh = $row['mattdh'];
					
					if (($current_mattdh == 3 && $mattdh == 2) || ($current_mattdh == 4 && $mattdh == 3)) {
						return false; 
					}
				}
				
				$sqlUpdate = "UPDATE donhang SET mattdh = $mattdh WHERE madh = $madh";
				$kq = mysqli_query($con, $sqlUpdate);
				return $kq; 
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