<?php
include_once("models/mBanGiaoDonHang.php");
class controlDonHang
{

    public function cGetAllOrder()
    {
        $p = new modelDonHang();
        $kq = $p->mGetAllOrder();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            echo "<script>alert('Khong co du lieu!')</script>";
        }
    }

    public function cGetOrderByStatusForKitchen()
    {
        $p = new modelDonHang();
        $kq = $p->mGetOrderByStatusForKitchen();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            echo "<script>alert('Khong co du lieu!')</script>";
        }
    }

    public function cUpdateStatusOrder($madh, $mattdh)
    {
        $o = new modelDonHang();
        $kq = $o->mUpdateStatusOrder($madh, $mattdh);
        return $kq;
    }
    
    public function cGetDishListByOrderId($id)
    {
        $o = new modelDonHang();
        $kq = $o->mGetDishListByOrderId($id);
        if ($row = mysqli_fetch_assoc($kq)) {
            return explode(", ", $row["dishName"]);
        }
        return [];
    }
}
