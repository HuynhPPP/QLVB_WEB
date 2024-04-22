<?php
  if(is_array($vb)){
    extract($vb);
  }
?>

<h2 class="container my-3 text-bg-primary p-3">Sửa văn bản</h2>
        <div class="container border border-light-subtle my-4">   
              
              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group my-3">           
                    <label for="title"><strong class="fs-5">Tiêu đề:</strong></label>                         
                    <input type="text" class="form-control" id="tieude" name="tieude" 
                    placeholder="Nhập tiêu đề" value="<?=$tieude?>">                 
                </div>
                <div class="form-group my-3">
                  <label for="content"><strong class="fs-5">Nội dung:</strong></label>
                  <textarea class="form-control" rows="5" id="content" name="noidung" placeholder="Nhập nội dung" ><?=$noidung?></textarea>
                </div>
                <div class="form-group my-3">
                  <label for="type"><strong class="fs-5">Loại văn bản:</strong></label>
                  <select class="form-control" id="type" name="loaivanban">
                  <option value="<?=$loaivanban?>" selected><?=$loaivanban?></option>
                    <?php
                        foreach ($dsLoaiVanBan as $lvb) {
                          echo '<option value="'.$lvb['id'].'"';
                          echo '>'.$lvb['loaivanban'].'</option>';
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group my-3">
                  <label for="type"><strong class="fs-5">Khoa:</strong></label>
                  <select class="form-control" id="type" name="idkhoa">
                  <option value="<?=$idkhoa?>" selected><?=$tenkhoa?></option>
                    <?php
                        foreach ($dskhoa as $khoa) {
                          echo '<option value="'.$khoa['id'].'"';
                          echo '>'.$khoa['tenkhoa'].'</option>';
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group my-3">
                  <label for="date"><strong class="fs-5">Ngày ký văn bản:</strong></label>
                  <input type="date" class="form-control" id="date" name="ngayky" value="<?=$ngaydang?>">
                </div>
                <div class="form-group my-3">
                <p class="text-danger">Lưu ý: khi upload file hạn chế kí tự đặc biệt hoặc khoảng trắng</p>
                  <label for="file">Chọn file văn bản muốn thay đổi:</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                  <p class="text-dark">File hiện tại: <?=$file?></p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start my-4">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Xác nhận</button>
                    <button type="reset" class="btn btn-danger">Soạn lại</button>
                  </div>
                  <?php if (isset($_SESSION['thongbao'])):?>
                    <div class="alert alert-success" role="alert">
                    <?=$_SESSION['thongbao']?>
                    </div>
                  <?php endif; unset($_SESSION['thongbao']);?>
              </form>
               
          
        </div>