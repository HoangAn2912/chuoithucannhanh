<?php
include_once("mketnoi.php");
class modelDonHang
{

    public function mGetAllOrder()
    {
        $p = new ketnoi();
        $con = $p->ketnoi();
        if ($con->connect_errno) {
            return false;
        } else {
            $sql = "SELECT *, GROUP_CONCAT(CONCAT(MA.tenma, ' (x', CTDH.soluong, ')') SEPARATOR ', ') AS dishName
                FROM donhang AS DH JOIN chitietdonhang AS CTDH ON DH.madh = CTDH.madh JOIN monan AS MA ON CTDH.mama = MA.mama JOIN tinhtrangdonhang AS TTDH ON TTDH.mattdh = DH.mattdh GROUP BY CTDH.madh";
            $kq = mysqli_query($con, $sql);
            return $kq;
        }
    }

    public function mGetOrderByStatusForKitchen()
    {
        $p = new ketnoi();
        $con = $p->ketnoi();
        if ($con->connect_errno) {
            return false;
        } else {
            $sql = "SELECT *, GROUP_CONCAT(CONCAT(MA.tenma, ' (x', CTDH.soluong, ')') SEPARATOR ', ') AS dishName
                    FROM donhang AS DH JOIN chitietdonhang AS CTDH ON DH.madh = CTDH.madh 
                    JOIN monan AS MA ON CTDH.mama = MA.mama 
                    JOIN tinhtrangdonhang AS TTDH ON TTDH.mattdh = DH.mattdh 
                    WHERE DH.mattdh IN (2, 3, 4) GROUP BY CTDH.madh";
            $kq = mysqli_query($con, $sql);
            return $kq;
        }
    }

    public function mUpdateStatusOrder($madh, $mattdh)
    {
        $p = new ketnoi();
        $con = $p->ketnoi();
        $sql = "UPDATE donhang SET mattdh = $mattdh WHERE madh = $madh";
        $kq = mysqli_query($con, $sql);
        return $kq;
    }
    
    public function mGetDishListByOrderId($id) {
        $p = new ketnoi();
        $con = $p->ketnoi();
        $sql = "SELECT GROUP_CONCAT(CONCAT(MA.tenma) SEPARATOR ', ') AS dishName FROM donhang AS DH JOIN chitietdonhang AS CTDH ON DH.madh = CTDH.madh JOIN monan AS MA ON CTDH.mama = MA.mama WHERE CTDH.madh = $id GROUP BY CTDH.madh";
        $kq = mysqli_query($con, $sql);
            
        return $kq;
    }
    
}
