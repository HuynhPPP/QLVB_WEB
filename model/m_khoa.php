<?php
    // Thao tác dữ liệu trong CSDL
    require_once 'pdo.php';
    function getAllKhoa() {
        return pdo_query("SELECT * FROM khoa");
    }

    function checkKhoa($tenkhoa) {
        return pdo_query("SELECT * FROM khoa WHERE tenkhoa=?", $tenkhoa);
    }

    function check_documentKhoa($tieude) {
        return pdo_query("SELECT * FROM vanban WHERE tieude=?", $tieude);
    }

    function addKhoa($tenkhoa) {
        pdo_execute("INSERT INTO khoa(`tenkhoa`) VALUES(?)",$tenkhoa);
    }

    function getByIdKhoa($Idkhoa) {
        return pdo_query_one("SELECT * FROM khoa WHERE id=?", $Idkhoa);
    }

    function document_addVanBan_Khoa($tieude, $noidung, $loaivb, $khoa, $ngayky, $file) {  
        pdo_execute("INSERT INTO vanban(`tieude`, `noidung`, `loaivanban`, `idkhoa`, `ngaydang`, `file`)
                 VALUES(?,?,?,?,?,?)",$tieude, $noidung, $loaivb, $khoa, $ngayky, $file);
    }

    function editKhoa($tenkhoa, $Idkhoa) {
        pdo_execute("UPDATE khoa SET tenkhoa=? WHERE id=?",  $tenkhoa, $Idkhoa);
    }

    function deleteKhoa($Id) {
        pdo_execute("DELETE FROM Khoa WHERE id=?",$Id);
    }

    function documentKhoa_delete($Id) {
        pdo_execute("DELETE FROM vanban WHERE idvb=?",$Id);
    }

    function search_khoa($keyword){
        return pdo_query("SELECT * FROM khoa WHERE tenkhoa LIKE '%$keyword%'");
    }

    function total_document_chung_khoa($id) {
        $sql = "SELECT COUNT(*) FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id AND";
        if($id > 0) {
            $sql.=" vanban.idkhoa=".$id;
        }
        return pdo_query_value($sql); 
    }

    function getAll_VB_khoa() {
        return pdo_query("SELECT * FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id");
    }

    function get_VB_khoa($id,$page=1) {
        $start = ($page - 1)*6;
        $sql = "SELECT * FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id AND";
        if($id > 0) {
            $sql.=" vanban.idkhoa=".$id;
        }
        $sql.=" ORDER BY vanban.idvb LIMIT $start,6";
        return pdo_query($sql); 
        
    }

    function search_vanban_khoa($keyword,$id) { 
        if($keyword != "" && $id > 0) {
            $sql = "SELECT * FROM vanban, khoa  WHERE vanban.idkhoa = khoa.id AND";
            $sql.=" vanban.idkhoa='".$id."' AND vanban.tieude LIKE '%".$keyword."%'";
            $sql.=" ORDER BY vanban.idvb";
        } if(empty($keyword) && $id > 0) {
            $sql = "SELECT * FROM vanban, khoa  WHERE vanban.idkhoa = khoa.id AND";
            $sql.=" vanban.idkhoa='".$id."' LIMIT 0,0";
        }

        
        $ketqua = pdo_query($sql);
        return $ketqua;
    }


    function get_new_VB_khoa($id) {
        $sql = "SELECT * FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id AND";
        if($id > 0) {
            $sql.=" vanban.idkhoa=".$id;
        }
        $sql.=" ORDER BY ngaydang DESC LIMIT 0,5";
        return pdo_query($sql); 
        
    }

    


    
?>