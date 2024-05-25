<?php
    if(is_array($phong)) {
        extract($phong);
    }

    if(is_array($dsvb_phong)) {
        extract($dsvb_phong);
    }
    
    
?>
<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/user/notifiacation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>

<article>
    
        <div class="box-menu">
            <h1>Danh sách văn bản thuộc <span><?=$tenphong?></span></h1>
        </div>

        <div class="box-center">
            <div class="form-search-date">
                
                <input type="text" class="date-start" name="" id="start-date" placeholder="Ngày bắt đầu"/>
                <input type="text" class="date-end" name="" id="end-date" placeholder="Ngày kết thúc"/>
                <button class="btn-filter" name="filter" id="filter" data-idphong="<?php echo $id ?>">
                    <span>Tìm kiếm</span>
                </button>
            </div>
            <div class="box-search">
                <form method="post" action="<?=$base_url?>phong/search_vanban_phong_name/<?=$id?>" id="form-search-name-phong">
                    <input type="search" name="keyword_vb_phong" placeholder="Nhập tên văn bản cần tìm kiếm..."> 
                    <a href="#" onclick="document.getElementById('form-search-name-phong').submit();">
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


            <p class="title-result-main">Danh sách văn bản</p>
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

<div id="notification-filter">

</div>

   


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

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
            $('#notification-filter').html(`
                        <figure class="notification">
                            <div class="notification__body">
                                <div class="notification__description">
                                    <div class="icon__wrapper">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        >
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 6l12 12m0 -12l-12 12"></path>
                                        </svg>
                                    </div>
                                    Bạn chưa chọn ngày
                                </div>
                            </div>
                            <div class="notification__progress"></div>
                        </figure>
                    `);
        }

        });   
});
</script>


