<head>
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/admin-send-mail.css">
    <link rel="stylesheet" href="<?=$base_url?>template/css/admin/virtual-select.min.css">
    <script type="text/javascript" src="<?=$base_url?>template/Script/jquery.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script> -->
 
    
</head>



<div class="content">
    <div class="card-container">
        
        <form action="<?=$base_url?>page/mail" method="POST" class="frm-contact" id="form-send-mail">
            <!-- <div class="img-box">
                <img src="<?=$base_url?>template/img/img_new/mail-gmail-com-gia-re_657105.png" alt="" class="logo">
            </div> -->
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

      
    </div> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<!-- <script src="<?=$base_url?>template/Script/validation_form_checkmail.js"></script> -->
<script src="<?=$base_url?>template/Script/virtual-select.min.js"></script>


<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multipleSelect',
        
    });
</script>


<!-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> -->

<script>
        CKEDITOR.replace( 'noidung' );
</script>




