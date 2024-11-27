<?php
    if (!isset($_SESSION['calamdk'])) {
        $_SESSION['calamdk'] = array();
    }

    if (isset($_POST["btn-confirm"])) {
        $ngaylam = $_POST["ngaylam"];
        $ca = $_POST["ca"];
        if (!empty($ngaylam) && !empty($ca)) {
            // Kiểm tra ca làm đã chọn trước đó
            $isDuplicate = false;
            foreach ($_SESSION['calamdk'] as $shift) {
                if ($shift['ngaylam'] == $ngaylam && $shift['ca'] == $ca) {
                    $isDuplicate = true;
                    break;
                }
            }
            if (!$isDuplicate) {
                $_SESSION['calamdk'][] = array('ngaylam' => $ngaylam, 'ca' => $ca, 'role' => $_SESSION['dangnhap']);
            }
        }
    }

    if (isset($_POST["btn-reset"])) {
        $index = $_POST["btn-reset"];
        if (isset($_SESSION['calamdk'][$index])) {
            unset($_SESSION['calamdk'][$index]);
            $_SESSION['calamdk'] = array_values($_SESSION['calamdk']);
        }
    }

    if (isset($_POST["btn-register"])) {
        $calam = new cCaLamDangKy();
        foreach ($_SESSION['calamdk'] as $shift) {
            $calam->addCaLamDangky($shift['ca'], $shift['ngaylam'], $shift['role']);
        }
        $_SESSION['calamdk'] = array();
        echo "<script>alert('Đăng ký ca làm thành công');</script>";
    }
    $calam = new cCaLam();
    $ds_calam = $calam->getCaLam();
?>