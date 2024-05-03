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
                    <input type="search" name="keyword_vb_phong" placeholder="Nhập tên văn bản cần tìm kiếm..."> 
                    <a href="<?=$base_url?>phong/search_vanban_phong/<?=$id?>">
                        <i class="fas fa-solid fa-magnifying-glass"></i>
                    </a>
                </form>
            </div>

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

            <div class="Pagination">
                <a href="<?=$base_url?>/phong/home_user/<?=$phong['id']?>/<?=$page-1?>">
                    <button class="btn1" <?=($page <= 1)?'disabled':''?> onclick="backBtn()"> 
                        <img src="<?=$base_url?>/template/img/img_new/448-arrow.png" alt=""> 
                        Trước
                    </button>
                </a>
                <ul>
                    <?php for($i = 1; $i <= $sotrang; $i++): ?>
                        <a href="<?=$base_url?>/phong/home_user/<?=$phong['id']?>/<?=$i?>">
                        <li class="link-page <?=($page == $i)?'active':''?>" value="" onclick="activeLink()">
                            <?=$i?>
                        </li>
                        </a>
                    <?php endfor; ?>
                    <!-- <li class="link" value="2" onclick="activeLink()">2</li>
                    <li class="link" value="3" onclick="activeLink()">3</li>
                    <li class="link" value="4" onclick="activeLink()">4</li>
                    <li class="link" value="5" onclick="activeLink()">5</li>
                    <li class="link" value="6" onclick="activeLink()">6</li> -->
                </ul>
                <a href="<?=$base_url?>/phong/home_user/<?=$phong['id']?>/<?=$page+1?>">
                    <button class="btn2" <?=($page >= $sotrang)?'disabled':''?> onclick="nextBtn()">
                        Sau
                        <img src="<?=$base_url?>/template/img/img_new/448-arrow.png" alt="">
                    </button>
                </a> 
            </div>
        </div>
        
</article>

