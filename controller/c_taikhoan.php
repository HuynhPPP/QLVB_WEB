<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'home_admin':
                // Lấy dữ liệu
                require_once 'model/m_user.php';
                require_once 'model/m_khoa.php';
                $dsTK = user_getAll();
                $dskhoa = getAllKhoa();
                // Hiển thị dữ liệu
                $view_name = 'page_account_admin';
                break;

            case 'add':
                // Lấy dữ liệu
                require_once 'model/m_user.php';
                require_once 'model/m_khoa.php';
                if  ( isset($_POST['confirm_modal_addUser']) ) {
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $mail = $_POST['mail'];
                    $khoa = $_POST['idkhoa'];
                    $loaitaikhoan = $_POST['loaitaikhoan'];
                    
                    $kq = user_checkTaiKhoan($taikhoan);
                    if ( $kq ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Tài khoản với tên đăng nhập <strong>'.$taikhoan.'</strong> đã tồn tại.' ;
                    }
                    else { // Sai, không trùng, thêm tài khoản
                        
                        user_add($taikhoan, $matkhau, $mail, $loaitaikhoan, $khoa);
                        $_SESSION['thongbao'] = 'Đã tạo tài khoản với tên đăng nhập <strong>'.$taikhoan.'</strong>.';
                        
                    }
                }
                // Hiển thị dữ liệu
                $dsTK = user_getAll();
                $dskhoa = getAllKhoa();
                $view_name = 'page_account_admin';
                break;

            case 'edit':
                // Lấy dữ liệu
                require_once 'model/m_user.php';
                require_once'model/m_khoa.php';
                $Id = $_GET['id'];
                if  ( isset($_POST['submit']) ) {
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $loaitaikhoan = $_POST['loaitaikhoan'];
                    $khoa = $_POST['idkhoa'];

                    $kq = user_checkTaiKhoan($taikhoan);

                    if ( $kq  ) { // Đúng, bị trùng, không sửa
                        $_SESSION['loi']='Tài khoản <strong>'.$taikhoan.'</strong> đã tồn tại';
                    }
                    else { // Sai, không trùng, sửa tài khoản
                        user_edit($taikhoan, $matkhau, $loaitaikhoan, $khoa, $Id);
                            $_SESSION['thongbao'] = 'Thông tin thay đổi đã được lưu lại';
                    }

                }
                $dskhoa = getAllKhoa();
                $tk = user_getById($Id);
                // Hiển thị dữ liệu
                $view_name = 'edit_account';
                break;

            case 'delete':
                require_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('Location: '.$base_url.'taikhoan/home_admin');                    
                break;
           
            default:
        }
        require_once 'view/admin/v_admin_layout.php';
    }
?>