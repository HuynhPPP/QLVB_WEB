<?php
    // Điều hướng đến các controller
    require_once 'config.php';
    
    if(isset($_GET["mod"])){
        switch ($_GET['mod']) {
            case 'page':
                $ctrl_name = 'page';
                break;
            case 'page_user':
                $ctrl_name = 'page_user';
                break;
            case 'loaiVB':
                $ctrl_name = 'loaiVB';
                break;
            case 'vanban':
                $ctrl_name = 'vanban';
                break;
            case 'taikhoan':
                $ctrl_name = 'taikhoan';
                break;
            case 'contact':
                $ctrl_name = 'contact';
                break;
            case 'user':
                $ctrl_name = 'user';
                break;    
            case 'khoa':
                $ctrl_name = 'khoa';
                break;      
            case 'phong':
                $ctrl_name = 'phong';
                break;   
            default:
        }    
        require_once('controller/c_'.$ctrl_name.'.php');
    }
    else{
        header('Location: user/login');
    }
    
    
?>