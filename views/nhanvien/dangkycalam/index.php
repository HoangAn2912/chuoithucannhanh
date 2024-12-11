<?php
    if(!isset($_SESSION['dangnhap'])){
        header("Refresh: 0; url=index.php?page=dangnhap");
    }
    if(!isset($_SESSION['dangnhap'])){
        header("Refresh: 0; url=index.php?page=dangnhap");
    }
    if (!isset($_SESSION['mavaitro']) || ($_SESSION['mavaitro'] != 3 && $_SESSION['mavaitro'] != 4)) {
        header("Refresh: 0; url=index.php"); 
        exit();
    }
    $nguoidung = new cNguoiDung();
    $nhanvien=$nguoidung->getNguoiDungById($_SESSION['dangnhap']);
    if($nhanvien[0]['mavaitro']==3){
        require("layout/navnvbh.php");
    }elseif ($nhanvien[0]['mavaitro']==4) {
        require("layout/navnvb.php");
    }
    echo '<link rel="stylesheet" href="css/Dk_CaLam/calam.css">';
    echo '<script src="js/js_dangkycalam/dangkycalam.js"></script>';
    include_once("controllers/cCaLamDangKy.php");
    include_once("controllers/cCaLam.php");
    include_once("controllers/cNguoiDung.php");
    include_once("views/nhanvien/dangkycalam/vdangkycalam.php");
?>
<div style="padding: 20px;">
    <h1 style="color: #db5a04; display: flex; justify-content: center; align-items: center; ">ĐĂNG KÝ CA LÀM</h1>
    <div class="shift">
        <div class="timetable-container">
            <h4>LỊCH ĐĂNG KÝ</h4>
            <form action="" method="post">
                <table class="timetable">
                    <thead>
                        <tr>
                            <th>Ca\Ngày</th>
                            <?php
                                $nextMonday = new DateTime();
                                $nextMonday->modify('next monday');
                                for ($i = 0; $i < 7; $i++) {
                                    $ngay = clone $nextMonday;
                                    $ngay->modify("+$i days");
                                    echo "<th>" . $ngay->format('d/m/Y'). "</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($ds_calam as $ca) {
                                echo '<tr>';
                                echo '<td>' . $ca["tenca"] . '</td>';
                                for ($i = 0; $i < 7; $i++) {
                                    $ngaydk = clone $nextMonday;
                                    $ngaydk->modify("+$i days");
                                    $ngaydk = $ngaydk->format('Y-m-d');
                                    $isRegistered = false;
                                    $dem = 0;
                                    $ca_max=0;
                                    $nv = new cNguoiDung();
                                    $tt=$nv->getNguoiDungById($_SESSION['dangnhap']);
                                    if($tt[0]['mavaitro']==3){
                                        $ca_max+= 3;
                                    }elseif ($tt[0]['mavaitro']==4) {
                                        $ca_max += 2;
                                    }
                                    $calamdk = new cCaLamDangKy();
                                    $ds_calamdk = $calamdk->getCaLamDangKyByCuaHang($_SESSION["mach"], $tt[0]['mavaitro']);
                                    $ds_calamdkbyid = $calamdk -> getCaLamDangKyByMand($_SESSION['dangnhap']);
                                    foreach ($ds_calamdk as $k) {
                                        if ($k['ngaylamviec'] == $ngaydk && $k['macalam'] == $ca['macalam']) {
                                            $dem++;
                                        }
                                    }
                                    foreach ($ds_calamdkbyid as $j) {
                                        if ($j['ngaylamviec'] == $ngaydk && $j['macalam'] == $ca['macalam']) {
                                            $isRegistered = true;
                                            break;
                                        }
                                    }
                                    // Xác định lớp CSS và vô hiệu hóa nếu đạt giới hạn
                                    $cssClass = '';
                                    $onClick = '';
                                    if ($isRegistered) {
                                        $cssClass = 'registered'; // Nếu đã đăng ký, hiển thị màu xanh
                                    } elseif ($dem == $ca_max) {
                                        $cssClass = 'full'; // Nếu đã đạt tối đa số ca, không thể đăng ký
                                    } else {
                                        $onClick = 'onclick="submitShift(\'' . $ngaydk . '\', \'' . $ca['macalam'] . '\')"';
                                        if (!empty($_SESSION['calamdk'])) {
                                            foreach ($_SESSION['calamdk'] as $shift) {
                                                if ($shift['ngaylam'] == $ngaydk && $shift['ca'] == $ca['macalam']) {
                                                    $cssClass = 'selected'; // Nếu đã chọn ca, hiển thị màu cam
                                                    break;
                                                }
                                            }
                                        }
                                    }
                            
                                    echo '<td class="shift-cell ' . $cssClass . '" ' . $onClick . '>';
                                    echo ($dem == $ca_max ? 'Full<br>' : 'Chọn<br>') . "($dem/$ca_max)";
                                    echo '</td>';
                                }
                                echo '</tr>';
                            }
                                                
                        ?>
                    </tbody>
                </table>
                <input type="hidden" name="ngaylam" id="selected_date">
                <input type="hidden" name="ca" id="selected_shift">
                <button type="submit"  name="btn-confirm" id="btn_confirm" class="btn-confirm" style ="display: none"> xác nhận
            </form>
        </div>
    </div>

    <div class="register-list">
        <h4>DANH SÁCH ĐÃ CHỌN</h4>
        <form action="" method="post">
            <table>
                <thead style ="background-color: orange;">
                    <tr>
                        <th>Ngày đăng ký</th>
                        <th>Ca đăng ký</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (!empty($_SESSION['calamdk'])) {
                            foreach ($_SESSION['calamdk'] as $i => $shift) {
                                $caInfo = array_filter($ds_calam, function($ca) use ($shift) {
                                    return $ca['macalam'] == $shift['ca'];
                                });
                                $caInfo = reset($caInfo);
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($shift['ngaylam']) . '</td>';
                                echo '<td>' . htmlspecialchars($caInfo['tenca']) . '</td>';
                                echo '<td><button type="submit" name="btn-reset" value="'.$i.'" class="btn-reset" onclick="saveScrollPosition()">Hủy</button></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3" style="text-align: center;">Chưa có ca làm nào được chọn</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
            <?php
                if (!empty($_SESSION['calamdk'])){
                    echo '<button type="submit" name="btn-register" class="btn-register">Đăng ký</button>';
                }
            ?>
        </form>
    </div>
</div>
</body>
</html>

