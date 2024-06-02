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

    function  document_addVanBan_Khoa($tieude, $noidung, $loaivb, $khoa, $ngayky, $file) {  
        
        pdo_execute("INSERT INTO vanban(`tieude`, `noidung`, `loaivanban`, `idkhoa`, `ngaydang`, `file`)
                     VALUES(?,?,?,?,?,?)",$tieude, $noidung, $loaivb, $khoa, $ngayky, $file);
    }
    

    function edit_vbkhoa($tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $id) {
        if ($file != "") {
            pdo_execute("UPDATE vanban SET tieude=?, noidung=?, loaivanban=?, idkhoa=?, ngaydang=?, file=? WHERE idvb=?",  $tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $id);    
        } else {
            pdo_execute("UPDATE vanban SET tieude=?, noidung=?, loaivanban=?, idkhoa=?, ngaydang=?, file=? WHERE idvb=?",  $tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $id);    
        }           
    }

    function edit_Khoa($id_khoa, $text, $column_name) {
        pdo_execute("UPDATE khoa SET $column_name='$text' WHERE id ='$id_khoa'");
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
        return pdo_query("SELECT vanban.*, loaivanban.*, khoa.*, DATE_FORMAT(vanban.ngaydang, '%d-%m-%Y') AS formatted_ngaydang FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id ORDER BY vanban.ngaydang DESC");
    }
    

    function loadone_vanban_khoa($id) {
        $sql = "SELECT * FROM vanban, loaivanban WHERE vanban.loaivanban = loaivanban.id AND idvb=".$id;
        $vanban_khoa = pdo_query_one($sql);
        return $vanban_khoa;
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

    function admin_search_vanban_khoa($keyword) { 
        if(!empty($keyword)) {
            $sql = "SELECT *, DATE_FORMAT(ngaydang, '%d-%m-%Y') AS formatted_ngaydang 
                    FROM vanban, khoa, loaivanban 
                    WHERE vanban.loaivanban = loaivanban.id 
                    AND vanban.tieude LIKE '%".$keyword."%' 
                    AND vanban.idkhoa = khoa.id 
                    ORDER BY vanban.idvb";
        } else {
            $sql = "SELECT *, DATE_FORMAT(ngaydang, '%d-%m-%Y') AS formatted_ngaydang 
                    FROM vanban LIMIT 0,0";
        }
    
        $ketqua = pdo_query($sql);
        return $ketqua;
    }
    

    function admin_filter_vanban_khoa($start_day, $end_day) { 
        if(!empty($start_day) && !empty($end_day)) {
            // Chuyển định dạng ngày
            $start_day = date('Y-m-d', strtotime(str_replace('/', '-', $start_day)));
            $end_day = date('Y-m-d', strtotime(str_replace('/', '-', $end_day)));
    
            // Tạo câu truy vấn với điều kiện tìm kiếm ngày
            $sql = "SELECT *, DATE_FORMAT(ngaydang, '%d-%m-%Y') AS formatted_ngaydang 
                    FROM vanban, khoa, loaivanban 
                    WHERE vanban.loaivanban = loaivanban.id 
                    AND vanban.ngaydang BETWEEN '".$start_day."' AND '".$end_day."' 
                    AND vanban.idkhoa = khoa.id 
                    ORDER BY vanban.idvb";
        } else {
            $sql = "SELECT *, DATE_FORMAT(ngaydang, '%d-%m-%Y') AS formatted_ngaydang 
                    FROM vanban LIMIT 0,0";
        }
    
        // Thực hiện truy vấn
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

    function list_document_khoa_newest() {
        $sql = "SELECT * FROM vanban ORDER BY ngaydang DESC LIMIT 0,6"; 
        return pdo_query($sql); 
        
    }

    


    
?>