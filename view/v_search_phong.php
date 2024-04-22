<h2 class="container my-3 text-bg-primary p-3">Danh sách các phòng</h2>
        <div class="container border border-light-subtle my-4 p-3">             
             
                     
              <a href="<?=$base_url?>phong/add" class="btn btn-primary float-end">Thêm phòng</a>
              

              <form class="row g-3 my-3" method="POST" action="<?=$base_url?>phong/search">
                <div class="col-md-10">
                  <label for="inputPassword2" class="visually-hidden">timkiem</label>
                  <input type="text" class="form-control" id="inputPassword2" name="keyword_phong" placeholder="Tìm kiếm phòng">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                </div>
              </form>
              <table class="table table-striped border">
                <thead>
                  <tr>
                    <th class="border">ID</th>    
                    <th class="text-start border">Phòng</th>
                    <th class="text-end">Thao tác</th>
                  </tr>
                </thead>

                <tbody>
                <?php   foreach($kq_phong as $phong): ?>  
                  <tr>
                    <td class="border"><?=$phong['id']?></td>       
                    <td class="text-start border"><?=$phong['tenphong']?></td>
                              
                    <td class="text-end">
                    <a href="<?=$base_url?>phong/edit/<?=$phong['id']?>"><button class="btn btn-warning">Đổi tên</button></a>
                      <button onclick="deleteKhoa(<?=$phong['id']?>)" class="btn btn-danger">Xoá</button>
                    </td>
                  </tr>     
                  <?php endforeach; ?>                                                    
                </tbody>
              </table>

            
      </div>
<script>
    function deleteKhoa(id){
        var kq = confirm("Bạn có muốn xoá phòng này không");
        if( kq ){
            window.location = '<?=$base_url?>phong/delete/'+id;
        }
    }
</script>