<?php
    if(is_array($khoa)) {
        extract($khoa);
    }
?>

<article>
        <div class="box-center">   

            <div class="menu-bar">
                <div class="menu-content">
                    <div class="menu-1"><a href="<?=$base_url?>page_user/trangchu">Văn bản chung</a></div>
                    
                    
                    <?php if($_SESSION['user']['loaitaikhoan']==0):?>
                    <div class="menu-2"><a href="<?=$base_url?>khoa/home_user/<?=$_SESSION['user']['idkhoa']?>">Văn thuộc khoa <?=$tenkhoa?></a></div>
                    <?php endif; ?>

                    <?php if($_SESSION['user']['loaitaikhoan']>=1):?>
                    <div class="menu-2"><a href="<?=$base_url?>page_user/trangchu_khoa">Văn bản thuộc khoa</a></div>
                    <?php endif; ?>
                </div>
            </div>    

            <div class="main-1"> 
                <div class="title-category">Văn bản mới cập nhật</div>
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
                <div class="title-category">Danh mục</div>
                <div class="box-content-2">
                    <div class="block-categories">
                        <div class="title-block-categories">
                            <span>Văn bản thuộc phòng</span>
                        </div>

                        <?php $dsphong = getAllPhong();
                            foreach($dsphong as $phong): ?> 

                        <div class="text-categories">
                            <i class="fa-solid fa-chevron-right"></i><a href="<?=$base_url?>phong/home_user/<?=$phong['id']?>"><?=$phong['tenphong']?></a>
                        </div>

                        <?php endforeach; ?>  
                    
                    </div>

                    
                </div>
            </div>
        </div>
</article>

