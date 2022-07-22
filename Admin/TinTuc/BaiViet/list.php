<div class="table-main">
                <h2>Danh sách bài viết</h2>
            <form action="index.php?action=listtintucbv" id="mid1" method="post">
            <table class="table table-striped">
            <input id="searchlist" type="search" name="key" placeholder="Nhập từ khóa tìm kiếm...">
            <select name="id_DMTT">
            <option value="0" seleted>Tất cả</option>
                <?php
                    foreach ($listdmtintuc as $listdm) {
                       extract($listdm);
                       echo'<option value="'.$id_DMTT.'">'.$nameDMTT.'</option>';
                    }
                ?>
            </select>
               <input id="search" type="submit" name="searchlist" value="Tìm kiếm">
              </form>
            <a href="index.php?action=addtintucbv"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã bài viết</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col"><i class="fa fa-eye" aria-hidden="true"></i></th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($tintuc as $tt) {
                    extract($tt);
                    $xoatintuctt = "index.php?action=xoatintuctt&id_bai=".$id_bai;
                    $suatintuctt = "index.php?action=suatintuctt&id_bai=".$id_bai;
                    $hinhpath = "../upload/".$hinhAnh;
                    if(is_file($hinhpath)){
                        $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                        $hinh = "no photo";
                    }
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_bai ?></td>
                    <?php
                     echo"<td>".substr($tt['tieuDe'], 0 ,170,)." </td>"; 
                     ?>
                    <td><?=$hinh ?></td>
                    <td><?=$id_DMTT ?></td>
                    <td><?=$tacGia ?></td>
                    <td><?=$soLuotXem ?></td>
                    <td>
                      <?php
                        if($tinhTrang==1){
                          echo('Xuất bản');
                        }else{
                          echo('Ẩn');
                        }
                      ?>
                    </td>
                    <td>
                    <?php
                    echo'<a href="'.$suatintuctt.'">' ;?><button id="none" type="button" value=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    <?php
                    echo'<a onclick="return Del('.$id_bai.')" href="'.$xoatintuctt.'">';?><button id="none" type="button" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
            <?php $count = $count_tintuc['count_array'];
                  $pages = ceil($count/10);
            ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <?php for($i = 1 ; $i<=$pages ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="index.php?action=listtintucbv&pages=<?=$i?>"><?php echo $i ?></a></li>
                <?php } ?>
              </ul>
          </nav>


           </div>   
           <script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa danh mục: " + name + "?");
    }
</script>