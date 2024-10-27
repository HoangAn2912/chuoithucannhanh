<?php
    echo '<script>alert("Vui lòng xác nhận đăng xuất")</script>';
    session_destroy();
    header('refresh: 0.5; url= index.php?page=dangnhap');
    exit();
?>