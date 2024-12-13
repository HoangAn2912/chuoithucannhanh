<?php
    include_once("mketnoi.php");
    class modelDonHang {
       
        public function selectAllDonHang ($mach){
            $p = new ketnoi();
			$con = $p -> ketnoi();
            if($con -> connect_errno){
				return false;
			}else{
                $sql = "SELECT s.madh, s.ngaydat, m.tenma, t.soluong, t.dongia, t.giamgia, m.hinhanh,
                    (t.soluong * t.dongia - t.giamgia) AS tongtien,
                    tt.tenttdh AS tinhtrang
                FROM donhang s
                LEFT JOIN chitietdonhang t ON s.madh = t.madh
                LEFT JOIN monan m ON t.mama = m.mama  
                LEFT JOIN tinhtrangdonhang tt ON s.mattdh = tt.mattdh  
                WHERE s.mattdh IN (2,3) AND s.mach =$mach
                ORDER BY s.ngaydat DESC     
                LIMIT 0, 25;

        ";


				$kq = mysqli_query($con, $sql);
				return $kq;
			}
        }

        public function selectTinhTrangOptions() {
            $p = new ketnoi();
            $con = $p->ketnoi();
            if ($con->connect_errno) {
                return false;
            } else {
                $sql = "SELECT mattdh, tenttdh FROM tinhtrangdonhang WHERE mattdh IN (2, 3, 4)";
                $kq = mysqli_query($con, $sql);
                return $kq;
            }
        }
        

    }
?>