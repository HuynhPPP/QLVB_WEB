<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-send-mail.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/virtual-select.min.css">
    <!-- <script type="text/javascript" src="<?=$base_url?>template/Script/multiselect-dropdown.js"></script> -->
</head>



<div class="content">
    <div class="card-container">
        
        <form action="" method="post" class="frm-contact">
            <div class="img-box">
                <img src="<?=$base_url?>template/img/img_new/mail-gmail-com-gia-re_657105.png" alt="" class="logo">
            </div>
            <div class="box_select_mail">
            <label>Chọn mail:</label>
            <select id="multipleSelect" multiple name="native-select" placeholder="Mail" data-search="true" data-silent-initial-value-set="true">
                <?php
                    foreach ($dsTK as $tk) {
                        echo '<option>'.$tk['mail'].'</option>';
                    }
                ?>
            </select>
            </div>
            
            <div class="box_select_mail">
                <label>Tiêu đề :</label>
                <input type="text" name="tieude" class="input_tieude" placeholder="Nhập tiêu đề"> 
            </div>
            
            <div class="box_noidung">
                <label>Nội dung :</label>
                <textarea name="noidung" id="" cols="30" rows="10" class="input_noidung" placeholder="Nhập nội dung"></textarea>
            </div>
        </form>
        <input type="submit" value="Gửi">
    </div> 
</div>

<script src="<?=$base_url?>template/Script/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect',
        
    });
</script>



