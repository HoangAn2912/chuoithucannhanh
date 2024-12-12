<?php
include_once("models/mketnoi.php");

class mMonAn {
    private $conn;
    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->ketnoi();
    }
    public function selectMonAn($sql) {
        $monan = array();
        $kq = $this->conn->query($sql);
        if ($kq->num_rows > 0) {
            while ($r = $kq->fetch_assoc()) {
                $monan[] = $r;
            }
            return $monan;
        } else {
            return array();
        }
    }
    public function insertMonAn($sql){
        return  $this->conn->query($sql);
    }
    public function updateMonAn($mama, $name, $loai, $gia, $congthuc){
        $sql = "UPDATE monan 
            SET tenma = ?, maloaima = ?, giaban = ?, dinhluong = ? 
            WHERE mama = ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$name, $loai, $gia, $congthuc, $mama]);
    }

    public function mDeleteMonAn($mama){
        $p = new ketnoi();
        $sql = "DELETE FROM monan WHERE mama = '$mama'";	
        try{
            $con = $p -> ketnoi();
            $kq = mysqli_query($con, $sql);
            return $kq;
        }catch(Exception $e){
            return false;
        }
    }
}
?>