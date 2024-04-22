<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-table-vbchung.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/pagination-style-admin.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/modal-style.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/form-style.css">
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
                    <div>
                        <form class="frm_search" action="" method="post">
                            <input  placeholder="Nhập tên văn bản" class="input_search">
                            <button class="btn_search" type="submit">Tìm kiếm</button>
                            <button type="button" id="open_modal_addVB" class="add_new">
                                + Thêm văn bản
                            </button>
                        </form>  
                        <!--Modal start-->
                            <div class="modal-container-addVB" id="modal-container-addVB">
                                <div class="modal-addVB">
                                    <div class="modal-header-addVB">
                                        <h2>Thêm văn bản</h2>
                                        <i class="fa fa-close" id="close-icon-addVB"></i>
                                    </div>
                                    <div class="modal-content-addVB">
                                        <div class="admin-add-form">
                                            <form action="" method="post">
                                                <input type="text" name="" id="" placeholder="Nhập tiêu đề" class="box">
                                                <textarea name="" id="" cols="30" rows="8" placeholder="Nhập nội dung" class="box"></textarea>
                                                <select id="" class="box">
                                                    <option value="">--Chọn loại văn bản--</option>
                                                    <option value="dog">Tin tức</option>
                                                    <option value="cat">Sự kiện</option>
                                                </select>
                                                
                                                <label for="date" class="lb">Chọn ngày đăng :</label>
                                                <input type="date" id="start" name="trip-start" placeholder="Chọn ngày đăng" value="" min="2018-01-01" max="2024-12-31" class="box"/>
                                                <label for="file" class="lb">Chọn file :</label>
                                                <input type="file" name="" id="" class="box">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer-addVB">
                                        <button type="submit" class="btn-confirm-addVB" id="confirm_modal_addVB">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        <!--Modal end-->
                            
                                
                    </div>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
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
                                <td><?=$i?></td>
                                <td>
                                    <a href="<?=$base_url?>phong/content_admin/<?=$vb['idvb_chung']?>"><?=$vb['tenvanban']?></a>
                                </td>
                                <td> <?=$vb['loaivanban']?></td>
                                <td><?=$vb['ngaydang']?></td>
                                <td>
                                    <a href="<?=$base_url?>/phong/download_file_phong/<?=$vb['file']?>"><?=$vb['file']?></a>
                                </td>
                                <td>
                                    <button type="button" id="open_modal"><a href=""></a><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button onclick="deleteDocument(<?=$vb['idvb_chung']?>)"><i class="fa-solid fa-trash"></i></button>
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
            window.location = '<?=$base_url?>phong/delete_vanban_chung/'+id;
        }
    }
</script>