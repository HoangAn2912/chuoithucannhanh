<?php
    include_once("models/mTiepNhanDonHang.php");
	include_once("../models/mketnoi.php");
    class controlDonHang {

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
					
					if (($current_mattdh == 6 && $mattdh == 5)
					|| ($current_mattdh == 6 && $mattdh == 4)
					|| ($current_mattdh == 6 && $mattdh == 3)
					|| ($current_mattdh == 6 && $mattdh == 2)
					|| ($current_mattdh == 6 && $mattdh == 1)
					|| ($current_mattdh == 5 && $mattdh == 4)
					|| ($current_mattdh == 5 && $mattdh == 3)
					|| ($current_mattdh == 5 && $mattdh == 2)
					|| ($current_mattdh == 5 && $mattdh == 1) 
					|| ($current_mattdh == 4 && $mattdh == 3)
					|| ($current_mattdh == 4 && $mattdh == 2)
					|| ($current_mattdh == 4 && $mattdh == 1) 
					|| ($current_mattdh == 3 && $mattdh == 2)
					|| ($current_mattdh == 3 && $mattdh == 1) 
					|| ($current_mattdh == 2 && $mattdh == 1)) {
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
        
    }
?>