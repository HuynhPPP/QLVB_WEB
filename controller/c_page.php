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
                require_once 'view/admin/v_admin_layout.php';
               
                break;

            case 'add_khoa':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                require_once 'model/m_user.php';

                if ( isset($_POST['click_edit_btn'])) {                   
                    $tenkhoa = $_POST['ten_Khoa'];

                    $kq = checkKhoa($tenkhoa);
                    if ($kq) { // Đúng, bị trùng, không thêm
                        $thongbao = "Tên khoa đã tồn tại !";
                    } else {
                        addKhoa($tenkhoa);
                        $thongbao = "Thêm thành công !";
                    }
                    $encoded_message = json_encode($thongbao, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG);
                    echo $encoded_message;
                }
              
                   
                break;

            case 'add_loaiVB':
                require_once 'model/m_phong.php'; 
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                
                if ( isset($_POST['click_add_btn'])) {
                    $tenloaivb = $_POST['ten_loaiVB'];  

                    $kq = document_checkLoaiVanBan($tenloaivb);
                    if ($kq) { // Đúng, bị trùng, không thêm
                        $thongbao = "Tên loại văn bản đã tồn tại !";
                    } else {
                        document_addLoaiVanBan($tenloaivb);
                        $thongbao = "Thêm thành công !";
                    }     
                    $encoded_message = json_encode($thongbao, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG);
                    echo $encoded_message;                                                
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
                $_SESSION['success'] = 'Xóa loại văn bản thành công !';  
                header('Location: '.$base_url.'page/home_admin');                    
                break;

            
            case 'mail':
                require_once 'model/m_user.php';
                require_once 'mail/send.php';

                $mail = new MailSendAll();


                if (isset($_POST['send'])) {
                    $error = array();
                    $emails = $_POST['mail'];
                    if($emails == '') {
                        $error['mail'] = 'Không được để trống mail !';
                     
                    }
                    if(empty($error)) {
                        $email_receive = $emails;
                        $email_array = explode(",", $email_receive);
                        $title = $_POST['tieude'];
                        $content = $_POST['noidung'];
                        if($content == '') {
                            $error['mail'] = 'Bạn chưa nhập nội dung !';
                         
                        }
                        $mail->sendMail_all($title, $content, $email_array);
                         
                        
                    }
                }
                $dsTK = user_getAll();
                $view_name = 'mail'; 
                require_once 'view/admin/v_admin_layout.php';
                break;
            default:
            
            break;
        }
       
    }
?>