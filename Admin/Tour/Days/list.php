<div class="table-main">
                <h2>Danh sách DataDays</h2>
                <form action="index.php?action=listdays" id="mid1" method="post" enctype="multipart/form-data">
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
            <a href="index.php?action=adddays"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã </th>
                    <th scope="col">Tên Tour</th>
                    <th scope="col">Day 1</th>
                    <th scope="col">Day 2</th>
                    <th scope="col">Day 3</th>
                    <th scope="col">Day 4</th>
                    <th scope="col">Day 5</th>
                    <th scope="col">Day 6</th>
                    <th scope="col">Day 7</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($day as $daylist) {
                    extract($daylist); 
                    $suadays ="index.php?action=suadays&id_Day=".$id_Day;
                    $xoadays ="index.php?action=xoadays&id_Day=".$id_Day;
                  ?>
                  <tr>
                    <th><input type="checkbox"></th>
                    <td><?=$id_Day ?></td>
                    <?php echo"<td>".substr($id_Tour, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day1, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day2, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day3, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day4, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day5, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day6, 0 ,40,)."... </td>"; ?>
                    <?php echo"<td>".substr($day7, 0 ,40,)."... </td>"; ?>
                    
                    <td>
                    <?php
                    echo'<a href="'.$suadays.'">' ;?><input type="button" value="Sửa"></a>
                    <?php
                    echo'<a onclick="return Del('.$id_Day.')" href="'.$xoadays.'">';?><input type="button" value="Xóa"></a>
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
        return confirm("Bạn có chắc chắn muốn xóa tour: " + name + "?");
    }
</script>