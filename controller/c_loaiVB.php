<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'home':
                // Lấy dữ liệu
                require_once 'model/m_document.php';
             
                
                $dsLoaiVanBan = document_getAllLoaiVanBan(); 
                
                
                // Hiển thị dữ liệu
                $view_name = 'type_document';
                break;
           


              

            case 'edit':
                require_once 'model/m_document.php';
                $Idloaivb = $_GET['id'];
                
                if  ( isset($_POST['submit']) ) {
                    $tenloaivb = $_POST['loaivanban'];

                    $kq = document_checkLoaiVanBan($tenloaivb);
                    if ( $kq ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Loại văn bản <strong>'.$tenloaivb.'</strong> đã tồn tại ! Vui lòng đặt tên khác ' ;
                    }
                    else { // Sai, không trùng, thêm 
                        
                        document_editLoaiVanBan($tenloaivb, $Idloaivb);
                        $_SESSION['thongbao'] = 'Đã sửa loại văn bản thành công !';
                    }
                }
                $lvb = document_getByIdloaivb($Idloaivb);
                $view_name = 'edit_type_document';
                break;

            

            case 'search':             
                require_once 'model/m_document.php'; 
                $kq = search_type_document($_POST['keyword_type']);
                $view_name ="search_type_document";
                
           
            default:
        }
        require_once('view/v_admin_layout.php');
    }
?>