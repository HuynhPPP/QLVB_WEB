<article>
    <div class="box-content-document">
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
    </div>
</article>


    
