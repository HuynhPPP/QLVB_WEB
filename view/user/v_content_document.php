<article>
        <div class="box-center">
            <div class="card-detail">
                <div class="detail-title">
                <?php
                    if(is_array($vanban)) {
                        extract($vanban);
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
                        <span class="block-2"><i class="fa-regular fa-clock"></i> Thể loại: <span class="categories-text">Tin tức</span> </span>
                        <i class="fa-solid fa-link"></i> Tệp đính kèm: <a href="<?=$base_url?>/khoa/download/<?=$file?>" class=""><?=$file?></a></span>
                    </p>

                    <p class="card-content">
                        <?=$noidung?>
                    </p>
                </div>
            </div>
            
        </div>
</article>


    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <?php
                    if(is_array($vanban)) {
                        extract($vanban);
                    }
                ?>
                    <div class="card-header text-white bg-primary">
                        <h3></h3>                     
                    </div>                  
                    <div class="card-body">
                       
                        <p class="card-text font-weight-light">
                            <i class="fa fa-clock-o"></i> Đăng ngày <br>
                            
                            <?php /*
                            if($_SESSION['user']['taikhoan']) {
                                echo '<i class="fa fa-user pl-2"></i> Bởi '.$_SESSION['user']['taikhoan'].'';
                            } */
                            ?>
                            
                        </p>
                        <h4>Tóm tắt nội dung văn bản</h4>
                        <p class="card-text">
                        
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
