<?php
   
    if(isset($_GET['act']) ){
        switch($_GET['act']){                                                             
            case 'home_admin':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';
                // Lấy dữ liệu
                $tong_loaivb = total_loaivanban();
                $tong_vb_khoa = total_document();
                $tong_vb_chung = total_document_chung();
                $tong_user = total_user();
                
                $dskhoa = getAllKhoa();
                $dsLoaiVanBan = document_getAllLoaiVanBan(); 
                // Hiển thị dữ liệu
                $view_name = 'page_home'; 
               
                break;

            case 'add_khoa':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';

                if  ( isset($_POST['confirm_addKhoa']) ) {
                    $tenkhoa = $_POST['tenkhoa'];

                    $kq_phong =  checkKhoa($tenkhoa);
                    if ( $kq_phong ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Đã tồn tại <strong>'.$tenkhoa.'</strong>.' ;
                    }
                    else { // Sai, không trùng, thêm 
                        if (empty($_POST['tenkhoa'])) {
                            $_SESSION['loi']='Bạn chưa nhập tên khoa !';
                        }
                        else {
                            addKhoa($tenkhoa);
                            $_SESSION['thongbao'] = 'Đã thêm <strong>'.$tenkhoa.'</strong>.';
                        }
                    }
                }
                $tong_loaivb = total_loaivanban();
                $tong_vb_khoa = total_document();
                $tong_vb_chung = total_document_chung();
                $tong_user = total_user();
                
                $dskhoa = getAllKhoa();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $view_name = 'page_home';
                break;

            case 'add_loaiVB':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';

                if  ( isset($_POST['ten_loaiVB']) ) {
                    $tenloaivb = $_POST['ten_loaiVB'];
                     document_addLoaiVanBan($tenloaivb);
                }
                // header('Location: '.$base_url.'page/home_admin');
                 
                break;

            case 'delete_loaiVB':
                require_once 'model/m_document.php';               
                document_deleteLoaiVanBan($_GET['id']);
                header('Location: '.$base_url.'page/home_admin');                    
                break;
                
            case 'mail':
                // Hiển thị dữ liệu
                $view_name = 'mail'; 
                
                break;
            default:
            
            break;
        }
        require_once 'view/admin/v_admin_layout.php';
    }
?>