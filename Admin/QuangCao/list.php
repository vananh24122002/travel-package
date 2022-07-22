<div class="table-main">
                <h2>Danh sách quảng cáo</h2>
            <form action="index.php?action=listtintucbv" id="mid1" method="post">
            <table class="table table-striped">
              </form>
            <a href="index.php?action=addqc"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã quảng cáo</th>
                    <th scope="col">Tên quảng cáo</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Layout chứa</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($loadall_qc as $qc) {
                    extract($qc);
                    $xoaqc = "index.php?action=xoaqc&id_qc=".$id_qc;
                    $suaqc = "index.php?action=capnhatqc&id_qc=".$id_qc;
                    $hinhpath = "../upload/".$banner;
                    if(is_file($hinhpath)){
                        $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                        $hinh = "no photo";
                    }
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_qc ?></td>
                    <td><?=$nameqc?></td>
                    <td><?=$hinh ?></td>
                    <td> <?php
                        if($layout==1){
                          echo('Home');
                        }else{
                          echo('Bài viết chi tiết');
                        }
                      ?></td>
                    <td><?=substr($link,0,30) ?></td>
                    <td>
                      <?php
                        if($trangthai==1){
                          echo('<div class="danghoatdong"><a style="color:white;"  href="">Họat động</a></div>');
                        }else{
                          echo('<div class="danghoatdong"><a style="color:white;" href="">Ẩn</a></div>');
                        }
                      ?>
                    </td>
                    <td>
                    <?php
                    echo'<a href="'.$suaqc.'">' ;?><button id="none" type="button" value=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    <?php
                    echo'<a onclick="return Del('.$id_qc.')" href="'.$xoaqc.'">';?><button id="none" type="button" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                 </table>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả"></div>
            </div>
              
            <!-- phân trang -->
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
</nav>


           </div>   
           <script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa danh mục: " + name + "?");
    }
</script>