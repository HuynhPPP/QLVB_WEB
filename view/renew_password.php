
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>template/css/style_login.css">
    <link rel="stylesheet" href="<?=$base_url?>template/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Đổi mật khẩu</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">         
                <!-------------      image     ------------->  
                <!-- <img src="img/document-logo.jpg" alt=""> -->
            </div>

            <div class="col-md-6 right">
                <div class="input-box"> 
                   <header class="fs-4">Hệ thống văn bản</header>
                   <form action="<?=$base_url?>page_user/renew_password" method="POST">
                        <div class="input-field">
                                <input type="password" class="input" name="old_pass" id="username" required="" autofocus>
                                <label for="username">Nhập mật khẩu hiện tại</label> 
                            </div> 
                        <div class="input-field">
                                <input type="password" class="input" name="new_pass" id="pass" required="">
                                <label for="pass">Nhập mật khẩu mới</label>
                        </div> 
                        
                        <div class="input-field">
                                <input type="submit" name="submit_change_pass" class="submit" value="Xác nhận">  
                        </div> 
                    </form>

                    <?php if (isset($error['error_comfirm'])) : ?>
                        <div class="mt-4 alert alert-danger" role="alert">
                            <?=$error['error_comfirm']?>
                        </div>
                    <?php elseif (isset($error['success'])) : ?>
                        <div class="mt-4 alert alert-success" role="alert"> 
                            <?=$error['success']?>
                        </div>
                    <?php endif ?>


                   <div class="signin">
                        <span><a href="<?=$base_url?>user/quenmatkhau" class="">Quên mật khẩu ?</a></span>
                        <div class="mt-4"><a href="<?=$base_url?>page_user/trangchu" class=" backpageuser">Quay lại trang chủ</a></div>
                   </div>
                </div>  
                
            </div>
        </div> 
        
    </div>
</div>
        
    <script src="https://kit.fontawesome.com/a1bc52aff1.js" crossorigin="anonymous"></script>
</body>
</html>