<div class="container">          
          <h2 class="my-3">Sửa loại văn bản</h2>
          
          <?php if (isset($_SESSION['thongbao'])):?>
                    <div class="alert alert-success" role="alert">
                    <?=$_SESSION['thongbao']?>
                    </div>
                  <?php endif; unset($_SESSION['thongbao']);?>

                  <?php if (isset($_SESSION['loi'])):?>
                    <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['loi']?>
                    </div>
                  <?php endif; unset($_SESSION['loi']);?>

                  <form action="" method="POST"> 
                      <div class="col-md-9">
                      <input type="text" class="form-control" name="loaivanban" id="loaivanban" value="<?=$lvb['loaivanban']?>">  
                      </div>
                      <div class="col-auto my-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
                      </div>
                </form>
</div>