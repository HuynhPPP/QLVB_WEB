<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-khoa.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/pagination-style-admin.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>




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
                        <form class="frm_search" action="" method="post">
                            <div class="form-search-date">
                                <input type="hidden" data-idvbchung="<?php echo $idvb_chung ?>">
                                <input type="text" class="date-start" name="" id="start-date" placeholder="Ngày bắt đầu"/>
                                <input type="text" class="date-end" name="" id="end-date" placeholder="Ngày kết thúc"/>
                                <button class="btn-filter" name="filter" id="filter" data-idphong="<?php echo $id ?>">
                                    <span><i class="fa-solid fa-sort"></i> Lọc</span>
                                </button>
                            </div>

                            <div class="form-search-name">
                            <input  placeholder="Nhập tên văn bản" class="input_search">
                            <button class="btn_search" type="submit">Tìm kiếm</button>
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
                                            <form action="<?=$base_url?>khoa/add_vb_khoa" method="post" enctype="multipart/form-data">
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
                                                <input type="date" id="ngaydang_vbkhoa" name="ngayky" placeholder="Chọn ngày đăng" value="" min="2018-01-01" max="2024-12-31" class="box"/>
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
                                            <form action="<?=$base_url?>khoa/update_vb_khoa" method="post" enctype="multipart/form-data">
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
                                    <a href="<?=$base_url?>vanban/content/<?=$vb['idvb']?>"><?=$vb['tieude']?></a>
                                </td>
                                <td><?=$vb['loaivanban']?></td>
                                <td><?=$vb['tenkhoa']?></td>
                                <td><?=$vb['ngaydang']?></td>
                                <td>
                                    <a href="<?=$base_url?>/khoa/download/<?=$vb['file']?>"><?=$vb['file']?></a>
                                </td>
                                <td>
                                    <button type="button" class="open_modal_editVBKHOA" data-idvb="<?=$vb['idvb']?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button onclick="deleteDocument(<?=$vb['idvb']?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php $i++;  endforeach; ?>
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
    function deleteDocument(id){
        var kq = confirm("Bạn có muốn xoá văn bản này không");
        if( kq ){
            window.location = '<?=$base_url?>khoa/delete_document/'+id;
        }
    }
</script>

<script src="<?=$base_url?>template/Script/script-modal_add.js"></script>
<script src="<?=$base_url?>template/Script/script-modal_edit.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>






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



<script>
      $(document).ready(function() { 
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function() {
            $("#start-date").datepicker();
            $("#end-date").datepicker();
        });

        $('#filter').click(function(){
            var id_phong = $(this).data("idphong");
            
            var From = $('#start-date').val();
            var to = $('#end-date').val();
            if(From != '' && to != '') {
            $.ajax({
                url: "<?=$base_url?>/phong/search_vanban_phong",
                method: "POST",
                data: {From:From, to:to, id_phong:id_phong},
                success: function(data) 
                {
                    // console.log(data);
                    $('#filter-vb').html(data);
                    

                }
            });
        }
        else
        {
            alert("Bạn chưa chọn ngày !");
        }

        });   
});
</script>