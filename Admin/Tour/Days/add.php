<div class="table-main">
    <h2>Thêm DataDays</h2>
    <div class="form-insert">
        <form action="index.php?action=adddays" method="post">
            <div class="mb10">Mã Days<br>
            <input type="number" name="id_Day" disabled><br></div>
            <div class="mb10">Tên Tour<br>
            <select name="id_Tour">
                <?php
                    foreach ($tour as $dm) {
                        extract($dm);
                        echo'<option value="'.$id_Tour.'">'.$nameTour.'</option>';
                    }
                ?>
            </select></div>
            <div class="mb10">Day 1<br>
            <textarea cols="8" style="resize:none" name="day1"></textarea></div>
            <div class="mb10">Day 2<br>
            <textarea cols="8" style="resize:none" name="day2"></textarea></div>
            <div class="mb10">Day 3<br>
            <textarea cols="8" style="resize:none" name="day3"></textarea></div>
            <div class="mb10">Day 4<br>
            <textarea cols="8" style="resize:none" name="day4"></textarea></div>
            <div class="mb10">Day 5<br>
            <textarea cols="8" style="resize:none" name="day5"></textarea></div>
            <div class="mb10">Day 6<br>
            <textarea cols="8" style="resize:none" name="day6"></textarea></div>
            <div class="mb10">Day 7<br>
            <textarea cols="8" style="resize:none" name="day7"></textarea></div>
            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listdays"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
    }
</script>