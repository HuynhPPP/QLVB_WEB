<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tham chiếu đến thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tham chiếu đến tập tin JavaScript của bạn -->
    <script src="path/to/my_script.js"></script>
</head>
<body>
    <!-- Nội dung của trang HTML -->
    <?php
    if(is_array($phong)) {
        extract($phong);
    }
    
?>       
<?php
    echo'<div class="box-content" >
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
?>     
</body>
</html>












            

        