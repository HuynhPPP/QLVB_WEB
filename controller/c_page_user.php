<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'trangchu':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
                require_once 'model/m_phong.php';
                if( isset($_SESSION['user']['idkhoa']) && ($_SESSION['user']['idkhoa'] > 0)) {
                    $id = $_SESSION['user']['idkhoa'];
                }

                $khoa = getByIdKhoa($id);
                
                $view_name = 'trangchu';    
                require_once 'view/user/v_user_layout.php';      
                break;   
                
            case 'trangchu_khoa':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
                require_once 'model/m_phong.php';
                if( isset($_SESSION['user']['idkhoa']) && ($_SESSION['user']['idkhoa'] > 0)) {
                    $id = $_SESSION['user']['idkhoa'];
                }

                $khoa = getByIdKhoa($id);
                
                $view_name = 'trangchu_khoa';   
                require_once 'view/user/v_user_layout.php';       
                break;
                
            case 'renew_password':
            require_once 'model/m_user.php'; 
            if (isset($_POST['submit_change_pass'])){ 
                    $error = array();
                    $old_pass = $_POST['old_pass'];
                    $new_pass = $_POST['new_pass'];

                    if($old_pass == '' || $new_pass == '') {
                        $error['error_comfirm'] = "Vui lòng nhập đủ thông tin !";
                    } else {
                        $check = user_checkTaiKhoan($_SESSION['user']['taikhoan']);
                        if (!password_verify($old_pass, $check['matkhau'])) { 
                            $error['error_comfirm'] = 'Mật khẩu hiện tại không chính xác !';
                        } else {
                            $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
                            $taikhoan = $_SESSION['user']['taikhoan'];
                            update_password($hashed_password, $taikhoan);
                            $error['success'] = 'Đổi mật khẩu thành công !';
                        }
                    }
                    
            }
    
            
            require_once 'view/renew_password.php';
            break;
        }
      
    }
?>