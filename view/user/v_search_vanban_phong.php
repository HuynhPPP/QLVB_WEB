<?php
    if(is_array($phong)) {
        extract($phong);
    }    
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>

<article>
    
        <div class="box-menu">
            <h1>Danh sách văn bản thuộc <span><?=$tenphong?></span></h1>
        </div>

        <div class="box-center">
            <!-- <div class="form-search-date">
                <input type="hidden" data-idvbchung="<?php echo $idvb_chung ?>">
                <input type="text" class="date-start" name="" id="start-date" placeholder="Ngày bắt đầu"/>
                <input type="text" class="date-end" name="" id="end-date" placeholder="Ngày kết thúc"/>
                <button class="btn-filter" name="filter" id="filter" data-idphong="<?php echo $id ?>">
                    <span>Tìm kiếm</span>
                </button>
            </div> -->
            <div class="box-search">
                <form method="post" action="<?=$base_url?>phong/search_vanban_phong_name/<?=$id?>">
                    <input type="search" name="keyword_vb_phong" placeholder="Nhập tên văn bản cần tìm kiếm..."> 
                    <a href="<?=$base_url?>phong/search_vanban_phong_name/<?=$id?>">
                        <i class="fas fa-solid fa-magnifying-glass"></i>
                    </a>
                </form>
            </div>

            
            <div id="filter-vb" >
                <!-- <p class="title-result">Kết quả tìm kiếm</p>
                <div class="box-result-search"> -->
                    <!-- <div class="box-content">
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
                        </div> -->
                <!-- </div> -->
            </div>


            <p class="title-result-main">Kết quả tìm kiếm</p>
            <div class="main">
                <?php foreach($dsvb_phong_result as $key => $item) {
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

<script>
    if (window.history.replaceState )
    {
        window.history.replaceState(null, null, window.location.href);
    }
</script>














            

        