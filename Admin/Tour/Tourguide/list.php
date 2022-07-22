<div class="table-main">
                <h2>Danh sách các TourGuide</h2>
                <form action="index.php?action=listtour" id="mid1" method="post" enctype="multipart/form-data">
                <table class="table table-striped">
                <input id="searchlist" type="search" name="key" placeholder="Nhập từ khóa tìm kiếm...">
                <select name="id_DMTour">
                    <option value="0" seleted>Tất cả ( danh mục )</option>
                    <?php
                        foreach ($tourdm as $dm) {
                        extract($dm);
                        echo'<option value="'.$id_DMTour.'">'.$nameDMTour.'</option>';
                        }
                    ?>
                </select>
                <input id="search" type="submit" name="searchlist" value="Tìm kiếm">
                </form>
            <a href="index.php?action=addtour"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã danh mục</th>
                    <th scope="col">Tên Tour</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Mã mục</th>
                    <th scope="col">Chuyến đi</th>
                    <th scope="col"><i class="fa fa-shopping-cart" aria-hidden="true"></i></th>
                    <th scope="col">Giá</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($tour as $tourlist) {
                    extract($tourlist);
                    $hinhpath = "../upload/".$banner;
                    if(is_file($hinhpath)){
                      $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                      $hinh = "no photo";
                    }
                    $suatour ="index.php?action=suatour&id_Tour=".$id_Tour;
                    $xoatour ="index.php?action=xoatour&id_Tour=".$id_Tour;
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_Tour ?></td>
                    <?php echo"<td><a href='../index.php?view=booktour&id_Tour=".$id_Tour."'>".substr($nameTour, 0 ,80,)."... </a></td>"; 
                    ?>
                     <td><?=$hinh ?></td>
                     <td><?=$id_DMTour ?></td>
                     <td>
                      <?php
                        if($id_chuyendi==1){
                          echo('CHUYẾN ĐI  GIA ĐÌNH');
                        }elseif($id_chuyendi==2){
                          echo('CHUYẾN ĐI CÁ NHÂN');
                        }else{
                          echo('CHUYẾN ĐI CẶP ĐÔI');
                        }
                      ?>
                    </td>
                     <td><?=$soLuotDat ?></td>
                     <td>$<?=$donGia ?></td>
                    <td>
                    <?php
                    echo'<a href="'.$suatour.'">' ;?><input type="button" value="Sửa"></a>
                    <?php
                    echo'<a onclick="return Del('.$id_Tour.')" href="'.$xoatour.'">';?><input type="button" value="Xóa"></a>
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
            <?php $count = $count_booktour['count_array'];
                  $pages = ceil($count/10);
            ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <?php for($i = 1 ; $i<=$pages ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="index.php?action=listtour&pages=<?=$i?>"><?php echo $i ?></a></li>
                <?php } ?>
              </ul>
          </nav>
          
           </div>   
           <script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa tour: " + name + "?");
    }
</script>