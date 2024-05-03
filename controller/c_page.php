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

                if  ( isset($_POST['ten_Khoa']) ) {
                    $tenkhoa = $_POST['ten_Khoa'];
                    addKhoa($tenkhoa);
                }
                            
                break;

            case 'edit_khoa':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';
                if (isset($_POST['id'], $_POST['text'], $_POST['column_name'])) {
                    $id_khoa = $_POST['id'];
                    $text = $_POST['text'];
                    $column_name = $_POST['column_name'];
                }                       
                    edit_Khoa($id_khoa, $text, $column_name);
                        
                
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

            case 'edit_loaiVB':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';
                if (isset($_POST['id'], $_POST['text'], $_POST['column_name'])) {
                    $id_loaiVB = $_POST['id'];
                    $text = $_POST['text'];
                    $column_name = $_POST['column_name'];
                }                       
                    document_editLoaiVanBan($id_loaiVB, $text, $column_name);
                      
                
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