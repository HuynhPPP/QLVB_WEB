<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-style-trangchu.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin_style_detail.css">
    
</head>

<?php
    if(is_array($vanban_khoa)) {
        extract($vanban_khoa);
    }    
?>


<div class="content-2">
    <div class="header-wrapper">
        <div class="header-title">
            <h2>Chi tiết văn bản</h2>
        </div>
        <!-- <div class="breadcrumb">
            <ul class="breadcrumb_list">
              <li class="li-1"><a href='#'>Danh sách văn bản</a></li>
              <li><a href=''>Quản lý khoa</a></li>
            </ul>
          </div> -->
    </div>

    <div class="card-container">
    <div class="box-content-document">
        <div class="box-center">
            <div class="card-detail">
                <div class="detail-title">
                <?php
                    if(is_array($vanban_khoa)) {
                        extract($vanban_khoa);
                    }
                ?>
                    <strong><?=$tieude?></strong>
                </div>

                <div class="card-detail-body">
                    <p>
                        <span class="block-1"><i class="fa-regular fa-clock"></i> Đăng ngày <?=$ngaydang?> </span>
                        <i class="fa-solid fa-user-tie"></i> Quản trị viên
                    </p>

                    <p>
                        <span class="block-2"><i class="fa-regular fa-clock"></i> Thể loại: <span class="categories-text"><?=$loaivanban?></span> </span>
                        <i class="fa-solid fa-link"></i> Tệp đính kèm: <a href="<?=$base_url?>/khoa/download/<?=$file?>" class=""><?=$file?></a></span>
                    </p>

                    <div class="card-content">
                        <?=$noidung?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
</div>


