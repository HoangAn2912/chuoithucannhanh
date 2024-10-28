<!-- Sidebar -->
<?php
    if($_SESSION["dangnhap"] == 'nvb'){
        require("layout/navnvb.php");
    }else{
        require("layout/navqlchuoi.php");
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
