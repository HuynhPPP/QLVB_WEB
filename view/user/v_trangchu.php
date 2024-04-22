<article>
        <div class="box-center">       
            <div class="main-1"> 
                <h1>Văn bản mới cập nhật</h1>
                <?php $list_document_newest = list_document_newest();
                        foreach($list_document_newest as $vb): ?> 
                        <div class="box-content-1">
                            <div class="document-content">
                                <div class="title"><a href="<?=$base_url_2?>/phong/content/<?=$vb['idvb_chung']?>"><?=$vb['tenvanban']?></a></div>

                                <div class="date-post">
                                    <span class="block-1"><i class="fa fa-regular fa-clock"></i> Đăng ngày <span><?=$vb['ngaydang']?></span></span>
                                    <i class="fa fa-solid fa-user-tie"></i> <span>Quản trị viên</span>
                                </div>
                                
                                <p class="text-main-title">Nội dung chính</p>
                                <p class="text-noidung">   
                                    <?=$vb['noidung']?>
                                </p>
                            </div>
                        </div>
                <?php endforeach; ?> 

         
                
            </div>

            <div class="main-2">
                <!-- <div class="box-search">
                    <input type="text" placeholder="Tìm kiếm..."> 
                    <a href="">
                        <i class="fas fa-solid fa-magnifying-glass"></i>
                    </a>
                </div> -->
                
                <div class="box-content-2">
                    <h1>Danh mục</h1>
                    <div class="block-categories">
                        <div class="title-block-categories">
                            <span>Văn bản thuộc phòng</span>
                        </div>

                        <?php $dsphong = getAllPhong();
                            foreach($dsphong as $phong): ?> 

                        <div class="text-categories">
                            <i class="fa-solid fa-paperclip"></i><a href="<?=$base_url?>phong/home_user/<?=$phong['id']?>"><?=$phong['tenphong']?></a>
                        </div>

                        <?php endforeach; ?>  
                    
                    </div>

                    <div class="block-categories">
                        <div class="title-block-categories">
                            <span>Văn bản thuộc khoa</span>
                        </div>

                        <?php $dskhoa = getAllKhoa();
                            foreach($dskhoa as $khoa): ?> 

                        <div class="text-categories">
                            <i class="fa-solid fa-paperclip"></i><a href="<?=$base_url?>khoa/home_user/<?=$khoa['id']?>"><?=$khoa['tenkhoa']?></a>
                        </div>

                        <?php endforeach; ?>  
                    </div>
                </div>
            </div>
        </div>
    </article>

