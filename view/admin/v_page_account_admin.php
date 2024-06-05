<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-user.css">
   
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
                        
                            <!--Modal ADD start-->
                            <div class="modal-container-addUser" id="modal-container-addUser">
                                <div class="modal-addUser">
                                    <div class="modal-header-addUser">
                                        <h2>Thêm tài khoản</h2>
                                        <i class="fa fa-close" id="close-icon-addUser"></i>
                                    </div>
                                    <div class="modal-content-addUser">
                                        <div class="admin-add-form">
                                            <form action="<?=$base_url?>taikhoan/add_account" method="post" id="form_add_account">
                                                <input type="text" name="taikhoan" placeholder="Nhập tên đăng nhập" class="box">
                                                <input type="password" name="matkhau" placeholder="Nhập mật khẩu" class="box">
                                                <input type="email" name="mail" placeholder="Nhập email" class="box">
                                                
                                                <select class="box" name="loaitaikhoan">
                                                    <option value="" selected>-- Chọn quyền --</option>
                                                    <option value="0">Người dùng</option>
                                                    <!-- <option value="1">Quản trị viên</option> -->
                                                    <option value="2">Quản lý</option>
                                                </select>
                                                <select class="box" name="idkhoa">
                                                <option value="" selected>-- Chọn khoa --</option>
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
                            <!--Modal ADD end-->   
                            
                            <!--Modal EDIT start-->
                            <div class="modal-container-addUser" id="modal-container-editUser">
                                <div class="modal-addUser">
                                    <div class="modal-header-addUser">
                                        <h2>Sửa tài khoản</h2>
                                        <i class="fa fa-close" id="close-icon-editUser"></i>
                                    </div>
                                    <div class="modal-content-addUser">
                                        <div class="admin-add-form">
                                            <form action="<?=$base_url?>taikhoan/update_account" method="post" id="form_edit_account">
                                                <input type="hidden" name="iduser" id='iduser'>
                                                <input type="text" name="taikhoan" id="name_user" placeholder="Nhập tên đăng nhập" class="box">
                                                <input type="password" name="matkhau" id="password_user" placeholder="Nhập mật khẩu" class="box">
                                                <input type="email" name="mail" id="mail_user" placeholder="Nhập email" class="box">
                                                
                                                <select class="box" name="loaitaikhoan" id="role_user">
                                                    <option value="" selected>-- Chọn quyền --</option>
                                                    <option value="0">Người dùng</option>
                                                    <!-- <option value="1">Quản trị viên</option> -->
                                                    <option value="2">Quản lý</option>
                                                </select>
                                                <select class="box" name="idkhoa" id="khoa_user">
                                                <option value="" selected>-- Chọn khoa --</option>
                                                    <?php
                                                    foreach ($dskhoa as $khoa) {
                                                            
                                                            echo '<option value="'.$khoa['id'].'">'.$khoa['tenkhoa'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                
                                                <div class="modal-footer-addUser">
                                                    <button type="submit" name="confirm_modal_addUser" class="btn-confirm-addUser" id="confirm_modal_editUser">Xác nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--Modal EDIT end-->  
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th style="display: none;"></th>
                                <th>Số thứ tự</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Khoa</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($dsTK as $tk): ?> 
                            <tr>
                                <td class="id_user" style="display: none;">
                                    <?php echo $tk['iduser']?>
                                </td>
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
                                <?php
                                    if ($tk['trangthai']==1) {
                                        echo '<p class="text-active">
                                        <a href="'.$base_url.'taikhoan/status/'.$tk['iduser'].'&status=0">Hoạt động</a>
                                        </p>';
                                    } 
                                    else
                                    {
                                        echo '<p class="text-unactive">
                                        <a href="'.$base_url.'taikhoan/status/'.$tk['iduser'].'&status=1">Dừng hoạt động</a>
                                        </p>';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <button type="button" class="open_modal_editUser"><i class="edit-btn fa-solid fa-pen-to-square"></i></button>
                                    <button onclick="deleteUser(<?=$tk['iduser']?>)"><i class="edit-btn fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++; endforeach; ?>
                        </tbody>
                        
                    </table>
                </div>
                <!-- <div class="Pagination">
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
                </div>   -->
            </div>     
        </div>
    </div> 
</div>
<?php if (isset($_SESSION['thongbao'])):?>
    <figure class="notification">
        <div class="notification__body">
            <div class="notification__description">
                <div class="icon__wrapper">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 6l12 12m0 -12l-12 12"></path>
                </svg>

                </div>                    
                <?= $_SESSION['thongbao']?>
            </div> 
        </div>
        <div class="notification__progress"></div>
    </figure>
    <?php unset($_SESSION['thongbao']); ?>
<?php endif?>   
<?php if (isset($_SESSION['success'])):?>
    <figure class="notification-success">
        <div class="notification__body">
            <div class="notification__description">
                <div class="icon__wrapper">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>

                </div>                    
                <?= $_SESSION['success']?>
            </div> 
        </div>
        <div class="notification__progress_success"></div>
    </figure>
    <?php unset($_SESSION['success']); ?>
<?php endif?>   
<script>
    function deleteUser(id){
        var kq = confirm("Bạn có muốn xoá tài khoản này không");
        if( kq ){
            window.location = '<?=$base_url?>taikhoan/delete/'+id;
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="<?=$base_url?>template/Script/script-modal-eidtUser.js"></script>
<script src="<?=$base_url?>template/Script/script-modal-addUser.js"></script>
<script src="<?=$base_url?>template/Script/validation_form_addTK.js"></script>




<script>
    $(document).ready(function() { 
        $('.open_modal_editUser').on('click', function(e) {
            e.preventDefault();
            var id_user = $(this).closest('tr').find('.id_user').text();  
            // console.log(id_user);

            $.ajax({
                method: "POST",
                url: "<?=$base_url?>taikhoan/edit_user",
                data: {
                    'click_edituser_btn': true,
                    'id_user':id_user,
                },
                success: function(response) { 
                    // alert('Cập nhật thành công !');
                    $.each(response, function(Key, Value) { 
                        // console.log(Value['taikhoan']);
                        $('#iduser').val(Value['iduser']);
                        $('#name_user').val(Value['taikhoan']);
                        $('#password_user').val(Value['matkhau']);
                        $('#mail_user').val(Value['mail']);
                        $('#role_user').val(Value['loaitaikhoan']);
                        $('#khoa_user').val(Value['idkhoa']);
                       
                    });

                }
            });
        });
    });        
</script>