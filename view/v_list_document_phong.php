

<div class="content mt-3 p-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Văn bản chung</strong>
                                </div>
                                <div class="card-body">
                                    <form action="<?=$base_url?>phong/search_vanban_chung" method="POST" class="row">
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
                                            <label for="" class="form-control-label m-2 h5">Phòng</label>
                                            <select class="form-select" name="idphong">
                                            <option value="0" selected>Tất cả</option>
                                            <?php
                                                foreach ($dsphong as $phong) {
                                                echo '<option value="'.$phong['id'].'"';
                                                echo '>'.$phong['tenphong'].'</option>';
                                                }
                                            ?>
                                        
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="m-2 h5" for="date">Ngày ký văn bản</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        
                                        <div class="form-group col-md-4 my-4">                                       
                                            <input type="text" class="form-control" name="keyword_vb_chung" placeholder="Nhập tên văn bản">                                         
                                        </div>

                                        <div class="col-auto my-4">
                                          <input type="submit" name="timkiem" class="btn btn-primary"  value="Tìm kiếm">
                                        </div>  
                                       
                                        <div class="col-auto my-4">                                                                         
                                        <button type="button" class="btn btn-primary"><a href="<?=$base_url?>phong/add_vanban_chung" class="link-underline-primary text-white">Thêm văn bản</a></button>   
                                                                                                                          
                                        </div>  

                                    </form>

                                    
                                        <table class="table table-striped table-hover ">
                                            <thead>
                                              <tr>
                                                <th class="border">STT</th>    
                                                <th class="text-start border">Tên văn bản</th>
                                                <th class="text-start border">Thể loại</th>
                                                <th class="text-start border">Phòng</th>
                                                <th class="text-start border">Ngày đăng</th>
                                                <th class="text-start border">Tệp tin</th>
                                                <th class="text-start border">Chỉnh sửa</th>
                                              </tr>
                                            </thead>
                                            <?php $i=1;  foreach($dsvanban_chung as $vb): ?> 
                                            <tbody>
                                              <tr>
                                                <td class="border"><?=$i?></td>       
                                                <td class="text-start border"><a href="<?=$base_url?>phong/content_admin/<?=$vb['idvb_chung']?>" class="link-underline-light link-dark link-opacity-75-hover"
                                                ><?=$vb['tenvanban']?></a></td>   
                                                
                                                <td class="text-start border ">
                                                  <?=$vb['loaivanban']?>
                                                </td>
                                                
                                                <td class="text-start border">
                                                  <?=$vb['tenphong']?>
                                                </td>
                                                <td class="text-start border"><?=$vb['ngaydang']?></td>   
                                                <td class="text-start border"><a class="link-underline-light link-dark link-opacity-75-hover" href="<?=$base_url?>/vanban/download/<?=$vb['file']?>"><?=$vb['file']?></a></td>       
                                                <td class="text-end border">
                                                  <button class="btn btn-warning"><a class="link-dark link-underline-light" href="<?=$base_url?>phong/edit_vanban_chung/<?=$vb['idvb_chung']?>">Sửa</a></button>
                                                  <button onclick="deleteDocument(<?=$vb['idvb_chung']?>)" class="btn btn-danger my-2 ">Xoá</button>
                                                </td>
                                              </tr>
                                              <?php $i++;  endforeach; ?>                                                                                                                                                                                                                                                                                                        
                                            </tbody>
                                          </table>

                                          <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-end">
                                              <li class="page-item <?=($page <= 1)?'disabled':''?>">
                                                <a class="page-link" href="<?=$base_url?>/phong/list/<?=$page-1?>" aria-label="Previous">
                                                  <span aria-hidden="true">&laquo;</span>
                                                </a>
                                              </li>
                                              
                                              <?php for($i = 1; $i <= $sotrang; $i++): ?>
                                              <li class="page-item <?=($page == $i)?'active':''?>">
                                                <a class="page-link" href="<?=$base_url?>/phong/list/<?=$i?>"><?=$i?></a>
                                              </li>
                                              <?php endfor; ?>
                                    
                                              <li class="page-item <?=($page >= $sotrang)?'disabled':''?>">
                                                <a class="page-link" href="<?=$base_url?>/phong/list/<?=$page+1?>" aria-label="Next">
                                                  <span aria-hidden="true">&raquo;</span>
                                                </a>
                                              </li>
                                            </ul>
                                          </nav>
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
            window.location = '<?=$base_url?>phong/delete_vanban_chung/'+id;
        }
    }
</script>