<?php
    // Gửi nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act']) ){
        switch($_GET['act']){
            case 'home':
                // Lấy dữ liệu
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $dskhoa = getAllKhoa();
                $page = 1;
                if( isset($_GET['id'])){
                    $page = $_GET['id'];
                }  
                $dsVanBan = document_getAllVanBan($page);  
                $sotrang = ceil(total_document()/8);  

                // Hiển thị dữ liệu
                $view_name = 'list_document';            
                break;

            case 'add':
                require_once 'model/m_document.php'; 
                require_once 'model/m_khoa.php';
                if  ( isset($_POST['submit']) ) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['idloaivb'];
                    $khoa = $_POST['idkhoa'];
                    $ngayky = $_POST['ngayky'];
                    $file = $_FILES['file']['name'];
                  
                    document_addVanBan($tieude, $noidung, $loaivb, $khoa, $ngayky, $file);
                    // $_SESSION['thongbao'] = 'Đăng văn bản thành công !';
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                }
                $dskhoa = getAllKhoa();
                $dsLoaiVanBan = document_getAllLoaiVanBan();                
                $view_name = 'add_document';
                break;

            case 'edit':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
            
                $Idvb = $_GET['id'];

                if  ( isset($_POST['submit']) ) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['loaivanban'];
                    $khoa = $_POST['idkhoa'];
                    $ngayky = $_POST['ngayky'];
                    $file = $_FILES['file']['name'];

                    if($file!=""){
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    }else{
                        $file="";
                    }
                   

                    document_editVanBan($tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $Idvb);
                    $_SESSION['thongbao'] = 'Đã sửa văn bản thành công !';
                }
                $dskhoa = getAllKhoa();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $vb = document_getByIdvb($Idvb);
                $view_name = 'edit_document';
                
                break;

            case 'delete':
                require_once 'model/m_document.php';               
                document_deleteVB($_GET['id']);
                header('Location: '.$base_url.'khoa/home_admin'); 
                break;

            case 'content':
                require_once 'model/m_document.php';
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $vanban = loadone_vanban($_GET['id']);
                  }   
                   
                $dsVanBan = document_getAllVanBan(); 
                $view_name = 'content_document';
                
                        
                break;
            
            case 'search':
                require_once 'model/m_khoa.php';
                require_once 'model/m_document.php';
                $date = $_POST['date'];
                $keyword = $_POST['keyword_vb']; 
                $loaivanban = $_POST['loaivanban'];
                $khoa = $_POST['idkhoa'];
                $timkiem = search_document($keyword,$loaivanban, $khoa, $date);
                
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $dskhoa = getAllKhoa();
                $view_name = 'search_document';
                break;

            case 'download':
                require_once 'model/m_document.php';  
               
                
                $idfile = $_GET['id'];
                  if (isset($idfile)) {
                        $file = $idfile; // Tên file được truyền qua query parameter

                        $file_path = 'upload/'.$file; // Đường dẫn tới file

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

            
           
            default:
            
            break;
        }
        require_once('view/admin/v_admin_layout.php');
    }
?>