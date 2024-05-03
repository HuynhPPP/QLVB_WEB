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
          case 'logout':
              unset($_SESSION['user']);
              header('Location: '. $base_url .'user/login');
              break;   
              
         
          default:
              # code...
              break;
      }
      
  }
   
?>