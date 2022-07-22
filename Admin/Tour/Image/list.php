<div class="table-main">
                <h2>Danh sách Image</h2>
                <form action="index.php?action=listimage" id="mid1" method="post" enctype="multipart/form-data">
                <table class="table table-striped">
                <input id="searchlist" type="search" name="key" placeholder="Nhập từ khóa tìm kiếm...">
                <select name="id_Tour">
                    <option value="0" seleted>Tất cả ( Tên Tour )</option>
                    <?php
                        foreach ($tour as $dm) {
                        extract($dm);
                        echo'<option value="'.$id_Tour.'">'.$nameTour.'</option>';
                        }
                    ?>
                </select>
                <input id="search" type="submit" name="searchlist" value="Tìm kiếm">
                </form>
            <a href="index.php?action=addimage"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã </th>
                    <th scope="col">Tên Tour</th>
                    <th scope="col">img 1</th>
                    <th scope="col">img 2</th>
                    <th scope="col">img 3</th>
                    <th scope="col">img 4</th>
                    <th scope="col">img 5</th>
                    <th scope="col">img 6</th>
                    <th scope="col">img 7</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($image as $imagelist) {
                    extract($imagelist); 
                    $suaimage ="index.php?action=suaimage&id_image=".$id_image;
                    $xoaimage ="index.php?action=xoaimage&id_image=".$id_image;
                    if($image1==""){//hình1
                        $hinh1 = "";
                    }else{
                        $hinh1 = "<img src='".$image1."' height='80' width='80'>"; 
                    }
                    if($image2==""){//hình2
                      $hinh2 = "";
                    }else{
                      $hinh2 = "<img src='".$image2."' height='80' width='80'>"; 
                    }
                    if($image3==""){//hình3
                      $hinh3 = "";
                    }else{
                      $hinh3 = "<img src='".$image3."' height='80' width='80'>"; 
                    }
                    if($image4==""){//hình4
                        $hinh4 = "";
                    }else{
                      $hinh4 = "<img src='".$image4."' height='80' width='80'>"; 
                    }
                    if($image5==""){//hình5
                        $hinh5 = "";
                    }else{
                        $hinh5 = "<img src='".$image5."' height='80' width='80'>"; 
                    }
                    if($image6==""){//hình6
                        $hinh6 = "";
                    }else{
                        $hinh6 = "<img src='".$image6."' height='80' width='80'>"; 
                    }
                    if($image7==""){//hình7
                      $hinh7 = "";
                    }else{
                      $hinh7 = "<img src='".$image7."' height='80' width='80'>"; 
                  }
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_image ?></td>
                    <td><?=$id_Tour?></td>
                    <td><?=$hinh1?></td>
                    <td><?=$hinh2?></td>
                    <td><?=$hinh3?></td>
                    <td><?=$hinh4?></td>
                    <td><?=$hinh5?></td>
                    <td><?=$hinh6?></td>
                    <td><?=$hinh7?></td>
                    <td>
                    <?php
                    echo'<a href="'.$suaimage.'">' ;?><input type="button" value="Sửa"></a>
                    <?php
                    echo'<a onclick="return Del('.$id_image.')" href="'.$xoaimage.'">';?><input type="button" value="Xóa"></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                 </table>
              <div class="mb10">
            <input type="button" id="t1"  value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả"></div>
            </div>

           </div>   
           <script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa : " + name + "?");
    }
</script>