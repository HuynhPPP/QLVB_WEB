<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-vbchung.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/pagination-style-admin.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>



<div class="content-2">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Danh sách văn bản chung</h2>
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
                    <form action="<?=$base_url?>vanban/filter_date_vbphong" class="frm_search_date" method="post">
                        <div class="form-search-date">
                            <input type="text" class="date-start" name="ngaybatdau" id="start-date-2" placeholder="Ngày bắt đầu"/>
                            <input type="text" class="date-end" name="ngayketthuc" id="end-date-2" placeholder="Ngày kết thúc"/>
                            <button class="btn-filter" name="filter_vbphong">
                                <span><i class="fa-solid fa-sort"></i> Lọc</span>
                            </button>
                        </div>
                    </form> 

                    <form class="frm_search_title" action="<?=$base_url?>vanban/search_vbPhong" method="post">
                            <input type="hidden" data-idvb="<?php echo $idvb_chung ?>">
                            <div class="form-search-name">
                                <input  placeholder="Nhập tên văn bản" class="input_search" name="key_word_vbphong">
                                <button class="btn_search" type="submit" name="btn_search_key">Tìm kiếm</button>
                            </div>
                            <button type="button" id="open_modal_addVBPhong" class="add_new">
                                + Thêm văn bản
                            </button>
                    </form> 
                    <!--Modal start-->
                        <div class="modal-container-addVB" id="modal-container-addVBPhong">
                            <div class="modal-addVB">
                                <div class="modal-header-addVB">
                                    <h2>Thêm văn bản</h2>
                                    <i class="fa fa-close" id="close-icon-addVBPhong"></i>
                                </div>
                                <div class="modal-content-addVB">
                                    <div class="admin-add-form">
                                        <form action="<?=$base_url?>phong/add_vb_phong" method="post" enctype="multipart/form-data" id="form-add-vbphong">
                                            <input type="text" name="tieude" id="tieude_vbphong" placeholder="Nhập tiêu đề" class="box">
                                            <textarea name="noidung" id="noidung_vbphong" cols="20" rows="5" placeholder="Nhập nội dung" class="box"></textarea>
                                            <select name="idloaivb" id="id_loaivanban_phong" class="box">
                                                <option value="">--Chọn loại văn bản--</option>
                                                <?php
                                                    foreach ($dsLoaiVanBan as $lvb) {
                                                        echo '<option value="'.$lvb['id'].'">'.$lvb['loaivanban'].'</option>';
                                                    }
                                                ?>
                                            </select>

                                            <select name="idphong" id="id_phong_vbphong" class="box">
                                                <option value="">--Chọn phòng--</option>
                                                <?php
                                                    foreach ($dsphong  as $phong) {
                                                        echo '<option value="'.$phong['id'].'">'.$phong['tenphong'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            
                                            <label for="date" class="lb">Ngày đăng :</label>
                                                <input type="date" id="ngaydang_vbkhoa" name="ngayky" value="<?php 
                                                                                                                    $date = date('Y-m-d');
                                                                                                                    $date_formatted = date('d-m-Y', strtotime($date)); 
                                                                                                                    echo $date; ?>" 
                                                                                                                    class="box" readonly/>
                                            <label for="file" class="lb">Chọn file :</label>
                                            <input type="file" name="file" id="" class="box">

                                            <div class="modal-footer-addVB">
                                                <button type="submit" name="confirm_modal_addVB_phong" class="btn-confirm-addVB" id="confirm_modal_addVBPhong">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <!--Modal end-->

                    <!--Modal EDIT start-->
                    <div class="modal-container-addVB" id="modal-container-editVBPhong">
                            <div class="modal-addVB">
                                <div class="modal-header-addVB">
                                    <h2>Sửa văn bản</h2>
                                    <i class="fa fa-close" id="close-icon-editVBPhong"></i>
                                </div>
                                <div class="modal-content-addVB">
                                    <div class="admin-add-form">
                                        <form action="<?=$base_url?>phong/update_vb_phong" method="post" enctype="multipart/form-data" id="form-edit-vbphong">
                                            <input type="hidden" name="idvb" id='idvb'>
                                            <input type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề" class="box">
                                            <textarea name="noidung" id="noidung" cols="20" rows="5" placeholder="Nhập nội dung" class="box"></textarea>
                                            <select name="idloaivb" id="tenloaivb" class="box">
                                                <option value="">--Chọn loại văn bản--</option>
                                                <?php
                                                    foreach ($dsLoaiVanBan as $lvb) {
                                                        echo '<option value="'.$lvb['id'].'">'.$lvb['loaivanban'].'</option>';
                                                    }
                                                ?>
                                            </select>

                                            <select name="idphong" id="tenphong" class="box">
                                                <option value="">--Chọn phòng--</option>
                                                <?php
                                                    foreach ($dsphong  as $phong) {
                                                        echo '<option value="'.$phong['id'].'">'.$phong['tenphong'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            
                                            <label for="date" class="lb">Ngày đăng :</label>
                                            <input type="date" id="ngaydang" name="ngaydang" placeholder="Chọn ngày đăng" value="" min="2018-01-01" max="2024-12-31" class="box"/>
                                            <p>file hiện tại: </p>
                                            <label for="file" id="file" class="lb file_now"></label>
                                            <input type="file" name="file" id="file" class="box">
                                            <input type="checkbox" name="delete_file" id="delete_file"> <label for="delete_file">Xóa file hiện tại</label>

                                            <div class="modal-footer-addVB">
                                                <button type="submit" name="confirm_modal_editVB_phong" class="btn-confirm-addVB" id="confirm_modal_editVBPhong">Xác nhận</button>
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
                                <th>Tên văn bản</th>
                                <th>Thể loại</th>
                                <th>Ngày đăng</th>
                                <th>Tệp tin</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;  foreach($ds_vb_chung as $vb): ?> 
                            <tr>
                                <td class="idvb_chung" style="display: none;">
                                    <?php echo $vb['idvb_chung']?>
                                </td>
                                <td><?=$i?></td>
                                <td>
                                    <a href="<?=$base_url?>phong/content_admin/<?=$vb['idvb_chung']?>"><?=$vb['tenvanban']?></a>
                                </td>
                                <td> <?=$vb['loaivanban']?></td>
                                <td><?=$vb['formatted_ngaydang']?></td>
                                <td>
                                    <a href="<?=$base_url?>/phong/download_file_phong/<?=$vb['file']?>"><?=$vb['file']?></a>
                                </td>
                                <td>
                                    <button type="button" class="open_modal_editVBPhong"><i class="edit-btn fa-solid fa-pen-to-square"></i></button>
                                    <button onclick="deleteDocument(<?=$vb['idvb_chung']?>)"><i class="edit-btn fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++;  endforeach; ?>
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
    function deleteDocument(id){
        var kq = confirm("Bạn có muốn xoá văn bản này không");
        if( kq ){
            window.location = '<?=$base_url?>phong/delete_vanban_chung/'+id;
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="<?=$base_url?>template/Script/script-modal_add_vbphong.js"></script>
<script src="<?=$base_url?>template/Script/script-modal_edit_vbphong.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="<?=$base_url?>template/Script/validation_form_vbphong.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<script>
        CKEDITOR.replace( 'noidung_vbphong' );
</script>

<script>
        CKEDITOR.replace( 'noidung' );
</script>

<script>
    $(document).ready(function() { 
        $('.open_modal_editVBPhong').on('click', function(e) {
            e.preventDefault();
            var idvb = $(this).closest('tr').find('.idvb_chung').text();  
            console.log(idvb);

            $.ajax({
                method: "POST",
                url: "<?=$base_url?>phong/edit_vanban_phong",
                data: {
                    'click_edit_btn': true,
                    'idvb':idvb,
                },
                success: function(response) { 
                    // console.log(response);
                    $.each(response, function(Key, Value) { 
                        // console.log(Value['idvb']);
                        $('#idvb').val(Value['idvb_chung']);
                        $('#tieude').val(Value['tenvanban']);
                        CKEDITOR.instances['noidung'].setData(Value['noidung']); // Set data for CKEditor
                        $('#tenloaivb').val(Value['id_loaivanban']);
                        $('#tenphong').val(Value['idphong']);
                        $('#ngaydang').val(Value['ngaydang']);
                        $('#file').text(Value['file']);
                    });

                }
            });
        });
    });        
</script>

<!--Modal FILTER DATE end-->    
<script>
      $(document).ready(function() { 
        $.datepicker.setDefaults({
            dateFormat: 'dd-mm-yy'
        });
        $(function() {
            $("#start-date-2").datepicker();
            $("#end-date-2").datepicker();
        });

       
});
</script>
<!--Modal FILTER DATE end--> 