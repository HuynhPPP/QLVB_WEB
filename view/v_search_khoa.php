<h2 class="container my-3 text-bg-primary p-3">Danh sách các khoa</h2>
        <div class="container border border-light-subtle my-4 p-3">             
             
              <a href="<?=$base_url?>vanban/home" class="btn btn-primary ">Danh sách văn bản thuộc các khoa</a>
                     
              <a href="<?=$base_url?>khoa/add" class="btn btn-primary float-end">Thêm khoa</a>
              

              <form class="row g-3 my-3" method="POST" action="<?=$base_url?>khoa/search">
                <div class="col-md-10">
                  <label for="inputPassword2" class="visually-hidden">timkiem</label>
                  <input type="text" class="form-control" id="inputPassword2" name="keyword_khoa" placeholder="Tìm kiếm khoa">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                </div>
              </form>
              <table class="table table-striped border">
                <thead>
                  <tr>
                    <th class="border">ID</th>    
                    <th class="text-start border">Khoa</th>
                    <th class="text-end">Thao tác</th>
                  </tr>
                </thead>

                <tbody>
                <?php   foreach($kq_khoa as $khoa): ?>  
                  <tr>
                    <td class="border"><?=$khoa['id']?></td>       
                    <td class="text-start border"><?=$khoa['tenkhoa']?></td>
                              
                    <td class="text-end">
                    <a href="<?=$base_url?>khoa/edit/<?=$khoa['id']?>"><button class="btn btn-warning">Đổi tên</button></a>
                      <button onclick="deleteKhoa(<?=$khoa['id']?>)" class="btn btn-danger">Xoá</button>
                    </td>
                  </tr>     
                  <?php endforeach; ?>                                                    
                </tbody>
              </table>

            
      </div>
<script>
    function deleteKhoa(id){
        var kq = confirm("Bạn có muốn xoá khoa này không");
        if( kq ){
            window.location = '<?=$base_url?>khoa/delete/'+id;
        }
    }
</script>