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
                require_once 'view/admin/v_admin_layout.php';
                break;

            case 'add_account':
                // Lấy dữ liệu
                require_once 'model/m_user.php';
                require_once 'model/m_khoa.php';
                if  ( isset($_POST['confirm_modal_addUser']) ) {
                    // $thongbao = array();
                    $taikhoan = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $mail = $_POST['mail'];
                    $khoa = $_POST['idkhoa'];
                    $loaitaikhoan = $_POST['loaitaikhoan'];

                    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
                    
                    $kq2 = user_checkmail($mail);
                    $kq = user_checkTaiKhoan($taikhoan);
                    if ( $kq ) { // Đúng, bị trùng, không thêm
                        $_SESSION['thongbao']='Tài khoản với tên đăng nhập <strong>'.$taikhoan.'</strong> đã tồn tại.' ;
                    }elseif($kq2) {
                        $_SESSION['thongbao']='Tài khoản với mail <strong>'.$mail.'</strong> đã tồn tại.' ;
                    }
                    else { // Sai, không trùng, thêm tài khoản
                        
                        user_add($taikhoan, $hashed_password, $mail, $loaitaikhoan, $khoa);
                        $_SESSION['success'] = 'Tạo tài khoản với tên đăng nhập <strong>'.$taikhoan.'</strong> thành công !';
                        
                    }
                }
                // Hiển thị dữ liệu
                header('Location: '.$base_url.'taikhoan/home_admin');    
                require_once('view/admin/v_admin_layout.php'); 
                break;

            case 'edit_user':
                // Lấy dữ liệu
                require_once 'model/m_user.php';
                require_once 'model/m_khoa.php';

                if ( isset($_POST['click_edituser_btn'])) {
                    $id_user = $_POST['id_user'];
                    $arr_result = [];
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');

                   
                    $fetch_query = "SELECT * FROM user WHERE iduser='$id_user'";
                    $fetch_query_run = mysqli_query($conn, $fetch_query);

                    if (mysqli_num_rows($fetch_query_run) > 0) {
                        while ($row = mysqli_fetch_array($fetch_query_run)){
                            array_push($arr_result, $row);
                            header('content-type: application/json');
                            echo json_encode($arr_result);
                        }
                    }
                }
                break;

            case 'update_account':
                require_once 'model/m_user.php';

                if(isset($_POST['confirm_modal_addUser'])) {
                    $id = $_POST['iduser'];
                    $hoten = $_POST['taikhoan'];
                    $matkhau = $_POST['matkhau'];
                    $mail = $_POST['mail'];
                    $loaitk = $_POST['loaitaikhoan'];
                    $khoa = $_POST['idkhoa'];
                    
                    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
                    user_edit($hoten, $hashed_password, $mail, $loaitk, $khoa, $id);
                    $_SESSION['success'] = 'Cập nhật tài khoản thành công !';
                    
                }
                header('Location: '.$base_url.'taikhoan/home_admin');    
                require_once('view/admin/v_admin_layout.php'); 
                break;

            case 'status':
                require_once 'model/m_user.php';
                $id = $_GET['id'];
                $status  = $_GET['status'];
                update_status($id, $status);
                header('Location: '.$base_url.'taikhoan/home_admin');                    
                break;
                

            case 'delete':
                require_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('Location: '.$base_url.'taikhoan/home_admin');                    
                break;
           
            default:
        }
        
    }
?>