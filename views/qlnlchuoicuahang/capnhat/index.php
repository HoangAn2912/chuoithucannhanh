<!-- Sidebar -->
<?php
if(!isset($_SESSION['dangnhap'])){
    header("Refresh: 0; url=index.php?page=dangnhap");
}
    echo '<link rel="stylesheet" href="css/QLNL/ql.css">';
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="js/js_quanlynguyenlieu/quanlynguyenlieu.js?v=1.0"></script>';
    require_once('layout/navqlchuoi.php');
    include_once('views/qlnlchuoicuahang/themnl.php');
    include_once("views/qlnlchuoicuahang/capnhat/edit.php");
?>
    <div class="sidebar">
        <form action=""  method="post">
            <button class="add" name="add">Thêm mới</button>
            <button class="update" name="update">Cập nhật</button>
        </form>
    </div>
    <div style="margin-left: 210px; padding: 20px;" class="content">
        <h4 style="color: #db5a04">DANH SÁCH NGUYÊN LIỆU</h4>
        <div class="table-material">
            <form action="" method="post" class="table-wrapper">
                <table>
                    <thead>
                        <th>Mã NL</th>
                        <th>Hình ảnh</th>
                        <th>Tên Nguyên Liệu</th>
                        <th>Đơn vị tính</th>
                        <th>Đơn giá (VND)</th>
                        <th>Tùy Chọn</th>
                    </thead>
                    <tbody>
                        <?php
                            include_once("controllers/cNguyenLieu.php");
                            $nguyenlieu = new cNguyenLieu ();
                            $DSNguyelieu=$nguyenlieu->getNguyenLieu();
                            echo '<tr>';
                            if($DSNguyelieu){
                                foreach($DSNguyelieu as $i){
                                    if ($i['trangthai'] !== 'Đã xóa') {
                                        echo '<td>'.$i['manl'].'</td>';
                                        echo '<td><img src="image/'.$i['hinh'].'" width="50" height="50"></td>';
                                        echo '<td>'.$i['tennl'].'</td>';
                                        echo '<td>'.$i['donvitinh'].'</td>';
                                        echo '<td>'.$i['dongia'].'</td>';
                                        echo '<td>';
                                        echo '<div class="dropdown">';
                                            echo '<span>Tùy chọn <i class="fas fa-caret-down"></i></span>';
                                            echo '<div class="dropdown-menu" style ="width: 50px;">';
                                                echo '<button class="delete" type="button" onclick="showDeleteModal(\''.$i['manl'].'\')" >xóa</button>';
                                                echo '<button class="edit" name="edit" value ="'.$i['manl'].'">sửa</button></li>';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                            }
                            }

                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
<div id="confirmDelete" class="modal" style="display: none;">
    <form action="" method="post" id="deleteForm">
        <div class="modal-content">
            <h4>Xác nhận xóa nguyên liệu</h4>
            <p>Bạn có chắc muốn xóa nguyên liệu này?</p>
            <input type="hidden" name="manl" id="manlToDelete">
            <button type="submit" name="confirm">Có</button>
            <button type="button" onclick="closeModal()">Không</button>
        </div>
    </form>
</div>

<script>
    function showDeleteModal(manl) {
        document.getElementById('manlToDelete').value = manl;
        document.getElementById('confirmDelete').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('confirmDelete').style.display = 'none';
    }

    // Đóng model khi click ra bên ngoài
    window.onclick = function(event) {
        const modal = document.getElementById('confirmDelete');
        if (event.target === modal) {
            closeModal();
        }
    }

    document.querySelectorAll('.sidebar button').forEach(button => {
        button.onclick = function(e) {
            e.preventDefault();
        }
    });
</script>
<?php
    if (isset($_POST["confirm"]) && isset($_POST["manl"])) {
        $manl = $_POST["manl"];
        include_once("controllers/cNguyenLieu.php");
        $nguyenlieu = new cNguyenLieu();

        if ($nguyenlieu->updateTinhTrangNguyenLieu($manl, "Đã xóa")) {
            echo "<script>
                window.location.href = 'index.php?page=qlnlchuoicuahang/capnhat';
            </script>";
        }
    }
?>

