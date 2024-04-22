<div class="content mt-3 p-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Văn bản</strong>
                                </div>
                                <div class="card-body">
                                    <form action="<?=$base_url?>vanban/search" method="POST" class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="" class="form-control-label m-2 h5">Loại văn bản</label>
                                            
                                            <select class="form-select" name="loaivanban">
                                            <option value="0" selected>Tất cả</option>
                                            <?php
                                                foreach ($dsLoaiVanBan as $lvb) {
                                                echo '<option value="'.$lvb['id'].'"';
                                                echo '>'.$lvb['loaivanban'].'</option>';
                                                }
                                            ?>
                                        
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="form-control-label m-2 h5">Khoa</label>
                                            
                                            <select class="form-select" name="idkhoa">
                                            <option value="0" selected>Tất cả</option>
                                            <?php
                                                foreach ($dskhoa as $khoa) {
                                                echo '<option value="'.$khoa['id'].'"';
                                                echo '>'.$khoa['tenkhoa'].'</option>';
                                                }
                                            ?>
                                        
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="m-2 h5" for="date">Ngày ký văn bản</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                       
                                        <div class="form-group col-md-4 my-4">                                       
                                            <input type="text" class="form-control" name="keyword_vb" placeholder="Nhập tên văn bản">                                         
                                        </div>
                                        <div class="col-auto my-4">
                                          <input type="submit" class="btn btn-primary"  value="Tìm kiếm">
                                        </div>                                       
                                                                            
                                        <div class="col-auto my-4">                                                                               
                                          <button type="button" class="btn btn-primary"><a href="<?=$base_url?>vanban/add" class="link-underline-primary text-white">Thêm văn bản</a></button>                                                                                                                           
                                        </div>  
                                        

                                    </form>

                                    
                                        <table class="table table-striped border">
                                            <thead>
                                              <tr>
                                                <th class="border">STT</th>    
                                                <th class="text-start border">Tên văn bản</th>
                                                <th class="text-start border">Thể loại</th>
                                                <th class="text-start border">Khoa</th>
                                                <th class="text-start border">Ngày đăng</th>
                                                <th class="text-start border">Tệp tin</th>
                                                <th class="text-end">Chỉnh sửa</th>
                                              </tr>
                                            </thead>
                                            <?php $i=1;  foreach($timkiem as $vb): ?> 
                                            <tbody>
                                              <tr>
                                                <td class="border"><?=$i?></td>       
                                                <td class="text-start border"><a href="<?=$base_url?>vanban/content/<?=$vb['idvb']?>" class="link-underline-light link-dark link-opacity-75-hover"
                                                ><?=$vb['tieude']?></a></td>   
                                                
                                                <td class="text-start border">
                                                  <?=$vb['loaivanban']?>                     
                                                </td>

                                                <td class="text-start border">
                                                  <?=$vb['tenkhoa']?>
                                                </td>
                                                <td class="text-start border"><?=$vb['ngaydang']?></td>   
                                                <td class="text-start border"><a class="link-underline-light link-dark link-opacity-75-hover" href="<?=$base_url?>/vanban/download/<?=$vb['file']?>"><?=$vb['file']?> </a></td>       
                                                <td class="text-end">
                                                  <button class="btn btn-warning"><a class="link-dark" href="<?=$base_url?>vanban/edit/<?=$vb['idvb']?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                                  <button onclick="deleteDocument(<?=$vb['idvb']?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                              </tr>
                                              <?php $i++;  endforeach; ?>                                                                                                                                                                                                                                                                                                        
                                            </tbody>
                                          </table>
                                
                                        
                                          
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    function deleteDocument(id){
        var kq = confirm("Bạn có muốn xoá văn bản này không");
        if( kq ){
            window.location = '<?=$base_url?>vanban/delete/'+id;
        }
    }
</script>