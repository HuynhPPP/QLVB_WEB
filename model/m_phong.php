<?php
    // Thao tác dữ liệu trong CSDL
    require_once 'pdo.php';
    function getAllPhong() {
        return pdo_query("SELECT * FROM phong");
    }

    function checkPhong($tenphong) {
        return pdo_query("SELECT * FROM phong WHERE tenphong=?", $tenphong);
    }

    function addPhong($tenphong) {
        pdo_execute("INSERT INTO phong(`tenphong`) VALUES(?)",$tenphong);
    }

    function getByIdPhong($Idphong) {
        return pdo_query_one("SELECT * FROM phong WHERE id=?", $Idphong);
    }

    function editPhong($tenphong, $Idphong) {
        pdo_execute("UPDATE phong SET tenphong=? WHERE id=?",  $tenphong, $Idphong);
    }

    function deletePhong($Id) {
        pdo_execute("DELETE FROM phong WHERE id=?",$Id);
    }

    function document_deleteVB_chung($id) {
        pdo_execute("DELETE FROM vanban_chung WHERE idvb_chung=?",$id);
    }

    function search_phong($keyword){
        return pdo_query("SELECT * FROM phong WHERE tenphong LIKE '%$keyword%'");
    }

    function getByIdvb_chung($Idvb) {
        return pdo_query_one("SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.id_loaivanban = loaivanban.id AND vanban_chung.idphong = phong.id  AND idvb_chung=?", $Idvb);
    }

    function getAll_VB_chung() {
        return pdo_query("SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.idphong = phong.id AND vanban_chung.id_loaivanban = loaivanban.id ORDER BY vanban_chung.idvb_chung");
    }


    function getAllVanBan_chung($page=1) {
        $start = ($page - 1)*8;
       // 1 trang hiện 5 văn bản
       // trang 1 bắt đầu từ 0 1 2 3 4 5
       // trang 2 bắt đầu từ 5
       // trang 3 bắt đầu từ
        return pdo_query("SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.idphong = phong.id AND vanban_chung.id_loaivanban = loaivanban.id ORDER BY vanban_chung.idvb_chung LIMIT $start,8");
       
    }

    function total_document_chung() {
        return pdo_query_value("SELECT COUNT(*) FROM vanban_chung");
    }

    function total_document_chung_phong($id) {
        $sql = "SELECT COUNT(*) FROM vanban_chung, loaivanban, phong WHERE vanban_chung.id_loaivanban = loaivanban.id AND vanban_chung.idphong = phong.id AND";
        if($id > 0) {
            $sql.=" vanban_chung.idphong=".$id;
        }
        return pdo_query_value($sql); 
    }
   

    function get_VB_phong($id,$page=1) {
        $start = ($page - 1)*6;
        $sql = "SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.id_loaivanban = loaivanban.id AND vanban_chung.idphong = phong.id AND";
            if($id > 0) {
                $sql.=" vanban_chung.idphong=".$id;
            }
        $sql.=" ORDER BY vanban_chung.idvb_chung LIMIT $start,6";
        return pdo_query($sql); 

    }

    function get_new_VB_phong($id) {
        $sql = "SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.id_loaivanban = loaivanban.id AND vanban_chung.idphong = phong.id AND";
            if($id > 0) {
                $sql.=" vanban_chung.idphong=".$id;
            }
        $sql.=" ORDER BY ngaydang DESC LIMIT 0,5";
        return pdo_query($sql); 
        
    }

    function loadone_vanban_chung($id) {
        $sql = "SELECT * FROM vanban_chung WHERE idvb_chung=".$id;
        $vanban_chung = pdo_query_one($sql);
        return $vanban_chung;
    }

    function addVanBan_chung($tieude, $noidung, $loaivb, $phong, $ngayky, $file) {  
        pdo_execute("INSERT INTO vanban_chung(`tenvanban`, `noidung`, `id_loaivanban`, `idphong`, `ngaydang`, `file`)
                 VALUES(?,?,?,?,?,?)",$tieude, $noidung, $loaivb, $phong, $ngayky, $file);
    

    }

    function editVanBan_chung($tieude, $noidung, $loaivb, $phong, $ngayky, $file, $Idvb_chung) {
        if($file != "") {
            pdo_execute("UPDATE vanban_chung SET tenvanban=?, noidung=?, id_loaivanban=?, idphong=?, ngaydang=?, file=? WHERE idvb_chung=?",  $tieude, $noidung, $loaivb, $phong, $ngayky, $file, $Idvb_chung);    
        }else{
            pdo_execute("UPDATE vanban_chung SET tenvanban=?, noidung=?, id_loaivanban=?, idphong=?, ngaydang=?  WHERE idvb_chung=?",  $tieude, $noidung, $loaivb, $phong, $ngayky, $Idvb_chung);    
        }           
    }

    function search_document_chung($keyword='', $loaivanban=0, $phong=0, $date='') {
       
        $sql = "SELECT * FROM vanban_chung, loaivanban, phong WHERE vanban_chung.id_loaivanban = loaivanban.id AND vanban_chung.idphong = phong.id AND";
        if($keyword != "") {
            $sql.=" vanban_chung.tenvanban LIKE '%".$keyword."%'";
        }

        if($loaivanban > 0) {
            $sql.=" vanban_chung.id_loaivanban = '".$loaivanban."'";
        }

        if($phong > 0) {
            $sql.=" vanban_chung.idphong = '".$phong."'";
        }


        if($date != "") {
            $sql.=" vanban_chung.ngaydang = '".$date."'";
        }
        $sql.=" ORDER BY vanban_chung.idvb_chung";
        $ketqua = pdo_query($sql);
        return $ketqua;
    }

    function search_vanban_phong($keyword,$id) {
        if($keyword != "" && $id > 0) {
            $sql = "SELECT * FROM vanban_chung, phong  WHERE vanban_chung.idphong = phong.id AND";
            $sql.=" vanban_chung.idphong='".$id."' AND vanban_chung.tenvanban LIKE '%".$keyword."%'";
            $sql.=" ORDER BY vanban_chung.idvb_chung";
        } if(empty($keyword) && $id > 0) {
            $sql = "SELECT * FROM vanban_chung, phong  WHERE vanban_chung.idphong = phong.id AND";
            $sql.=" vanban_chung.idphong='".$id."' LIMIT 0,0";
        }
        $ketqua = pdo_query($sql);
        return $ketqua;

    }

    function list_document_newest() {
        $sql = "SELECT * FROM vanban_chung ORDER BY ngaydang DESC LIMIT 0,6"; 
        return pdo_query($sql); 
        
    }

?>