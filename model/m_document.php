<?php
    require_once 'pdo.php';
    function document_getAllLoaiVanBan() {
        
        return pdo_query("SELECT * FROM loaivanban ORDER BY id ");
    }

    function total_loaivanban() {
        return pdo_query_value("SELECT COUNT(*) FROM loaivanban");
    }
   

    function document_checkLoaiVanBan($tenloaivb) {
        return pdo_query("SELECT * FROM loaivanban WHERE loaivanban=?", $tenloaivb);
    }

    function check_vbkhoa($tieude) {
        return pdo_query_one("SELECT * FROM vanban WHERE tieude=?", $tieude);
    }

    function check_vbphong($tieude) {
        return pdo_query_one("SELECT * FROM vanban_chung WHERE tenvanban=?", $tieude);
    }

    function document_addLoaiVanBan($tenloaivb) {
        pdo_execute("INSERT INTO loaivanban(`loaivanban`) VALUES(?)",$tenloaivb);
    }

    function document_getByIdloaivb($Idloaivb) {
        return pdo_query_one("SELECT * FROM loaivanban WHERE id=?", $Idloaivb);
    }

    function search_type_document($keyword){
        return pdo_query("SELECT * FROM loaivanban WHERE loaivanban LIKE '%$keyword%'");
    }

    function document_editLoaiVanBan($id_loaiVB, $text, $column_name) {
        pdo_execute("UPDATE loaivanban SET $column_name='$text' WHERE id ='$id_loaiVB'");
    }

    function document_deleteLoaiVanBan($Id) {
        pdo_execute("DELETE FROM loaivanban WHERE id=?",$Id);
    }

    // Văn bản
    function document_addVanBan($tieude, $noidung, $loaivb, $khoa, $ngayky, $file) {  
            pdo_execute("INSERT INTO vanban(`tieude`, `noidung`, `loaivanban`, `idkhoa`, `ngaydang`, `file`)
                     VALUES(?,?,?,?,?,?)",$tieude, $noidung, $loaivb, $khoa, $ngayky, $file);
        

    }

    function document_getAllVanBan($page=1) {
       $start = ($page - 1)*8;
       // 1 trang hiện 5 văn bản
       // trang 1 bắt đầu từ 0 1 2 3 4 5
       // trang 2 bắt đầu từ 5
       // trang 3 bắt đầu từ
       return pdo_query("SELECT * FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND  vanban.idkhoa = khoa.id  ORDER BY vanban.idvb LIMIT $start,8");
      
    }

    function total_document() {
        return pdo_query_value("SELECT COUNT(*) FROM vanban");
    }
   
    
    function document_getByIdvb($Idvb) {
        return pdo_query_one("SELECT * FROM vanban, loaivanban, khoa WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id  AND idvb=?", $Idvb);
    }

    function document_editVanBan($tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $Idvb) {
        if($file != "") {
            pdo_execute("UPDATE vanban SET tieude=?, noidung=?, loaivanban=?, idkhoa=?, ngaydang=?, file=? WHERE idvb=?",  $tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $Idvb);    
        }else{
            pdo_execute("UPDATE vanban SET tieude=?, noidung=?, loaivanban=?, idkhoa=?, ngaydang=?  WHERE idvb=?",  $tieude, $noidung, $loaivb, $khoa, $ngayky, $Idvb);    
        }           
    }

    function loadone_vanban($id) {
        $sql = "SELECT * FROM vanban WHERE idvb=".$id;
        $vanban = pdo_query_one($sql);
        return $vanban;
    }

    function document_deleteVB($Id) {
        pdo_execute("DELETE FROM vanban WHERE idvb=?",$Id);
    }

    function search_document($keyword="", $loaivanban=0, $khoa=0, $date="") {
        $sql = "SELECT * FROM vanban, loaivanban, khoa  WHERE vanban.loaivanban = loaivanban.id AND vanban.idkhoa = khoa.id AND";
        if($keyword != "") {
            $sql.=" vanban.tieude LIKE '%".$keyword."%'";
        }

        if($loaivanban > 0) {
            $sql.=" vanban.loaivanban = '".$loaivanban."'";
        }

        if($khoa > 0) {
            $sql.=" vanban.idkhoa = '".$khoa."'";
        }


        if($date != "") {
            $sql.=" vanban.ngaydang = '".$date."'";
        }
        $sql.=" ORDER BY vanban.idvb";
        $ketqua = pdo_query($sql);
        return $ketqua;

    
    }

    

  
   
?>

 