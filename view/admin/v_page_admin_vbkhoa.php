<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-khoa.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/pagination-style-admin.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>

<?php
    if(is_array($dskhoa)) {
        extract($dskhoa);
    }    
?>


<div class="content-2">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Danh sách văn bản thuộc khoa</h2>
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
                        <form action="<?=$base_url?>vanban/filter_date_vbkhoa" class="frm_search_date" method="post">
                            <div class="form-search-date">
                                <input type="text" class="date-start" name="ngaybatdau" id="start-date" placeholder="Ngày bắt đầu"/>
                                <input type="text" class="date-end" name="ngayketthuc" id="end-date" placeholder="Ngày kết thúc"/>
                                <button type="submit" class="btn-filter" name="filter">
                                    <span><i class="fa-solid fa-sort"></i> Lọc</span>
                                </button>
                            </div>
                        </form> 

                        <form class="frm_search_title" action="<?=$base_url?>vanban/search_vbKhoa" method="post">
                                <input type="hidden" data-idvb="<?php echo $idvb_chung ?>">
                                <div class="form-search-name">
                                    <input  placeholder="Nhập tên văn bản" class="input_search" name="key_word_vbkhoa">
                                    <button class="btn_search" type="submit" name="btn_search_key">Tìm kiếm</button>
                                </div>
                                <button type="button" id="open_modal_addVB" class="add_new">
                                    + Thêm văn bản
                                </button>
                        </form>  

                        <!--Modal ADD start-->
                            <div class="modal-container-addVB" id="modal-container-addVB">
                                <div class="modal-addVB">
                                    <div class="modal-header-addVB">
                                        <h2>Thêm văn bản</h2>
                                        <i class="fa fa-close" id="close-icon-addVB"></i>
                                    </div>
                                    <div class="modal-content-addVB" id="insert_data_vbkhoa">
                                        <div class="admin-add-form">
                                            <form action="<?=$base_url?>khoa/add_vb_khoa" method="post" enctype="multipart/form-data" id="form_add_vbkhoa">
                                                <input type="text" name="tieude" id="tieude_vbkhoa" placeholder="Nhập tiêu đề" class="box">
                                
                                                <textarea name="noidung" id="noidung_vbkhoa" cols="20" rows="5" placeholder="Nhập nội dung" class="box"></textarea>
                                                <select id="loaivb_vbkhoa" name="idloaivb" class="box">
                                                    <option value="">--Chọn loại văn bản--</option>
                                                    <?php
                                                        foreach ($dsLoaiVanBan as $lvb) {
                                                                
                                                                echo '<option value="'.$lvb['id'].'">'.$lvb['loaivanban'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <select id="tenkhoa_vbkhoa" name="idkhoa" class="box">
                                                    <option value="">--Chọn Khoa--</option>
                                                    <?php
                                                        foreach ($dskhoa as $khoa) {
                                                                
                                                                echo '<option value="'.$khoa['id'].'">'.$khoa['tenkhoa'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <label for="date" class="lb">Chọn ngày đăng :</label>
                                                <input type="date" id="ngaydang_vbkhoa" name="ngayky" value="<?php 
                                                                                                                    $date = date('Y-m-d');
                                                                                                                    $date_formatted = date('d-m-Y', strtotime($date)); 
                                                                                                                    echo $date; ?>" 
                                                                                                                    class="box" readonly/>
                                                <label for="file" class="lb">Chọn file :</label>
                                                <input type="file" name="file" id="tenfile_vbkhoa" class="box">

                                                <div class="modal-footer-addVB">
                                                    <button type="submit" name="confirm_modal_addVB_khoa" class="btn-confirm-addVB" id="confirm_modal_addVB">Xác nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        <!--Modal ADD end-->

                         <!--Modal EDIT start-->
                         <div class="modal-container-addVB" id="modal-container-editVBKHOA">
                                <div class="modal-addVB">
                                    <div class="modal-header-addVB">
                                        <h2>Sửa văn bản</h2>
                                        <i class="fa fa-close" id="close-icon-editVBKHOA"></i>
                                    </div>
                                    <div class="modal-content-addVB">
                                        <div class="admin-add-form">
                                            <form action="<?=$base_url?>khoa/update_vb_khoa" method="post" enctype="multipart/form-data" id="form_edit_vbkhoa">
                                                <input type="hidden" name="idvb" id='idvb'>
                                                <input type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề" class="box">
                                                <textarea name="noidung" id="noidung" cols="20" rows="5" placeholder="Nhập nội dung" class="box"></textarea>

                                                <select id="tenloaivb" name="idloaivb" class="box">
                                                    <option value="">--Chọn loại văn bản--</option>
                                                    <?php
                                                        foreach ($dsLoaiVanBan as $lvb) {
                                                                
                                                                echo '<option value="'.$lvb['id'].'">'.$lvb['loaivanban'].'</option>';
                                                        }
                                                    ?>
                                                </select>

                                                <select id="tenkhoa" name="idkhoa" class="box">
                                                    <option value="">--Chọn Khoa--</option>
                                                    <?php
                                                        foreach ($dskhoa as $khoa) {
                                                                
                                                                echo '<option value="'.$khoa['id'].'">'.$khoa['tenkhoa'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <label for="date" class="lb">Chọn ngày đăng :</label>
                                                <input type="date" id="ngaydang" name="ngaydang" placeholder="Chọn ngày đăng" value="" min="2018-01-01" max="2024-12-31" class="box"/>
                                                <p>file hiện tại: </p>
                                                <label for="file" id="file" class="lb"></label>
                                                <input type="file" name="file"  class="box">

                                                <div class="modal-footer-addVB">
                                                    <button type="submit" name="confirm_modal_editVB_khoa" class="btn-confirm-addVB" id="confirm_modal_editVBKHOA">Xác nhận</button>
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
                                <th>Khoa</th>
                                <th>Ngày đăng</th>
                                <th>Tệp tin</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $i=1;  foreach($ds_vb_khoa as $vb): ?> 
                            <tr>
                                <td class="idvb_khoa" style="display: none;">
                                    <?php echo $vb['idvb']?>
                                </td>
                                <td><?=$i?></td>
                                <td>
                                    <a href="<?=$base_url?>khoa/content_admin/<?=$vb['idvb']?>"><?=$vb['tieude']?></a>
                                </td>
                                <td><?=$vb['loaivanban']?></td>
                                <td><?=$vb['tenkhoa']?></td>
                                <td><?=$vb['formatted_ngaydang']?></td>
                                <td>
                                    <a href="<?=$base_url?>/khoa/download/<?=$vb['file']?>"><?=$vb['file']?></a>
                                </td>
                                <td>
                                    <button type="button" class="open_modal_editVBKHOA" data-idvb="<?=$vb['idvb']?>">
                                        <i class="edit-btn fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="deleteDocument(<?=$vb['idvb']?>)"><i class="edit-btn fa-solid fa-trash"></i></button>
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
            window.location = '<?=$base_url?>khoa/delete_document/'+id;
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="<?=$base_url?>template/Script/script-modal_add.js"></script>
<script src="<?=$base_url?>template/Script/script-modal_edit.js"></script>
<script src="<?=$base_url?>template/Script/validation_form_addvbkhoa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>






<!--Modal EDIT end--> 
<script>
    $(document).ready(function() { 
        $('.open_modal_editVBKHOA').on('click', function(e) {
            e.preventDefault();
            var idvb = $(this).closest('tr').find('.idvb_khoa').text();  
            console.log(idvb);

            $.ajax({
                method: "POST",
                url: "<?=$base_url?>khoa/edit_vb_khoa",
                data: {
                    'click_edit_btn': true,
                    'idvb':idvb,
                },
                success: function(response) { 
                    // console.log(response);
                    $.each(response, function(Key, Value) { 
                        // console.log(Value['tieude']);
                        $('#idvb').val(Value['idvb']);
                        $('#tieude').val(Value['tieude']);
                        $('#noidung').val(Value['noidung']);
                        $('#tenloaivb').val(Value['loaivanban']);
                        $('#tenkhoa').val(Value['idkhoa']);
                        $('#ngaydang').val(Value['ngaydang']);
                        $('#file').text(Value['file']);
                    });

                }
            });
        });
    });        
</script>
<!--Modal EDIT end--> 


<!--Modal FILTER DATE end-->    
<script>
      $(document).ready(function() { 
        $.datepicker.setDefaults({
            dateFormat: 'dd-mm-yy'
        });
        $(function() {
            $("#start-date").datepicker();
            $("#end-date").datepicker();
        });

        $('#filter-vbkhoa').click(function(){
            var From = $('#start-date').val();
            var to = $('#end-date').val()
            if(From == '' && to == '') {
                alert("Bạn chưa chọn ngày !");
            }
        });

        // $('#filter-vbkhoa').click(function(){
        //     var From = $('#start-date').val();
        //     var to = $('#end-date').val();

        //     if(From != '' && to != '') {
        //     $.ajax({
        //         url: "<?=$base_url?>/khoa/admin_search_vanban_khoa",
        //         method: "POST",
        //         data: {From:From, to:to},
        //         success: function(data) 
        //         {
        //             console.log(data);
        //             $('#filter_vb').html(data);
                    

        //         }
        //     });
        // }
        // else
        // {
        //     alert("Bạn chưa chọn ngày !");
        // }

        // });   
});
</script>
<!--Modal FILTER DATE end--> 