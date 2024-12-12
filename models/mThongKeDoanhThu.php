<?php
include_once("mketnoi.php");
class mThongKe
{ 
    public function mGetAllOrderCompleteByStore($storeID)
    {
        $p = new ketnoi();
        $conn = $p->ketnoi();
        $sql = "SELECT *, GROUP_CONCAT(CONCAT(MA.tenma, ' (x', CTDH.soluong, ')') SEPARATOR ', ') AS dishName
            FROM donhang AS DH JOIN chitietdonhang AS CTDH ON DH.madh = CTDH.madh JOIN monan AS MA ON CTDH.mama = MA.mama 
            JOIN tinhtrangdonhang AS TTDH ON TTDH.mattdh = DH.mattdh WHERE DH.mattdh IN (5) AND DH.mach = $storeID GROUP BY CTDH.madh";
        if ($conn->query($sql)->num_rows > 0) {
            return $conn->query($sql);
        } else 
            return false;
    }
}
?>