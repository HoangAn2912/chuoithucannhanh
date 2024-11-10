<?php
include_once("models/mCaLam.php");

class cCaLam {
    
    public function getCaLam() {
        $sql = "SELECT * FROM calam";
        $calam = new mCaLam();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }

    public function getCaLamByID($id) {
        $sql = "SELECT * FROM calam where macalam = '$id'";
        $calam = new mCaLam();
        $danhsachcalam=$calam->selectCaLam($sql);
        return $danhsachcalam;
    }
}

?>