<?php

    include_once("models/mQuanLyKhachHang.php");
	include_once("mketnoi.php");
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
		
		public function cInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau) {
			$p = new ketnoi();
			$con = $p -> ketnoi();

			$query = "SELECT * FROM khachhang WHERE email = '$email'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) > 0) {
				return false; 
			}
			
			$p = new modelQuanLyKhachHang();
            $kq = $p->mInsertKhachHang($tennd, $ngaysinh, $gioitinh, $sodienthoai, $email, $diachi, $matkhau);
			return $kq;
		}
			
            
		public function cDeleteKhachHang($makh){
			$o=new modelQuanLyKhachHang();
			$kq=$o->mDeleteKhachHang($makh);
			return $kq;
		}
		public function searchKhachHangByName($searchTerm) {
			$p = new ketnoi();
			$con = $p -> ketnoi();
			$searchTerm = mysqli_real_escape_string($con, $searchTerm);  // Tránh SQL Injection
			$sql = "SELECT * FROM khachhang WHERE tennd LIKE '%$searchTerm%'";
			return mysqli_query($con, $sql);  // Trả về kết quả tìm kiếm
		}
    }

	
?>