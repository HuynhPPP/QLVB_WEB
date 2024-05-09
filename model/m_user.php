<?php
    // Thao tác dữ liệu trong CSDL
    require_once 'pdo.php';
    function user_login($username, $pass) {
        return pdo_query_one("SELECT * FROM user WHERE taikhoan=? AND matkhau=?", $username, $pass);
    }

    function user_getAll() {
        return pdo_query("SELECT * FROM user, khoa WHERE user.idkhoa = khoa.id");
    }

    function total_user() {
        return pdo_query_value("SELECT COUNT(*) FROM user");
    }

    function user_checkTaiKhoan($taikhoan) {
        return pdo_query("SELECT * FROM user WHERE taikhoan=?", $taikhoan);
    }

    function user_add($taikhoan, $matkhau, $mail, $loaitaikhoan, $khoa){
        pdo_execute("INSERT INTO user(`taikhoan`,`matkhau`,`mail`,`loaitaikhoan`,`idkhoa`)
                    VALUES(?,?,?,?,?)",$taikhoan, $matkhau, $mail, $loaitaikhoan, $khoa);
    }

    function user_mail($email) {
        $sql = "SELECT * FROM user WHERE mail='".$email."'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function user_getById($Id) {
        return pdo_query_one("SELECT * FROM user, khoa WHERE user.idkhoa = khoa.id AND user.iduser=?", $Id);
    }

    // // function get_user($id_khoa) {
    // //     $sql = "SELECT * FROM user WHERE idkhoa=".$id_khoa;
    // //     $user_khoa = pdo_query_one($sql);
    // //     return $user_khoa;
    // }

    function user_edit($hoten, $matkhau, $mail, $loaitk, $khoa, $id) {
        pdo_execute("UPDATE user SET taikhoan=?, matkhau=?, loaitaikhoan=?, mail=?, idkhoa=? WHERE iduser=?",  $hoten, $matkhau, $loaitk, $mail, $khoa, $id);
    }


    function user_delete($Id) {
        pdo_execute("DELETE FROM user WHERE iduser=?",$Id);
    }

    
    
?>