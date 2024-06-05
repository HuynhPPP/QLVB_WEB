<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-send-mail.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/virtual-select.min.css">
    <script type="text/javascript" src="<?=$base_url?>template/Script/jquery.min.js"></script>
    
    
  
 
    
</head>



<div class="content">
    <div class="card-container">
        
        <form action="<?=$base_url?>page/mail" method="POST" class="frm-contact" id="form-send-mail">
            
            <div class="box_select_mail">
            <label>Chọn mail:</label>
            <select id="multipleSelect" multiple name="mail" placeholder="Mail" data-search="true" data-silent-initial-value-set="true">
          
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
                <textarea name="noidung" id="editor" cols="30" rows="10" class="input_noidung" placeholder="Nhập nội dung"></textarea>
            </div>
            <input type="submit" name="send" value="Gửi">
        </form>

        <?php if (isset($error['mail'])):?>
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
                        <?= $error['mail'];?>
                    </div> 
                </div>
                <div class="notification__progress"></div>
            </figure>
            <?php unset($error['mail']); ?>
        <?php endif?>  
        <?php if (isset($error['success'])):?>
        <figure class="notification-success">
            <div class="notification__body">
                <div class="notification__description">
                    <div class="icon__wrapper">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round"
                    >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>

                    </div>                    
                    <?= $error['success']?>
                </div> 
            </div>
            <div class="notification__progress_success"></div>
        </figure>
        <?php unset($error['success']); ?>
    <?php endif?>  
      
    </div> 
</div>



<script>
    if (window.history.replaceState )
    {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="<?=$base_url?>template/Script/virtual-select.min.js"></script>


<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect',
        
    });
</script>



<script>
        CKEDITOR.replace( 'noidung' );
</script>




