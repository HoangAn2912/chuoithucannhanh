<?php

    include_once("models/mQuanLyKhachHang.php");
	
    class controlQuanLyKhachHang {
      
        public function getAllKhachHang (){
            $p = new modelQuanLyKhachHang();
			$kq = $p -> selectAllKhachHang();
            if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
        }

        public function getAllKhachHangTheoTen($tennd){
			$p = new modelQuanLyKhachHang();
			$kq = $p -> selectAllKhachHangTheoTen($tennd);
			if(mysqli_num_rows($kq) > 0){
				return $kq;
			}else{
				echo "<script>alert('Khong co du lieu!')</script>";
			}
		}
		public function getMotKhachHang($makh) {
			$p = new modelQuanLyKhachHang();
			$kq = $p->selectMotKhachHang($makh);
			header('Content-Type: application/json');
			if ($kq && $kq->num_rows > 0) {
				$data = $kq->fetch_assoc();  // Lấy dữ liệu khách hàng
				echo json_encode(['status' => 'success', 'data' => $data]);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu!']);
			}
		}
		
		
		public function cUpdateKhachHang($makh, $tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau){
				$p = new modelQuanLyKhachHang();
				$kq = $p->mUpdateKhachHang($makh, $tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau);
				return $kq;

				
			}
		
            public function cInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau){
                $p = new modelQuanLyKhachHang();
                $kq = $p->mInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau);
                return $kq;
            }
            
		public function cDeleteKhachHang($makh){
			$o=new modelQuanLyKhachHang();
			$kq=$o->mDeleteKhachHang($makh);
			return $kq;
		}
    }
?>