<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table_trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-add-khoa.css">   
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-add-loaiVB.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">
</head>



<div class="content">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Tổng hợp</h2>
        </div>
         <a href="<?=$base_url?>page_user/trangchu"><i class="fa-solid fa-arrow-right"></i> <span>Trang người dùng</span></a>
    </div>

    <div class="card-container">
        <div class="card-wrapper">
          <a href="<?=$base_url?>phong/home_admin">
            <div class="card-1 light-red">
                <div class="card-header">
                    <div class="amount">
                        <span class="title-card">Văn bản chung</span>
                        <span class="amount-value"><?=$tong_vb_chung?></span>
                    </div>
                    <i class="fa-regular fa-file-lines icon"></i>
                </div>
            </div>
          </a>

          <a href="<?=$base_url?>khoa/home_admin">
            <div class="card-1 light-purple">
                <div class="card-header">
                    <div class="amount">
                        <span class="title-card">Văn bản khoa</span>
                        <span class="amount-value"><?=$tong_vb_khoa?></span>
                    </div>
                    <i class="fa-solid fa-file-lines icon dark-purple"></i>
                    
                </div>
            </div>
          </a>

          <a href="">
            <div class="card-1 light-green">
                <div class="card-header">
                    <div class="amount">
                        <span class="title-card">Loại văn bản</span>
                        <span class="amount-value"><?=$tong_loaivb?></span>
                    </div>
                    <i class="fa-regular fa-folder-open icon dark-green"></i>
                    
                </div>
            </div>
          </a>

          <a href="<?=$base_url?>taikhoan/home_admin">
            <div class="card-1 light-blue">
                <div class="card-header">
                    <div class="amount">
                        <span class="title-card">Tài khoản</span>
                        <span class="amount-value"><?=$tong_user?></span>
                    </div>
                    <i class="fa-solid fa-user icon dark-blue"></i>
                </div>
            </div>
          </a>
        </div>
    </div>

    <div class="header-wrapper m-top-2">
        <div class="header-title">
            <h2>Quản lý khoa</h2>
        </div>
    </div>

     
    <div class="card-container">
        <div class="main-table">
            <div class="tb-khoa">
                <div class="table_header">
                            <button type="button" id="open_modal_khoa" class="add_new">
                                + Thêm khoa
                            </button>
                        
                            <!--Modal start-->
                            <div class="modal-container-addKhoa" id="modal-container-addKhoa">
                                <div class="modal-addKhoa">
                                    <div class="modal-header-addKhoa">
                                        <h2>Thêm khoa</h2>
                                        <i class="fa fa-close" id="close-icon-addKhoa"></i>
                                    </div>
                                    <div class="modal-content-addKhoa">
                                        <div class="admin-add-form">
                                            <form  method="post" id="form_add_Khoa">
                                                <input type="text" name="tenkhoa" id="ten_Khoa" placeholder="Nhập khoa mới" class="box">  
                                              
                                                <div class="modal-footer-addKhoa">
                                                    <button type="submit" name="confirm_addKhoa" class="btn-confirm-addKhoa" id="btn_add_Khoa">Xác nhận</button>
                                                </div>                                                                                                                                                                                         
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--Modal end-->    

                            <!-- Modal edit start-->
                                <!-- <div class="modal-container-editKhoa" id="modal-container-editKhoa">
                                    <div class="modal-editKhoa">
                                        <div class="modal-header-editKhoa">
                                            <h2>Đổi tên khoa</h2>
                                            <i class="fa fa-close" id="close-icon-editKhoa"></i>
                                        </div>
                                        <div class="modal-content-editKhoa">
                                            <div class="admin-add-form">
                                                <form action="" method="post">
                                                    <input type="text" name="" id="" placeholder="Nhập khoa mới" class="box">                                                                                                                                                                                              
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer-editKhoa">
                                            <button type="submit" class="btn-confirm-editKhoa" id="confirm_modal_editKhoa">Xác nhận</button>
                                        </div>
                                    </div>
                                  </div> -->
                              <!--Modal edit end  -->
                </div>
                <div class="tb-sec-khoa">
                    <table>
                        <thead>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Tên khoa</th>                                                      
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;  foreach($dskhoa as $khoa): ?> 
                            <tr>
                                <td><?=$i?></td>
                                <td class="tenKhoa" data-id2="<?php echo $khoa['id']; ?>" contenteditable spellcheck="false">
                                    <?=$khoa['tenkhoa']?>
                                </td>
                                <td>
                                    <!-- <button type="button" id="open_modal_editKhoa"><i class="fa-solid fa-pen-to-square"></i></button> -->
                                     
                                    <button onclick="deleteKhoa(<?=$khoa['id']?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                                
                            </tr>
                        <?php $i++; endforeach; ?>  
                        </tbody>
                        
                    </table>
                </div>  
            </div>     
        </div>
    </div>

    <div class="header-wrapper m-top-2">
        <div class="header-title">
            <h2>Loại văn bản</h2>
        </div>
    </div>

    <div class="card-container">
        <div class="main-table">
            <div class="table-loaivb">
                <div class="table_header">
                            <button type="button" id="open_modal_loaiVB" class="add_new">
                                + Thêm loại văn bản
                            </button>
                        
                            <!--Modal start-->
                            <div class="modal-container-addLoaiVB" id="modal-container-loaiVB">
                                <div class="modal-addLoaiVB">
                                    <div class="modal-header-addLoaiVB">
                                        <h2>Thêm loại văn bản</h2>
                                        <i class="fa fa-close" id="close-icon-addLoaiVB"></i>
                                    </div>
                                    <div class="modal-content-addLoaiVB">
                                        <div class="admin-add-form">
                                            <form method="post" id="form_add_loaiVB">
                                                <input type="text" name="loaivanban" id="ten_loaiVB" placeholder="Nhập loại văn bản mới" class="box">   
                                                
                                                <div class="modal-footer-addLoaiVB">
                                                    <button type="submit" name="confirm_addLoaiVB" id="btn_add_loaiVB" class="btn-confirm-addLoaiVB">Xác nhận</button>
                                                </div>                                                                                                                                                        
                                            </form>
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--Modal end-->        

                            <!--Modal edit start-->
                            <!-- <div class="modal-container-editLoaiVB" id="modal-container-editLoaiVB">
                                <div class="modal-editLoaiVB">
                                    <div class="modal-header-editLoaiVB">
                                        <h2>Sửa loại văn bản</h2>
                                        <i class="fa fa-close" id="close-icon-editLoaiVB"></i>
                                    </div>
                                    <div class="modal-content-editLoaiVB">
                                        <div class="admin-add-form">
                                            <form action="" method="post">
                                                <input type="text" name="" id="" placeholder="Nhập loại văn bản mới" class="box">                                                                                                                                                                                              
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer-editLoaiVB">
                                        <button type="submit" class="btn-confirm-editLoaiVB" id="confirm_modal_editLoaiVB">Xác nhận</button>
                                    </div>
                                </div>
                            </div> -->
                              <!--Modal edit end--> 
                </div>

                <div class="table-section-loaivb">
                    <table>
                        <thead>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Loại văn bản</th>                                                                    
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i=1;  foreach($dsLoaiVanBan as $lvb): ?> 
                            <tr>
                                <td><?=$i?></td>
                                <td class="tenloaiVB" data-id1="<?php echo $lvb['id']; ?>" contenteditable spellcheck="false">
                                    <?=$lvb['loaivanban']?>
                                </td>
                                <td>
                                    <!-- <button class="open_modal_editLoaiVB" data-id="<?$lvb['id']?>"><i class="fa-solid fa-pen-to-square"></i></button> -->
                                    <button onclick="deleteTypeDocument(<?=$lvb['id']?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++;  endforeach; ?> 
                           
                        </tbody>
                    </table>
                </div> 
            </div>     
        </div>
    </div>
