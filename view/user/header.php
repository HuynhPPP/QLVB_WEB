<header>
    <div class="box-top">
        <div class="box-center">
            <div class="box-top-left"><i class="fa-solid fa-phone"></i> Liên hệ: 0933.782.768</div>
            <div class="box-top-right">
                <?php if( !isset($_SESSION['user']) ): ?>
                    <i class="fa-solid fa-user"></i><a href="<?=$base_url?>user/login">Đăng nhập</a>
                <?php else:?>
                    <div class="dropdown">
                        <?php if($_SESSION['user']['loaitaikhoan']==0):?> 
                            <i class="fa-solid fa-user"></i>
                            <a href=""><span><?=$_SESSION['user']['taikhoan']?></span>
                            <i class="ml-5 fa-drop fa-solid fa-caret-down"></i></a>
                            <div class="dropdown-content">
                            <a href="<?=$base_url?>page_user/renew_password">Đổi mật khẩu</a>
                                <a href="<?=$base_url?>user/logout">Đăng xuất</a>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Hiển thị khi có quyền là quản lý-->
                        <?php if($_SESSION['user']['loaitaikhoan']==2):?>   
                            <i class="fa-solid fa-user"></i>
                            <a href=""><span><?=$_SESSION['user']['taikhoan']?></span>
                            <i class="ml-5 fa-drop fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="<?=$base_url?>page/home_admin">Trang quản lí</a> 
                            <a href="<?=$base_url?>page_user/renew_password">Đổi mật khẩu</a>
                            <a href="<?=$base_url?>user/logout">Đăng xuất</a>
                        </div>
                        <?php endif; ?>

                        <?php if($_SESSION['user']['loaitaikhoan']==1):?>   
                            <i class="fa-solid fa-user"></i>
                            <a href=""><span><?=$_SESSION['user']['taikhoan']?></span>
                            <i class="ml-5 fa-drop fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="<?=$base_url?>page/home_admin">Trang quản lí</a> 
                            <a href="<?=$base_url?>user/logout">Đăng xuất</a>
                        </div>
                        <?php endif; ?>
                    </div> 
                <?php endif;?> 
            </div>
        </div>
    </div>

    <div class="box-logo">
        <div class="box-center">
            <img src="<?=$base_url?>template/img//img_new/logo_school.png" alt="">
            <div class="name-school">
                <a href="<?=$base_url?>page_user/trangchu">TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ</a>
            </div>
        </div>
    </div>
</header>