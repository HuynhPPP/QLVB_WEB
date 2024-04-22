<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
        // --- USER --- 
            case 'home_user':
                require_once 'model/m_phong.php'; 
                $page = 1;
                if( isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];  
                    
                 } if(isset($_GET['idpage']) && ($_GET['idpage'] > 0)) {
                    $page = $_GET['idpage'];
                }

                $phong =  getByIdPhong($id);       
                $dsvb_phong_new = get_new_VB_phong($id);
                $dsvb_phong = get_VB_phong($id,$page);
                $sotrang = ceil(total_document_chung_phong($id)/6);
           
                $view_name = 'phong';
                require_once('view/user/v_user_layout.php');
                break;

            case 'content':
                require_once 'model/m_phong.php';
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $vanban_chung = loadone_vanban_chung($_GET['id']);
                    }   
                
                $dsvanban_chung = getAllVanBan_chung();   
                $view_name = 'content_document_chung';      
                require_once('view/user/v_user_layout.php');          
                    break;

            case 'search_vanban_phong':             
                require_once 'model/m_phong.php'; 
                
                if( isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id']; 
                }  if(isset($_POST['keyword_vb_phong']) && !empty($_POST['keyword_vb_phong'])) {
                    $keyword = $_POST['keyword_vb_phong'];  
                } else {
                    $keyword = '';
                    $_SESSION['thongbao'] = 'Không tìm thấy kết quả tìm kiếm hoặc bạn chưa nhập từ khoá !';
                }

                $dsvb_phong = search_vanban_phong($keyword, $id);
                $phong = getByIdPhong($id);
                $dsvb_phong_new = get_new_VB_phong($id);
                $view_name ="search_vanban_phong";
                require_once('view/user/v_user_layout.php');
                break;

        // --- USER --- 





        // --- ADMIN ---
            case 'home_admin':
                require_once'model/m_phong.php';
                $dsphong = getAllPhong();
                $ds_vb_chung = getAll_VB_chung();
                $view_name = 'page_admin_vbphong';
                require_once('view/admin/v_admin_layout.php');
                break;

            case 'list':
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php';
                $page = 1;
                if( isset($_GET['id'])){
                    $page = $_GET['id'];
                }  
                $dsvanban_chung = getAllVanBan_chung($page);  
                $sotrang = ceil(total_document_chung()/8);  

                $dsphong = getAllPhong();
                $dsLoaiVanBan = document_getAllLoaiVanBan(); 
                $view_name = 'list_document_phong';
                require_once('view/v_admin_layout.php');
                break;

            case 'content_admin':
                require_once 'model/m_phong.php';
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $vanban_chung = loadone_vanban_chung($_GET['id']);
                    }   
                
                $dsvanban_chung = getAllVanBan_chung();   
                $view_name = 'content_document_chung';      
                require_once('view/v_admin_layout.php');          
                break;

            case 'add':
                require_once 'model/m_phong.php';
                if  ( isset($_POST['submit']) ) {
                    $tenphong = $_POST['tenphong'];

                    $kq_phong =  checkPhong($tenphong);
                    if ( $kq_phong ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Đã tồn tại <strong>'.$tenphong.'</strong>.' ;
                    }
                    else { // Sai, không trùng, thêm 
                        
                        addPhong($tenphong);
                        $_SESSION['thongbao'] = 'Đã thêm <strong>'.$tenphong.'</strong>.';
                    }
                }
                $view_name = 'add_phong';
                require_once('view/v_admin_layout.php');
                break;

            case 'add_vanban_chung':
                require_once 'model/m_document.php'; 
                require_once 'model/m_phong.php';
                if  ( isset($_POST['submit']) ) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['idloaivb'];
                    $phong = $_POST['idphong'];
                    $ngayky = $_POST['ngayky'];
                    $file = $_FILES['file']['name'];
                  
                    addVanBan_chung($tieude, $noidung, $loaivb, $phong, $ngayky, $file);
                    $_SESSION['thongbao'] = 'Đăng văn bản thành công !';
                    $target_dir = "upload/file_phong/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                }
                $dsphong = getAllPhong();
                $dsLoaiVanBan = document_getAllLoaiVanBan();    
                $view_name = 'add_document_chung';
                require_once('view/v_admin_layout.php');
                break;

            case 'edit':
                require_once 'model/m_phong.php';
                $Idphong = $_GET['id'];
                
                if  ( isset($_POST['submit']) ) {
                    $tenphong = $_POST['tenphong'];

                    $kq_phong =  checkPhong($tenphong);
                    if ( $kq_phong ) { // Đúng, bị trùng, không thêm
                        $_SESSION['loi']='Đã tồn tại <strong>'.$tenphong.'</strong> ! Vui lòng đặt tên khác';
                    }
                    else { // Sai, không trùng, thêm 
                        
                        editPhong($tenphong, $Idphong);
                        $_SESSION['thongbao'] = 'Đã đổi tên phòng ban thành công !';
                    }
                }
                $phong = getByIdPhong($Idphong);
                $view_name = 'edit_phong';
                require_once('view/v_admin_layout.php');
                break;

            case 'edit_vanban_chung':
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php';
            
                $Idvb_chung = $_GET['id'];

                if  ( isset($_POST['submit']) ) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['loaivanban'];
                    $phong = $_POST['idphong'];
                    $ngayky = $_POST['ngayky'];
                    $file = $_FILES['file']['name'];

                    if($file!=""){
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    }else{
                        $file="";
                    }
                    

                    editVanBan_chung($tieude, $noidung, $loaivb, $phong, $ngayky, $file, $Idvb_chung);
                    $_SESSION['thongbao'] = 'Đã sửa văn bản thành công !';
                }
                $dsphong = getAllPhong();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $vb_chung = getByIdvb_chung($Idvb_chung);
                $view_name = 'edit_vanban_chung';
                require_once('view/v_admin_layout.php');
                break;

            case 'delete':
                require_once 'model/m_phong.php';               
                deletePhong($_GET['id']);
                header('Location: '.$base_url.'phong/home');    
                require_once('view/v_admin_layout.php');                
                break;

            case 'delete_vanban_chung':
                require_once 'model/m_phong.php';               
                document_deleteVB_chung($_GET['id']);
                header('Location: '.$base_url.'phong/home_admin');    
                require_once('view/admin/v_admin_layout.php');                
                break;

            case 'search':             
                require_once 'model/m_phong.php'; 
                $kq_phong = search_phong($_POST['keyword_phong']);
                $view_name = "search_phong";
                require_once('view/v_admin_layout.php');
                break;

            case 'search_vanban_chung':   
                require_once 'model/m_phong.php';           
                require_once 'model/m_document.php';

                $date = $_POST['date'];
                $keyword = $_POST['keyword_vb_chung']; 
                $loaivanban = $_POST['loaivanban'];
                $phong = $_POST['idphong'];
                
                $timkiem = search_document_chung($keyword, $loaivanban, $phong, $date);
                
                $dsphong = getAllPhong();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $view_name = "search_vanban_chung";
                require_once('view/v_admin_layout.php');
                break;

            case 'detail':             
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php'; 
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];       
                }else {
                    $id = 0;
                }
                $phong = getByIdPhong($id);
                $dsvb_phong = get_VB_phong($id);
                $dsLoaiVanBan = document_getAllLoaiVanBan(); 
                $view_name ="detail_phong";
                  
                require_once('view/v_admin_layout.php');
                break;

                case 'download_file_phong':
                    require_once 'model/m_document.php';  
                   
                    $idfile = $_GET['id'];
                      if (isset($idfile)) {
                            $file = $idfile; // Tên file được truyền qua query parameter
    
                            $file_path = 'upload/file_phong/'.$file; // Đường dẫn tới file
    
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
                        $dsphong = getAllPhong();
                        $ds_vb_chung = getAll_VB_chung(); 
                        
                        $view_name = 'page_admin';               
                    break;
        // --- ADMIN ---
            default:
        }
       
        
    }
?>