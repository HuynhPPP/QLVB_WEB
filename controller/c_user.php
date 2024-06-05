<?php
// Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if( isset($_GET['act']) ){
      switch ($_GET['act']) {
        
            case 'login':
            require_once 'model/m_user.php';  
            if(isset($_POST['btn_login'])){ 
                $thongbao = array();
                if( isset($_POST['TaiKhoan']) && isset($_POST['MatKhau']) ){
                   
                    $kq = user_login($_POST['TaiKhoan'],$_POST['MatKhau']); 
                    if( $kq ){
                        if ($kq['trangthai'] == 1) {
                            // Đúng, đăng nhập thành công
                            $_SESSION['user'] = $kq;

                             // Kiểm tra nếu checkbox "Ghi nhớ tài khoản" được chọn
                            if (isset($_POST['remember_me'])) {
                                // Tạo token duy nhất
                                $token = bin2hex(random_bytes(32));
                                
                                // Lưu token vào cookie
                                setcookie('remember_me_token', $token, time() + (86400 * 30), "/"); // Cookie có hiệu lực trong 30 ngày
                                
                                
                                // Lưu token vào cơ sở dữ liệu
                                save_remember_me_token($kq['iduser'], $token);
                            } else {
                                // Xóa cookie nếu không chọn "Ghi nhớ tài khoản"
                                if (isset($_COOKIE['remember_me_token'])) {
                                    setcookie('remember_me_token', '', time() - 3600, "/");
                                    
                                }
                            }

                            header('Location: '.$base_url.'page_user/trangchu');
                            exit();
                        } else {
                            $thongbao['error_login'] = 'Tài khoản của bạn đã bị khóa!';
                        }
                    }
                    else{
                        $thongbao['error_login'] = 'Tên đăng nhập hoặc mật khẩu không chính xác!';
                    }
                }

               
                
               
            }   
            // Kiểm tra nếu đã có cookie thì tự động điền vào form
            if (isset($_COOKIE['remember_me_token'])) {
                   
                $token = $_COOKIE['remember_me_token'];
             
                $user = getUserByToken($token);
               

                if ($user) {
                    $taiKhoan = $user['taikhoan'];
                    header('Location: '.$base_url.'page_user/trangchu');
                    exit();
                } else {
                    $taiKhoan = 'tài khoản rỗng';
                }
            } else {
                $taiKhoan = '';
            }
                                 
            require_once 'view/login.php';
            break;
            
              
            case 'quenmatkhau':
            require_once 'model/m_user.php'; 
            require_once 'mail/forget.php';
            $mail = new Mailer();

            if(isset($_POST['submit'])){ 
            $error = array();
            $email = $_POST['mail'];
            $email = trim($email);
                if($email == '') {
                    $error['mail'] = "Không được để trống !";
                }
                if(empty($error)) {
                    $email_receive = user_mail($email);
                    $code = substr(rand(0,999999),0.6);
                    $title = "Quên mật khẩu";
                    $content = "Mã xác nhận của bạn là: <span style='color:green'>".$code."</span>";
                    $mail->sendMail_forget($title, $content, $email_receive);

                    $_SESSION['mail'] = $email_receive;
                    $_SESSION['code'] = $code;
                    header('Location: '. $base_url .'user/comfirm');
                }
            }

            require_once 'view/forgetPass.php';
            break; 


        case 'comfirm':
            if (isset($_POST['submit'])){
                $error = array();
                if($_POST['maxacnhan'] != $_SESSION['code']) {
                    $error['fail'] = 'Mã xác nhận không hợp lệ !';
                }else {
                    header('Location: '. $base_url .'user/reset');
                }
            }


            require_once 'view/confirm.php';
            break;   

        case 'reset':
            require_once 'model/m_user.php'; 
            if (isset($_POST['submit'])){
                $error = array();
                if( isset($_POST['pass_new']) && isset($_POST['pass_new_confirm']) ){
                    $pass_new = $_POST['pass_new'];
                    $pass_new_confirm = $_POST['pass_new_confirm'];

                    if ($pass_new != $pass_new_confirm) {
                        $error['fail'] = 'Mật khẩu không khớp !';
                    } 
                    else {
                        $hashed_password = password_hash($pass_new, PASSWORD_DEFAULT);
                        forget_password($hashed_password, $_SESSION['mail']);
                        $error['success'] = 'Đổi mật khẩu thành công !';
                        // header('Location: '. $base_url .'user/login');
                    }
                }
            }   
            require_once 'view/resetPass.php';
            break;
             
              
                
          case 'logout':
            session_unset();
            session_destroy();
            
            // Xóa cookie "remember_me_token"
            if (isset($_COOKIE['remember_me_token'])) {
                setcookie('remember_me_token', '', time() - 3600, "/", "", true, true); // HttpOnly và Secure
            }

            // Chuyển hướng đến trang đăng nhập
            header('Location: '. $base_url .'user/login');
            break;
                               
          default:
              # code...
              break;
      }
      
  }
   
?>