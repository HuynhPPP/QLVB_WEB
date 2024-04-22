<h2 class="container my-3 text-bg-primary p-3">Đăng văn bản</h2>
        <div class="container border border-light-subtle my-4">   
              
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group my-3">           
                    <label for="title"><strong class="fs-5">Tiêu đề:</strong></label>                         
                    <input type="text" class="form-control" name="tieude" id="tieude" placeholder="Nhập tiêu đề">                 
                </div>
                <div class="form-group my-3">
                  <label for="content"><strong class="fs-5">Nội dung:</strong></label>
                  <textarea class="form-control" rows="5" name="noidung" id="content" placeholder="Nhập nội dung"></textarea>
                </div>
                <div class="form-group my-3">
                  <label for="type"><strong class="fs-5">Loại văn bản:</strong></label>
                  <select class="form-control" id="type" name="idloaivb">
                    <option selected>Chọn loại văn bản</option>
                        <?php
                          foreach ($dsLoaiVanBan as $lvb) {
                                  
                                  echo '<option value="'.$lvb['id'].'">'.$lvb['loaivanban'].'</option>';
                          }
                        ?>
                  </select>
                </div>
                <div class="form-group my-3">
                  <label for="type"><strong class="fs-5">Phòng:</strong></label>
                  <select class="form-control" id="type" name="idphong">
                    <option selected>Chọn Phòng</option>
                        <?php
                          foreach ($dsphong as $phong) {
                                  
                                  echo '<option value="'.$phong['id'].'">'.$phong['tenphong'].'</option>';
                          }
                        ?>
                  </select>
                </div>
                <div class="form-group my-3">
                  <label for="date"><strong class="fs-5">Ngày ký văn bản:</strong></label>
                  <input type="date" class="form-control" id="date" name="ngayky">
                </div>
                <div class="form-group my-3">
                  <label for="file">Tải file văn bản lên:</label>
                 
                  <input type="file" class="form-control-file" id="file" name="file">
                  <p class="text-danger">Lưu ý: khi upload file hạn chế kí tự đặc biệt hoặc khoảng trắng</p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start my-4">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
                    <button type="reset" class="btn btn-danger">Soạn lại</button>
                  </div>
                  <?php if (isset($_SESSION['thongbao'])):?>
                    <div class="alert alert-success" role="alert">
                    <?= $_SESSION['thongbao']?>
                    </div>
                  <?php endif; unset($_SESSION['thongbao']);?>
              </form>
        </div>