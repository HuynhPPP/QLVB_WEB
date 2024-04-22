<h2 class="container my-3 text-bg-primary p-3">Danh sách loại văn bản</h2>
        <div class="container border border-light-subtle my-4 p-3">             
             
                     
              <a href="<?=$base_url?>loaiVB/add" class="btn btn-primary float-end">Thêm loại văn bản</a>
              

              <form class="row g-3 my-3" method="POST" action="<?=$base_url?>loaiVB/search">
                <div class="col-md-10">
                  <label for="inputPassword2" class="visually-hidden">timkiem</label>
                  <input type="text" class="form-control" id="inputPassword2" name="keyword_type" placeholder="Tìm kiếm loại văn bản">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                </div>
              </form>
              <table class="table table-striped border">
                <thead>
                  <tr>
                    <th class="border">STT</th>    
                    <th class="text-start border">Loại văn bản</th>
                    <th class="text-end">Thao tác</th>
                  </tr>
                </thead>

                <tbody>
                <?php  $i=1;  foreach($dsLoaiVanBan as $lvb): ?>  
                  <tr>
                    <td class="border"><?=$i?></td>       
                    <td class="text-start border"><?=$lvb['loaivanban']?></td>
                              
                    <td class="text-end">
                    <a href="<?=$base_url?>loaiVB/edit/<?=$lvb['id']?>"><button class="btn btn-warning">Sửa</button></a>
                      <button onclick="deleteTypeDocument(<?=$lvb['id']?>)" class="btn btn-danger">Xoá</button>
                    </td>
                  </tr>     
                  <?php $i++;  endforeach; ?>                                                    
                </tbody>
              </table>

            
      </div>
<script>
    function deleteTypeDocument(id){
        var kq = confirm("Bạn có muốn xoá loại văn bản này không");
        if( kq ){
            window.location = '<?=$base_url?>loaiVB/delete/'+id;
        }
    }
</script>