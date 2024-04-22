<?php
    if(is_array($phong)) {
        extract($phong);
    }
    
?>

<article>
    
        <div class="box-menu">
            <h1>Danh sách văn bản thuộc <span><?=$tenphong?></span></h1>
        </div>

        <div class="box-center">

            <div class="box-search">
                <form method="post" action="<?=$base_url?>phong/search_vanban_phong/<?=$id?>">
                    <input type="search" name="keyword_vb_phong" placeholder="Tìm kiếm..."> 
                    <a href="<?=$base_url?>phong/search_vanban_phong/<?=$id?>">
                        <i class="fas fa-solid fa-magnifying-glass"></i>
                    </a>
                </form>
                
            </div>
            <?php if (isset($_SESSION['thongbao'])):?>
              <div class="error">
                <h1> <?=$_SESSION['thongbao']?></h1>  
              </div>                         
            <?php endif; unset($_SESSION['thongbao']);?> 
            
            <div class="main">
                <?php foreach($dsvb_phong as $key => $item) {
                    extract($item);
                    $link_content = "$base_url_2/phong/content/$idvb_chung";
                    $link_file = "$base_url_2/vanban/download/$file";

                echo'<div class="box-content">
                        <div class="document-content">
                            <div class="title"><a href="'.$link_content.'">'.$tenvanban.'</a></div>

                            <div class="date-post">
                                <span class="block-1"><i class="fa fa-regular fa-clock"></i> Đăng ngày <span>'.$ngaydang.'</span></span>
                                <i class="fa fa-solid fa-user-tie"></i> <span>Quản trị viên</span>
                            </div>
                            
                            <p class="text-main-title">Nội dung chính</p>
                            <p class="text-main">   
                                '.$noidung.'
                            </p>
                            <a href="'.$link_content.'"><button class="button-6" role="button">Chi tiết</button></a>
                        </div>
                    </div>';

                } ?>     
            
            </div>

            
        </div>
</article>