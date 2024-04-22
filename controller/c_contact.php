<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'home':
                

                // Hiển thị dữ liệu
                $view_name = 'contact';
                require_once('view/v_admin_layout.php');
                break;

            case 'home_user':
                $view_name = 'contact';
                require_once('view/v_user_layout.php');
                break;
            default:
        }
        
    }
?>