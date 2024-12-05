<!-- Sidebar -->
<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
    include_once ('controllers/cNguoiDung.php');
    $nguoidung = new cNguoiDung();
    if(isset($_SESSION['dangnhap'])){
        $taikhoan = $nguoidung->getNguoiDungByID($_SESSION["dangnhap"]);
        $role = $taikhoan[0]['mavaitro'];
        if($role == 4){
            require("layout/navnvb.php");
        }elseif($role == 3){
            require("layout/navnvbh.php");
        }elseif($role == 2){
            require("layout/navqlch.php");
        }elseif($role == 1){
            require("layout/navqlchuoi.php");
        }
    }
?>
<div class="sidebar">
        <a href="#"><i class="fas fa-cogs"></i> Cài đặt</a>
        <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
    </div>

    <div style="margin-left: 210px; padding: 20px;">
        <h2>Nội dung chính</h2>
        <p>Đây là nơi nội dung của trang sẽ xuất hiện...</p>
        <p>thu nghiem
        </p>
    </div>

</body>
</html>
