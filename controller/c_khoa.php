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


            case 'search_vanban_khoa_date':             
                require_once 'model/m_khoa.php'; 
                
                if( isset($_POST["From"], $_POST["to"], $_POST['idkhoa'])) 
                {
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');
                    $id_khoa = $_POST['idkhoa'];
                    $start_day = $_POST["From"];
                    $end_day = $_POST["to"];
                    $base_url_2 = 'http://localhost/QLVB/';

                    // echo "From: " . $start_day . "<br>";
                    // echo "To: " . $end_day . "<br>";
                    // echo "ID Phong: " . $id_phong . "<br>";

                    $result = '';
                    $query = "SELECT * FROM vanban, khoa  
                            WHERE vanban.idkhoa = khoa.id AND vanban.idkhoa='".$id_khoa."' 
                            AND vanban.ngaydang BETWEEN '".$start_day."' AND '".$end_day."'";
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
                                    <div class="title"><a href="'.$base_url_2.'khoa/content/'.$row['idvb'].'">'.$row['tieude'].'</a></div>
                                    <div class="date-post">
                                        <span class="block-1"><i class="fa fa-regular fa-clock"></i> Đăng ngày <span>'.$row['ngaydang'].'</span></span>
                                        <i class="fa fa-solid fa-user-tie"></i> <span>Quản trị viên</span>
                                    </div>
                                    <p class="text-main-title">Nội dung chính</p>
                                    <p class="text-main">'.$row['noidung'].'</p>
                                    <a href="'.$base_url_2.'khoa/content/'.$row['idvb'].'"><button class="button-6" role="button">Chi tiết</button></a>
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
                if (isset($_POST['confirm_modal_addVB_khoa'])) {
                    
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

                    
                    
                }
                header('Location: '.$base_url.'khoa/home_admin');    
                require_once('view/admin/v_admin_layout.php'); 
                break;

            case 'edit_vb_khoa':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';
               

                if ( isset($_POST['click_edit_btn'])) {
                    $id = $_POST['idvb'];
                    $arr_result = [];
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');

                    /* echo $id; */
                    $fetch_query = "SELECT * FROM vanban WHERE idvb='$id'";
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

            case 'update_vb_khoa':
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php';

                if(isset($_POST['confirm_modal_editVB_khoa'])) {
                    $id = $_POST['idvb'];
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $loaivb = $_POST['idloaivb'];
                    $khoa = $_POST['idkhoa'];
                    $ngayky = $_POST['ngaydang'];
                    $file = $_FILES['file']['name'];

                    if($file!=""){
                    $target_dir = "upload/file_khoa/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    }else{
                        $file="";
                    }
                    edit_vbkhoa($tieude, $noidung, $loaivb, $khoa, $ngayky, $file, $id);
                }
                header('Location: '.$base_url.'khoa/home_admin');    
                require_once('view/admin/v_admin_layout.php'); 
                break;

           

            case 'admin_search_vanban_khoa':             
                require_once 'model/m_document.php';
                require_once 'model/m_khoa.php'; 

                if( isset($_POST["From"], $_POST["to"])) 
                {
                    $ds_vb_khoa = getAll_VB_khoa();
                    $conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');
                    $start_day = $_POST["From"];
                    $end_day = $_POST["to"];
                    // $link_content = "$base_url_2/phong/content/$idvb_chung";

                    // echo "From: " . $start_day . "<br>";
                    // echo "To: " . $end_day . "<br>";
                    // echo "ID Phong: " . $id_phong . "<br>";

                    $result = '';
                    $query = "SELECT * FROM vanban WHERE ngaydang BETWEEN '".$start_day."' AND '".$end_day."'";
                    $sql = mysqli_query($conn, $query);
                   
                    $result .='
                        <table>
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th>Số thứ tự</th>
                                    <th>Tên văn bản</th>
                                    <th>Thể loại</th>
                                    <th>Khoa</th>
                                    <th>Ngày đăng</th>
                                    <th>Tệp tin</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                    ';
                    if(mysqli_num_rows($sql) > 0)
                    {
                        while($row = mysqli_fetch_array($sql))
                        {
                                                
                            $result .='
                                <tbody>
                                    <tr>
                                        <td class="idvb_khoa" style="display: none;">'.$row['idvb'].'</td>
                                        <td>' .$row['idvb'].'</td>
                                        <td>
                                            <a>'.$row['tieude'].'</a>
                                        </td>
                                        <td>'.$row['loaivanban'].'</td>
                                        <td>'. $row['tenkhoa'].'</td>
                                        <td>'. $row['ngaydang'].'</td>
                                        <td>
                                            <a>'.$row['file'].'</a>
                                        </td>
                                        <td>
                                            <button type="button" class="open_modal_editVBKHOA" data-idvb="'.$row['idvb'].'">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button onclick="deleteDocument('.$row['idvb'].')"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>';
                                
                        }
                    }
                    else
                    {
                        $result .='
                        
                            <script> alert("Không tìm thấy kết quả trả về !"); </script>
                        
                        ';
                    }
                    $result .='</table>';
                    echo $result;
                }
                
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

            case 'delete_search_vbkhoa':
                require_once 'model/m_khoa.php';              
                documentKhoa_delete($_POST['id']);
                
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