</div>

<script src="<?=$base_url?>template/Script/script-modal-Khoa.js"></script>
<script src="<?=$base_url?>template/Script/script-modal-LoaiVB.js"></script>


<script>
    function deleteKhoa(id){
        var kq = confirm("Bạn có muốn xoá khoa này không");
        if( kq ){
            window.location = '<?=$base_url?>khoa/delete/'+id;
        }
    }
</script>

<script>
    function deleteTypeDocument(id){
        var kq = confirm("Bạn có muốn xoá loại văn bản này không");
        if( kq ){
            window.location = '<?=$base_url?>page/delete_loaiVB/'+id;
        }
    }
</script>

<!-- ADD KHOA -->
<script type="text/javascript">
    $(document).ready(function(){
        

        $('#btn_add_Khoa').on('click', function(){
            var ten_Khoa = $('#ten_Khoa').val();

            if(ten_Khoa == '') {
            alert('Bạn chưa nhập tên khoa');

            }else {
                $.ajax({
                    url: "<?=$base_url?>page/add_khoa",
                    method: "POST",
                    data:{ten_Khoa:ten_Khoa},
                    success: function(data) {
                        
                        alert('Thêm thành công !');
                        
                    }
                });
            }
        });
    });
</script>


<!-- ADD LOAIVB -->
<script type="text/javascript">
    $(document).ready(function(){
        

        $('#btn_add_loaiVB').on('click', function(){
            var ten_loaiVB = $('#ten_loaiVB').val();

            if(ten_loaiVB == '') {
            alert('Bạn chưa nhập tên loại văn bản');

            }else {
                $.ajax({
                    url: "<?=$base_url?>page/add_loaiVB",
                    method: "POST",
                    data:{ten_loaiVB:ten_loaiVB},
                    success: function(data) {
                        
                        alert('Thêm thành công !');
                        
                    }
                });
            }
        });
    });
</script>


<!-- EDIT KHOA -->
<script>
    function edit_khoa(id, text, column_name) {
        $.ajax({
                    url: "<?=$base_url?>page/edit_khoa",
                    method: "POST",
                    data:{id:id, text:text, column_name:column_name},
                    success: function(data) {
                        
                        alert('Chỉnh sửa thành công !');
                        
                    }
                });
    }
    $(document).on('blur','.tenKhoa',function() {
        var id = $(this).data('id2');
        var text = $(this).text().trim();

        edit_khoa(id, text, "tenkhoa");
    })

</script>


<!-- EDIT LOAIVB -->
<script>
    function edit_loaiVB(id, text, column_name) {
        $.ajax({
                    url: "<?=$base_url?>page/edit_loaiVB",
                    method: "POST",
                    data:{id:id, text:text, column_name:column_name},
                    success: function(data) {
                        
                        alert('Chỉnh sửa thành công !');
                        
                    }
                });
    }
    $(document).on('blur','.tenloaiVB',function() {
        var id = $(this).data('id1');
        var text = $(this).text().trim();

        edit_loaiVB(id, text, "loaivanban");
    })

</script>









