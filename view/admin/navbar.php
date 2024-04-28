<nav>
    <div class="sidebar-top">
        <a href="<?=$base_url?>page/home_admin" class="logo__wrapper">
        <img src="<?=$base_url?>template/img/img_new/logo_school_2.png" alt="Logo" class="logo">
        <h1 class="hide">Trang quản lý</h1>
        </a>
        <!-- <div class="expand-btn">
        <img src="img/chevron.svg" alt="Chevron">
        </div> -->
    </div>
    <div class="sidebar-links">
        <ul>
            <li>
            <a href="<?=$base_url?>page/home_admin" title="Dashboard" class="tooltip">
                <i class="fa-solid fa-house"></i>
                <span class="link hide">Trang chủ</span>
                <!-- <span class="tooltip__content">Dashboard</span> -->
            </a>
            </li>
            <li>
            <a href="<?=$base_url?>khoa/home_admin" title="Project" class="tooltip">
                <i class="fa-solid fa-file-lines"></i>
                <span class="link hide">Văn bản khoa</span>
                <!-- <span class="tooltip__content">Văn bản khoa</span> -->
            </a>
            </li>
            <li>
            <a href="<?=$base_url?>phong/home_admin" class="tooltip">
                <i class="fa-regular fa-file-lines"></i>
                <span class="link hide">Văn bản chung</span>
                <!-- <span class="tooltip__content">Văn bản chung</span> -->
            </a>
            </li>
            <li>
            <!-- <a href="#funds" title="Funds" class="tooltip">
                <i class="fa-regular fa-folder-open"></i>
                <span class="link hide">Loại văn bản</span> -->
                <!-- <span class="tooltip__content">Loại văn bản</span> -->
            <!-- </a> -->
            <?php if($_SESSION['user']['loaitaikhoan']==1):?>
            <a href="<?=$base_url?>taikhoan/home_admin" title="Funds" class="tooltip">
                <i class="fa-solid fa-user"></i>
                <span class="link hide">Tài khoản</span>
                <!-- <span class="tooltip__content">Loại văn bản</span> -->
            </a>
            <?php endif; ?>
            <a href="<?=$base_url?>page/mail" title="Funds" class="tooltip">
                <i class="fa-solid fa-envelope"></i>
                <span class="link hide">Email</span>
                <!-- <span class="tooltip__content">Loại văn bản</span> -->
            </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-bottom">
        <!-- <div class="sidebar-links">
            <ul>
            <li>
                <a href="#help" title="Help" class="tooltip">
                <img src="assets/help.svg" alt="Help">
                <span class="link hide">Help</span>
                <span class="tooltip__content">Help</span>
                </a>
            </li>
            <li>
                <a href="#settings" title="Settings" class="tooltip">
                <img src="assets/settings.svg" alt="Settings">
                <span class="link hide">Settings</span>
                <span class="tooltip__content">Settings</span>
                </a>
            </li>
            </ul>
        </div> -->
        <div class="sidebar__profile">
            <div class="avatar__wrapper">
            <img class="avatar" src="<?=$base_url?>template/img/img_new/avatar-trang-y-nghia.jpeg" alt="Profile">
            <div class="online__status"></div>
            </div>
            <div class="avatar__name hide">
            <?php if( isset($_SESSION['user']) ): ?>
                <div class="user-name"><?=$_SESSION['user']['taikhoan']?></div>
                <div class="email">Admin123@gmail.com</div>
            </div>
            <div class="user-sign"><a href="<?=$base_url?>user/logout"><i class="fa-solid fa-right-from-bracket"></i></a></div>
            <?php endif;?>   
        </div>
    </div>
</nav>