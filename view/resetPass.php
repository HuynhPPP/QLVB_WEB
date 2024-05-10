
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>template/css/style_login.css">
    <link rel="stylesheet" href="<?=$base_url?>template/bootstrap-5.3.2-dist/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Trang đăng nhập</title>
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
                   <form action="" method="POST">
                        
                        <div class="input-field">
                                <input type="password" class="input" name="pass_new" required="">
                                <label for="pass">Nhập mật khẩu mới</label>
                        </div> 

                        <div class="input-field">
                                <input type="password" class="input" name="pass_new_confirm" required="">
                                <label for="pass">Xác nhận mật khẩu</label>
                        </div> 
                        
                        <div class="input-field">
                                <input type="submit" class="submit" name="submit" value="Xác nhận">  
                                <div class="text-primary mt-4"><a href="<?=$base_url?>user/login">Quay lại trang đăng nhập</a></div>
                        </div>                
                    </form>

                    <?php if (isset($error['fail'])) : ?>
                        <div class="mt-4 alert alert-danger" role="alert">
                            <?=$error['fail']?>
                        </div>
                    <?php elseif (isset($error['success'])) : ?>
                        <div class="mt-4 alert text-success" role="alert"> 
                            <?=$error['success']?>
                        </div>
                    <?php endif ?>
                </div>  
                
            </div>
        </div> 
        
    </div>
</div>
        
    <script src="https://kit.fontawesome.com/a1bc52aff1.js" crossorigin="anonymous"></script>
</body>
</html>