<?php
    if(is_array($khoa)) {
        extract($khoa);
    }
?>

<div class="content mt-3 p-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Danh sách văn bản thuộc khoa <?=$tenkhoa?></strong>
                                </div>
                                <div class="card-body">
                                

                                    
                                        <table class="table table-striped table-hover my-4">
                                            <thead>
                                              <tr>
                                                <th class="border">STT</th>    
                                                <th class="text-start border">Tên văn bản</th>
                                                <th class="text-start border">Thể loại</th>
                                                <th class="text-start border">Khoa</th>
                                                <th class="text-start border">Ngày đăng</th>
                                                <th class="text-start border">Tệp tin</th>
                                                <th class="text-start border">Chỉnh sửa</th>
                                              </tr>
                                            </thead>
                                            <?php foreach($dsvb_khoa as $key => $item) {
                                                extract($item);
                                                $link_content = "$base_url_2/vanban/content/$idvb ";
                                                $link_file = "$base_url_2/vanban/download/$file";
                                                $link_edit = "$base_url_2/vanban/edit/$idvb";
                                              echo '<tbody>
                                              <tr>
                                                <td class="border">'.$idvb.'</td>       
                                                <td class="text-start border"><a href="'.$link_content.'" class="link-underline-light link-dark link-opacity-75-hover"
                                                >'.$tieude.'</a></td>   
                                                
                                                <td class="text-start border">
                                                  '.$loaivanban.'
                                                </td>
                                                
                                                <td class="text-start border">
                                                  '.$tenkhoa.'
                                                </td>
                                                <td class="text-start border">'.$ngaydang.'</td>   
                                                <td class="text-start border"><a class="link-underline-light link-dark link-opacity-75-hover" href="'.$link_file.'">'.$file.'</a></td>       
                                                <td class="text-end border">
                                                  <button class="btn btn-warning"><a class="link-dark " href="'.$link_edit.'"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                                  <button onclick="deleteDocument('.$idvb.')" class="btn btn-danger my-2 "><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                              </tr>                                                                                                                                                                                                                                                                                         
                                            </tbody> '; 
                                            } ?>
                                          </table>
                                
                                          <!-- Phân trang
                                        
                                              -->
                                    
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