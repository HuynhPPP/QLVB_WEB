<div class="container">          
  
          <h2 class="my-3">Thêm tài khoản</h2>

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
              <input type="text" class="form-control" name="taikhoan" id="HoTen">             
            </div>
            <div class="mb-3">
              <label for="Password" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" name="matkhau" id="Password">
            </div>         
            <div class="mb-3">
              <label for="loaitaikhoan" class="form-label">Vai trò</label>
              <select class="form-select" name="loaitaikhoan" id="loaitaikhoan">
                <option value="0" selected>User</option>
                <option value="1">Admin</option>         
              </select>                
            </div>
            
            <div class="mb-3">
            <label for="loaitaikhoan" class="form-label">Khoa</label>
            <select class="form-control" id="type" name="idkhoa">
                    <option selected>Chọn khoa</option>
                        <?php
                          foreach ($dskhoa as $khoa) {
                                  
                                  echo '<option value="'.$khoa['id'].'">'.$khoa['tenkhoa'].'</option>';
                          }
                        ?>
                  </select>           
            </div>
       
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
          </form>
      </div>