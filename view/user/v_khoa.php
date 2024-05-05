<?php
    if(is_array($khoa)) {
        extract($khoa);
    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>

<article>
    
        <div class="box-menu">
            <h1>Danh sách văn bản thuộc <span><?=$tenkhoa?></span></h1>
        </div>

        <div class="box-center">
            <div class="form-search-date">
                <input type="hidden" data-idvbchung="<?php echo $idvb_chung ?>">
                <input type="text" class="date-start" name="" id="start-date" placeholder="Ngày bắt đầu"/>
                <input type="text" class="date-end" name="" id="end-date" placeholder="Ngày kết thúc"/>
                <button class="btn-filter" name="filter" id="filter_khoa_date" data-idkhoa="<?php echo $id ?>">
                    <span>Tìm kiếm</span>
                </button>
            </div>
            <div class="box-search">
                <form method="post" action="<?=$base_url?>khoa/search_vanban_khoa/<?=$id?>">
                    <input type="search" name="keyword_vb_khoa" placeholder="Tìm kiếm..."> 
                    <a href="<?=$base_url?>khoa/search_vanban_khoa/<?=$id?>">
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
            <?php foreach($dsvb_khoa as $key => $item) {
                  extract($item);
                  $link_content = "$base_url_2/khoa/content/$idvb";
                  $link_file = "$base_url_2/vanban/download/$file";

            echo'<div class="box-content">
                    <div class="document-content">
                        <div class="title"><a href="'.$link_content.'">'.$tieude.'</a></div>

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
                <a href="<?=$base_url?>/khoa/home_user/<?=$khoa['id']?>/<?=$page-1?>">
                    <button class="btn1" <?=($page <= 1)?'disabled':''?> onclick="backBtn()"> 
                        <img src="<?=$base_url?>/template/img/img_new/448-arrow.png" alt=""> 
                        Trước
                    </button>
                </a>
                <ul>
                    <?php for($i = 1; $i <= $sotrang; $i++): ?>
                        <a href="<?=$base_url?>/khoa/home_user/<?=$khoa['id']?>/<?=$i?>">
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
                <a href="<?=$base_url?>/khoa/home_user/<?=$khoa['id']?>/<?=$page+1?>">
                    <button class="btn2" <?=($page >= $sotrang)?'disabled':''?> onclick="nextBtn()">
                        Sau
                        <img src="<?=$base_url?>/template/img/img_new/448-arrow.png" alt="">
                    </button>
                </a> 
            </div>
            
        </div>
        
</article>

<script>
    function search() {
      // Lấy giá trị từ ô input
      var searchTerm = document.getElementById('searchInput').value;

      // Kiểm tra xem từ khóa có được nhập hay không
      if (searchTerm.trim() === '') {
        // Nếu không có từ khóa, hiển thị thông báo
        alert('Vui lòng nhập từ khóa tìm kiếm.');
        window.location.reload();
      } else {
        // Nếu có từ khóa, thực hiện chức năng tìm kiếm
        // Điều này có thể là nơi xử lý tìm kiếm trong ứng dụng của bạn
        console.log('Đang tìm kiếm cho từ khóa:', searchTerm);
      }
    }
</script>

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

        $('#filter_khoa_date').click(function(){
            var idkhoa = $(this).data("idkhoa");
            var From = $('#start-date').val();
            var to = $('#end-date').val();
            
            if(From != '' && to != '') {
            $.ajax({
                url: "<?=$base_url?>/khoa/search_vanban_khoa_date",
                method: "POST",
                data: {From:From, to:to, idkhoa:idkhoa},
                success: function(data) 
                {
                    // console.log(data);
                    $('#filter-vb').html(data);
                    

                }
            });
        }
        else
        {
            alert("Bạn chưa chọn ngày !");
        }

        });   
});
</script>