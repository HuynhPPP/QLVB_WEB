<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
        // --- USER ---
            case 'home_user':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php'; 
                $page = 1;
                if( isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id']; 
                    
                } if(isset($_GET['idpage']) && ($_GET['idpage'] > 0)) {
                    $page = $_GET['idpage'];
                }

                $khoa = getByIdKhoa($id);
                $dsvb_new = get_new_VB_khoa($id);
                $dsvb_khoa = get_VB_khoa($id,$page);
                $sotrang = ceil(total_document_chung_khoa($id)/6);

                $view_name = 'khoa';
                require_once('view/user/v_user_layout.php');
                break;

            case 'content':
                require_once 'model/m_document.php';
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $vanban = loadone_vanban($_GET['id']);
                    }   
                
                $dsVanBan = document_getAllVanBan();              
                $view_name = 'content_document';
                require_once('view/user/v_user_layout.php');
                break;

            case 'search_vanban_khoa':             
                require_once 'model/m_khoa.php'; 
                if( isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];  
                } if(isset($_POST['keyword_vb_khoa']) && !empty($_POST['keyword_vb_khoa'])) {
                    $keyword = $_POST['keyword_vb_khoa'];  
                } else {
                    $keyword = '';
                    $_SESSION['thongbao'] = 'Không tìm thấy kết quả tìm kiếm hoặc bạn chưa nhập từ khoá !';
                }

                $dsvb_khoa = search_vanban_khoa($keyword, $id);
                $khoa = getByIdKhoa($id);
                $dsvb_new = get_new_VB_khoa($id);
                $view_name ="search_vanban_khoa";
                require_once('view/user/v_user_layout.php');
                break;
        // --- USER --- //




        // --- ADMIN --- //
            case 'home_admin':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
                $dskhoa = getAllKhoa();
                $ds_vb_khoa = getAll_VB_khoa();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $view_name = 'page_admin_vbkhoa';
                require_once('view/admin/v_admin_layout.php');
                break;

            case 'add_vb_khoa':
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                if  ( isset($_POST['confirm_modal_addVB']) ) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['idloaivb'];
                    $khoa = $_POST['idkhoa'];
                    $ngayky = $_POST['ngayky'];
                    $file = $_FILES['file']['name'];

                    document_addVanBan_Khoa($tieude, $noidung, $loaivb, $khoa, $ngayky, $file);
                    // $_SESSION['thongbao'] = 'Đăng văn bản thành công !';
                    $target_dir = "upload/file_khoa/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                    $kq = check_documentKhoa($tieude);
                    if ( $kq ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Đã tồn tại văn bản với tiêu đề <strong>'.$tieude.'</strong>' ;
                    }
                    
                }
                $ds_vb_khoa = getAll_VB_khoa();
                $view_name = 'page_admin_vbkhoa';
                require_once('view/admin/v_admin_layout.php');
                break;

            case 'edit':
                require_once 'model/m_khoa.php';
                $Idkhoa = $_GET['id'];
                
                if  ( isset($_POST['submit']) ) {
                    $tenkhoa = $_POST['tenkhoa'];

                    $kq_khoa =  checkKhoa($tenkhoa);
                    if ( $kq_khoa ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Đã tồn tại <strong>'.$tenkhoa.'</strong> ! Vui lòng đặt tên khác';
                    }
                    else { // Sai, không trùng, thêm 
                        
                        editKhoa($tenkhoa, $Idkhoa);
                        $_SESSION['thongbao'] = 'Đã đổi tên khoa thành công !';
                    }
                }
                $khoa = getByIdKhoa($Idkhoa);
                $view_name = 'edit_khoa';
                require_once('view/v_admin_layout.php');
                break;

            case 'delete':
                require_once 'model/m_khoa.php';               
                deleteKhoa($_GET['id']);
                header('Location: '.$base_url.'page/home_admin');    
                require_once('view/admin/v_admin_layout.php');                
                break;

            case 'delete_document':
                require_once 'model/m_khoa.php';              
                documentKhoa_delete($_GET['id']);
                header('Location: '.$base_url.'khoa/home_admin'); 
                break;

            case 'search':             
                require_once 'model/m_khoa.php'; 
                $kq_khoa = search_khoa($_POST['keyword_khoa']);
                $view_name ="search_khoa";
                require_once('view/v_admin_layout.php');
                break;
            
            case 'detail':             
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php'; 
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];       
                }else {
                    $id = 0;
                }
                $khoa = getByIdKhoa($id);
                $dsvb_khoa = get_VB_khoa($id);
                $dsLoaiVanBan = document_getAllLoaiVanBan(); 
                $view_name ="detail";
                  
                require_once('view/v_admin_layout.php');
                break;

                case 'download':
                    require_once 'model/m_document.php';  
                   
                    
                    $idfile = $_GET['id'];
                      if (isset($idfile)) {
                            $file = $idfile; // Tên file được truyền qua query parameter
    
                            $file_path = 'upload/file_khoa/'.$file; // Đường dẫn tới file
    
                            if (file_exists($file_path)) {
                                header('Content-Description: File Transfer');
                                header('Content-Type: application/octet-stream');
                                header('Content-Disposition: attachment; filename="' . basename($file) . '"');
                                header('Expires: 0');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');
                                header('Content-Length: ' . filesize($file_path));
                                readfile($file_path);
                                exit;
                            } else {
                                echo 'File không tồn tại.';
                            }
                        } 
                        // $listvanban = document_getAllVanBan(); 
                        
                        // $view_name = 'page_admin';               
                    break;
        // --- ADMIN --- //
            default:
        }
       
        
    }
?>