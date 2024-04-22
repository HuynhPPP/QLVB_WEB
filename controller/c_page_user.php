<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'trangchu':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
                require_once 'model/m_phong.php';
               
                
                $view_name = 'trangchu';          
                break;    
        }
        require_once 'view/user/v_user_layout.php';
    }
?>