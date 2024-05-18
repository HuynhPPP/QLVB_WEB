
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
                   <form action="" method="POST" id="formLogin_validation">
                        <div class="input-field">
                                <input type="text" class="input" name="TaiKhoan" id="username" required="" autocomplete="on" autofocus >
                                <label for="username">Tài khoản</label> 
                            </div> 
                        <div class="input-field">
                                <input type="password" class="input" name="MatKhau" id="pass" required="" >
                                <label for="pass">Mật khẩu</label>
                        </div> 
                        
                        <div class="input-field">
                                <input type="submit" class="submit" value="Đăng nhập">  
                        </div> 
                    </form>

                   <div class="signin">
                        <span><a href="<?=$base_url?>user/quenmatkhau" class="fs-5">Quên mật khẩu ?</a></span>
                   </div>
                </div>          
            </div>
        </div>    
        <?php if (isset($_SESSION['error_login'])):?>
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
                        <?= $_SESSION['error_login']?>
                    </div> 
                </div>
                <div class="notification__progress"></div>
            </figure>
            <?php unset($_SESSION['error_login']); ?>
        <?php endif?>   
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="<?=$base_url?>template/Script/validation_form.js"></script>
    <script src="https://kit.fontawesome.com/a1bc52aff1.js" crossorigin="anonymous"></script>
</body>
</html>