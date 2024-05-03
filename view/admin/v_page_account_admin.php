<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-user.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/pagination-style-admin.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-add-user.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">
</head>


<div class="content-2">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Danh sách tài khoản</h2>
        </div>
        <!-- <div class="breadcrumb">
            <ul class="breadcrumb_list">
              <li class="li-1"><a href='#'>Danh sách văn bản</a></li>
              <li><a href=''>Quản lý khoa</a></li>
            </ul>
          </div> -->
    </div>

    <div class="card-container">
        <div class="main-table">
            <div class="table">
                <div class="table_header">
                            <button type="button" id="open_modal_addUser" class="add_new">
                                + Thêm tài khoản
                            </button>
                        
                            <!--Modal start-->
                            <div class="modal-container-addUser" id="modal-container-addUser">
                                <div class="modal-addUser">
                                    <div class="modal-header-addUser">
                                        <h2>Thêm tài khoản</h2>
                                        <i class="fa fa-close" id="close-icon-addUser"></i>
                                    </div>
                                    <div class="modal-content-addUser">
                                        <div class="admin-add-form">
                                            <form action="<?=$base_url?>taikhoan/add" method="post">
                                                <input type="text" name="taikhoan" placeholder="Nhập tên đăng nhập" class="box">
                                                <input type="password" name="matkhau" placeholder="Nhập mật khẩu" class="box">
                                                <input type="email" name="mail" placeholder="Nhập email" class="box">
                                                
                                                <select class="box" name="loaitaikhoan">
                                                    <option value="0" selected>Người dùng</option>
                                                    <option value="1">Quản trị viên</option>
                                                    <option value="2">Quản lý</option>
                                                </select>
                                                <select class="box" name="idkhoa">
                                                <option selected>Chọn khoa</option>
                                                    <?php
                                                    foreach ($dskhoa as $khoa) {
                                                            
                                                            echo '<option value="'.$khoa['id'].'">'.$khoa['tenkhoa'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                
                                                <div class="modal-footer-addUser">
                                                    <button type="submit" name="confirm_modal_addUser" class="btn-confirm-addUser" id="confirm_modal_addUser">Xác nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--Modal end-->        
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Khoa</th>
                                <th>Vai trò</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($dsTK as $tk): ?> 
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$tk['taikhoan']?></td>
                                <td><?=$tk['mail']?></td>
                                <td><?=$tk['tenkhoa']?></td>
                                <td>
                                <?php
                                    switch ($tk['loaitaikhoan']) {
                                        case '0': 
                                            echo'Người dùng';
                                            break;
                                    
                                        case '1':                     
                                            echo'Quản trị viên';
                                            break;  
                                          
                                        case '2':
                                            echo'Quản lý';
                                            break;                     
                                        default;
                                    }
                                ?>    
                                </td>
                                <td>
                                    <button type="button" id="open_modal"><a href=""></a><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button onclick="deleteUser(<?=$tk['iduser']?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++; endforeach; ?>
                        </tbody>
                        
                    </table>
                </div>
                <div class="Pagination">
                    <button class="btn1" onclick="backBtn()"> <img src="<?=$base_url?>template/img/img_new/448-arrow.png" alt=""> Trước</button>
                    <ul class="pagination-ul">
                        <li class="link active" value="1" onclick="activeLink()">1</li>
                        <li class="link" value="2" onclick="activeLink()">2</li>
                        <li class="link" value="3" onclick="activeLink()">3</li>
                        <li class="link" value="4" onclick="activeLink()">4</li>
                        <li class="link" value="5" onclick="activeLink()">5</li>
                        <li class="link" value="6" onclick="activeLink()">6</li>
                    </ul>
                    <button class="btn2" onclick="nextBtn()">Sau <img src="<?=$base_url?>template/img/img_new/448-arrow.png" alt=""></button>
                </div>  
            </div>     
        </div>
    </div> 
</div>
<script>
    function deleteUser(id){
        var kq = confirm("Bạn có muốn xoá tài khoản này không");
        if( kq ){
            window.location = '<?=$base_url?>taikhoan/delete/'+id;
        }
    }
</script>

<script src="<?=$base_url?>template/Script/script-modal-addUser.js"></script>