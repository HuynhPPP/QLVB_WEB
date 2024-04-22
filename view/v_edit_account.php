<?php
  if(is_array($tk)){
    extract($tk);
  }
?>



<div class="container">          
          <h2 class="my-3">Sửa tài khoản</h2>
          <?php if (isset($_SESSION['thongbao'])):?>
                    <div class="alert alert-success" role="alert">
                    <?= $_SESSION['thongbao']?>
                    </div>
                  <?php endif; unset($_SESSION['thongbao']);?>

                  <?php if (isset($_SESSION['loi'])):?>
                    <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['loi']?>
                    </div>
                  <?php endif; unset($_SESSION['loi']);?>

          <form action="" method="POST">
            <div class="mb-3">
              <label for="HoTen" class="form-label">Tên đăng nhập</label>
              <input type="text" class="form-control" name="taikhoan" 
              id="HoTen" value="<?=$tk['taikhoan']?>">             
            </div>

           

            <div class="mb-3">
            
                <label for="ipnPassword">Mật khẩu</label>
                <input type="password" class="form-control" name="matkhau" id="ipnPassword" value="<?=$tk['matkhau']?>"> <br>
                <button class="btn btn-outline-secondary" type="button" id="btnPassword" ><span class="fas fa-eye"></span id="btnPassword"> </button>           
            </div>   

            <div class="mb-3">
              <label for="laitaikhoan" class="form-label">Vai trò</label>
              <select class="form-select" name="loaitaikhoan" id="loaitaikhoan">
                <option value="0" <?=($tk['loaitaikhoan']==0)?'selected':''?>>User</option>
                <option value="1" <?=($tk['loaitaikhoan']==1)?'selected':''?>>Admin</option>          
              </select>             
            </div>

            <div class="mb-3">
              <label for="Khoa" class="form-label">Khoa</label>
              <select class="form-control" id="type" name="idkhoa">
              <option selected><?=$tenkhoa?></option>
                    <?php
                        foreach ($dskhoa as $khoa) {
                          echo '<option value="'.$khoa['id'].'"';
                          echo '>'.$khoa['tenkhoa'].'</option>';
                        }
                    ?>
              </select>            
            </div>
       
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
          </form>
      </div>
<script>
    // step 1
    const ipnElement = document.querySelector('#ipnPassword')
    const btnElement = document.querySelector('#btnPassword')

    // step 2
    btnElement.addEventListener('click', function() {
    // step 3
    const currentType = ipnElement.getAttribute('type')
    // step 4
    ipnElement.setAttribute(
        'type',
        currentType === 'password' ? 'text' : 'password'
    )
    })
</script>