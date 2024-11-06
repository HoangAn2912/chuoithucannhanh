<?php
    session_start();
    require("layout/navnvbh.php");
    echo '<link rel="stylesheet" href="css/Dk_CaLam/style.css">';
?>
<?php
    include_once("controllers/cCaLam.php");
    if (!isset($_SESSION['selected_shifts'])) {
        $_SESSION['selected_shifts'] = array();
    }

    if (isset($_POST["btn-confirm"])) {
        $date = $_POST["date"];
        $shift = $_POST["shift"];
        if (!empty($date) && !empty($shift)) {
            $_SESSION['selected_shifts'][] = array('date' => $date, 'shift' => $shift, 'role'=>$_SESSION['dangnhap']);
        }
    }

    if (isset($_POST["btn-reset"])) {
        $index = $_POST["btn-reset"];
        if (isset($_SESSION['selected_shifts'][$index])) {
            unset($_SESSION['selected_shifts'][$index]);
        }
    }

    if (isset($_POST["btn-register"])){
        foreach ($_SESSION['selected_shifts'] as $index => $shift) {
            $calam= new  cCaLam();
            $calam->addCaLam($shift['shift'], $shift['date'],$shift['role']);
        }
        echo "<script>alert('Đăng ký ca làm thành công');</script>";
    }
?>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#"><i class="fas fa-cogs"></i> Cài đặt</a>
        <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
    </div>

    <div class="main" style="margin-left: 210px; padding: 20px;">
        <h2>Đăng ký ca làm</h2>
        <div class="choose-calender">
            <h3>CHỌN LỊCH LÀM</h3>
            <form action="" method="post">
                <label>Chọn ngày làm</label>
                <select name="date">
                    <option value="">Chọn ngày</option>
                    <?php
                    function getNextMonday() {
                        $date = new DateTime();
                        $date->modify('next monday');
                        return $date;
                    }

                    $nextMonday = getNextMonday();
                    for ($i = 0; $i < 7; $i++) {
                        $date = clone $nextMonday;
                        $date->modify("+$i days");
                        $formattedDate = $date->format('Y-m-d');
                        echo "<option value=\"$formattedDate\">$formattedDate</option>";
                    }
                    ?>
                </select>

                <label>Chọn ca làm</label>
                <select name="shift">
                    <option value="">Chọn ca</option>
                    <option value="sáng">Sáng</option>
                    <option value="trưa">Trưa</option>
                    <option value="chiều">Chiều</option>
                    <option value="tối">Tối</option>
                </select>
                <button type="submit" name="btn-confirm">Xác nhận</button>
            </form>
        </div>
        <div class="register">
            <h3>DANH SÁCH ĐÃ CHỌN</h3>
            <form action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Ngày đăng ký</th>
                            <th>Ca đăng ký</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($_SESSION['selected_shifts'])) {
                            foreach ($_SESSION['selected_shifts'] as $index => $shift) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($shift['date']) . '</td>';
                                echo '<td>' . htmlspecialchars($shift['shift']) . '</td>';
                                echo '<td>
                                        <button type="submit" name="btn-reset" value="' . $index . '">Hủy</button>
                                      </td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit" name="btn-register" class="btn-register">Đăng ký</button>
            </form>
        </div>
    </div>
</body>
</html>