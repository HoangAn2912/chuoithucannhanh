<!-- Sidebar -->
<?php
    echo '<link rel="stylesheet" href="css/QLNL/style.css">';
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
                                    echo '<td>'.$i['manl'].'</td>';
                                    echo '<td><img src="image/'.$i['hinh'].'" width="50" height="50"></td>';
                                    echo '<td>'.$i['tennl'].'</td>';
                                    echo '<td>'.$i['donvitinh'].'</td>';
                                    echo '<td>'.$i['dongia'].'</td>';
                                    echo '<td>';
                                    echo '<div class="dropdown">';
                                        echo '<span>Tùy chọn <i class="fas fa-caret-down"></i></span>';
                                        echo '<div class="dropdown-menu" style ="width: 50px;">';
                                            echo '<button class="delete" name="delete" onclick="return confirm(\'Ban co chac muon xoa sp nay khong?\')" type="submit">xóa</button></li><br>';
                                            echo '<button class="edit" name="edit" value ="'.$i['manl'].'">sửa</button></li>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
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

