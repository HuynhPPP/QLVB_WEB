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
                                <input type="text" class="input" name="TaiKhoan" id="username" required="" autocomplete="on" autofocus>
                                <label for="username">Tài khoản</label> 
                            </div> 
                        <div class="input-field">
                                <input type="password" class="input" name="MatKhau" id="pass" required="">
                                <label for="pass">Mật khẩu</label>
                        </div> 
                        
                        <div class="input-field">
                                <input type="submit" class="submit" value="Đăng nhập">  
                        </div> 
                        
                        
                        
                    </form>
                    <?php if (isset($_SESSION['error_login'])):?>
                        <div class="mt-4 alert alert-danger" role="alert">
                        <?= $_SESSION['error_login']?>
                        </div>
                        <?php endif; unset($_SESSION['error_login']);?>
                   <div class="signin">
                        <span><a href="#" class="fs-5">Quên mật khẩu ?</a></span>
                   </div>
                </div>  
                
            </div>
        </div> 
        
    </div>
</div>
        
    <script src="https://kit.fontawesome.com/a1bc52aff1.js" crossorigin="anonymous"></script>
</body>
</html>