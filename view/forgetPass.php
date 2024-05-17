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
                   <form action="<?=$base_url?>user/quenmatkhau" method="POST" id="form_enterMail">
                        <div class="input-field">
                                <input type="email" class="input" name="mail" id="username" autofocus>
                                <label for="username">Nhập email của bạn</label> 
                            </div> 
                        
                        <div class="input-field">
                                <input type="submit" name="submit" class="submit" value="Yêu cầu xác nhận">  
                        </div> 
                        
                    </form>
                    
                    <?php if (isset($error['mail'])): ?>
                    <div class="mt-4 alert alert-danger" role="alert">
                        <?php echo $error['mail']; ?>
                    </div>
                    <?php unset($error['mail']); endif; ?>
                      
                </div>  
                
            </div>
        </div> 
        
    </div>
</div>
  
    <script src="https://kit.fontawesome.com/a1bc52aff1.js" crossorigin="anonymous"></script>
   
</body>
</html>