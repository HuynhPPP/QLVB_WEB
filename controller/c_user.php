<?php
// Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if( isset($_GET['act']) ){
      switch ($_GET['act']) {
          case 'login':
              // Lấy dữ liệu     
              require_once 'model/m_user.php';  
              if( isset($_POST['TaiKhoan']) && isset($_POST['MatKhau']) ){
                  $kq = user_login($_POST['TaiKhoan'],$_POST['MatKhau']); 
                  if( $kq ){
                      // Đúng, đăng nhập thành công
                      $_SESSION['user'] = $kq;
                      
                      header('Location: '.$base_url.'page_user/trangchu');
                  }
                  else{
                      $_SESSION['error_login'] = 'Tên đăng nhập hoặc mật khẩu không đúng !';
                      
                  }
                  
              }                        
            //   $view_name = 'login';
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
                    $email = user_mail($email);
                    $code = substr(rand(0, 999999),0.6);
                    $title = "Quên mật khẩu";
                    $content = "Mã xác nhận của bạn là: <span style='color:green'>".$code."</span>";
                    $mail->sendMail_forget($title, $content, $email);

                    $_SESSION['mail'] = $email;
                    $_SESSION['code'] = $code;
                    header('Location: '. $base_url .'user/comfirm');
                }
            }

            require_once 'view/forgetPass.php';
            break; 


        case 'comfirm':
           
            require_once 'view/confirm.php';
            break;   
              
                
          case 'logout':
            if(isset($_POST['submit'])){

            }

              header('Location: '. $base_url .'user/login');
              break;   
              
         
          default:
              # code...
              break;
      }
      
  }
   
?>