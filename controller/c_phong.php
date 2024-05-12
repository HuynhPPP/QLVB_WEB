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
                
                if( isset($_POST["From"], $_POST["to"], $_POST['id_phong'])) 
                {
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');
                    $id_phong = $_POST['id_phong'];
                    $start_day = $_POST["From"];
                    $end_day = $_POST["to"];
                    $base_url_2 = 'http://localhost/QLVB/';

                    // echo "From: " . $start_day . "<br>";
                    // echo "To: " . $end_day . "<br>";
                    // echo "ID Phong: " . $id_phong . "<br>";

                    $result = '';
                    $query = "SELECT * FROM vanban_chung, phong  
                            WHERE vanban_chung.idphong = phong.id AND vanban_chung.idphong='".$id_phong."' 
                            AND vanban_chung.ngaydang BETWEEN '".$start_day."' AND '".$end_day."'";
                    $sql = mysqli_query($conn, $query);
                   
                    $result .='
                        <p class="title-result">Kết quả tìm kiếm</p>
                        <div class="box-result-search">
                    ';
                    if(mysqli_num_rows($sql) > 0)
                    {
                        while($row = mysqli_fetch_array($sql))
                        {
                            $result .='
                            <div class="box-content">
                                <div class="document-content">
                                    <div class="title"><a href="'.$base_url_2.'phong/content/'.$row['idvb_chung'].'">'.$row['tenvanban'].'</a></div>
                                    <div class="date-post">
                                        <span class="block-1"><i class="fa fa-regular fa-clock"></i> Đăng ngày <span>'.$row['ngaydang'].'</span></span>
                                        <i class="fa fa-solid fa-user-tie"></i> <span>Quản trị viên</span>
                                    </div>
                                    <p class="text-main-title">Nội dung chính</p>
                                    <p class="text-main">'.$row['noidung'].'</p>
                                    <a href="'.$base_url_2.'phong/content/'.$row['idvb_chung'].'"><button class="button-6" role="button">Chi tiết</button></a>
                                </div>
                            </div>
                                ';
                        }
                    }
                    else
                    {
                        $result .='
                        
                            <script> alert("Không tìm thấy kết quả trả về !"); </script>
                        
                        ';
                    }
                    $result .='</div>';
                    echo $result;
                }
                
                break;

            case 'search_vanban_phong_name':             
                require_once 'model/m_phong.php'; 
                if( isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];  
                } if(isset($_POST['keyword_vb_phong']) && !empty($_POST['keyword_vb_phong'])) {
                    $keyword = $_POST['keyword_vb_phong'];  
                } else {
                    $keyword = '';
                    $_SESSION['thongbao'] = 'Không tìm thấy kết quả tìm kiếm hoặc bạn chưa nhập từ khoá !';
                }

                $dsvb_phong_result = search_vanban_phong($keyword, $id);
                $phong =  getByIdPhong($id); 
                
                $view_name ="search_vanban_phong";
                require_once('view/user/v_user_layout.php');
                break;
             

        // --- USER --- 





        // --- ADMIN ---
            case 'home_admin':
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php';
                $dsphong = getAllPhong();
                $dsLoaiVanBan = document_getAllLoaiVanBan();
                $ds_vb_chung = getAll_VB_chung();
                $view_name = 'page_admin_vbphong';
                require_once('view/admin/v_admin_layout.php');
                break;

            case 'add_vb_phong':
                require_once 'model/m_document.php'; 
                require_once 'model/m_phong.php';
                if  (isset($_POST['confirm_modal_addVB_phong'])) {
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
                header('Location: '.$base_url.'phong/home_admin');    
                require_once('view/admin/v_admin_layout.php'); 
                break;


            case 'edit_vanban_phong':
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php';
            
                if ( isset($_POST['click_edit_btn'])) {
                    $id = $_POST['idvb'];
                    $arr_result = [];
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');

                    /* echo $id; */
                    $fetch_query = "SELECT * FROM vanban_chung WHERE idvb_chung='$id'";
                    $fetch_query_run = mysqli_query($conn, $fetch_query);

                    if (mysqli_num_rows($fetch_query_run) > 0) {
                        while ($row = mysqli_fetch_array($fetch_query_run)){
                            array_push($arr_result, $row);
                            header('content-type: application/json');
                            echo json_encode($arr_result);
                        }
                    }
                }
                break;

            case 'update_vb_phong':
                require_once 'model/m_document.php';
                require_once 'model/m_phong.php';

                if(isset($_POST['confirm_modal_editVB_phong'])) {
                    $id = $_POST['idvb'];
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['idloaivb'];
                    $phong = $_POST['idphong'];
                    $ngayky = $_POST['ngaydang'];
                    $file = $_FILES['file']['name'];

                    if($file!=""){
                    $target_dir = "upload/file_phong/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    }else{
                        $file="";
                    }
                    editVanBan_chung($tieude, $noidung, $loaivb, $phong, $ngayky, $file, $id);
                }
                header('Location: '.$base_url.'phong/home_admin');    
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

            case 'delete':
                require_once 'model/m_phong.php';               
                deletePhong($_GET['id']);
                header('Location: '.$base_url.'phong/home');    
                require_once('view/v_admin_layout.php');                
                break;

            case 'delete_vanban_phong':
                require_once 'model/m_phong.php';               
                document_deleteVB_chung($_POST['id']);
                              
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