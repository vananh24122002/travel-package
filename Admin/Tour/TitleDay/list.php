<div class="table-main">
                <h2>Danh sách Title Day</h2>
                <form action="index.php?action=listtitleday" id="mid1" method="post" enctype="multipart/form-data">
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
            <a href="index.php?action=addtitleday"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã mục </th>
                    <th scope="col">Mã Tour</th>
                    <th scope="col">Mục 1</th>
                    <th scope="col">Mục 2</th>
                    <th scope="col">Mục 3</th>
                    <th scope="col">Mục 4</th>
                    <th scope="col">Mục 5</th>
                    <th scope="col">Mục 6</th>
                    <th scope="col">Mục 7</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($titleday as $title) {
                    extract($title); 
                    $suatitleday ="index.php?action=suatitleday&id_titleday=".$id_titleday;
                    $xoatitleday ="index.php?action=xoatitleday&id_titleday=".$id_titleday;
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_titleday ?></td>
                    <?php echo"<td>".substr($id_Tour, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc1, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc2, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc3, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc4, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc5, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc6, 0 ,10,)."... </td>"; ?>
                    <?php echo"<td>".substr($muc7, 0 ,10,)."... </td>"; ?>
                    
                    <td>
                    <?php
                    echo'<a href="'.$suatitleday.'">' ;?><input type="button" value="Sửa"></a>
                    <?php
                    echo'<a onclick="return Del('.$id_titleday.')" href="'.$xoatitleday.'">';?><input type="button" value="Xóa"></a>
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
        return confirm("Bạn có chắc chắn muốn xóa title day: " + name + "?");
    }
</script>