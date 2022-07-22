<?php
if(is_array($suaday)){
    extract($suaday);
}
?>
<div class="table-main">
    <h2>Cập nhật DataDays</h2>
    <div class="form-insert">
        <form action="index.php?action=capnhatdays" method="post">
            <div class="mb10">Mã Days<br>
            <input type="number" name="id_Day" disabled><br></div>
            <div class="mb10">Tên Tour<br>
            <select name="id_Tour">
                <?php
                    foreach ($tour as $tourlist) {
                       extract($tourlist);
                       if($tourlist['id_Tour']==($suaday['id_Tour'])){?>
                           <option value="<?=$id_Tour ?>" selected><?=$nameTour?></option>
                <?php }else{ ?>
                            <option value="<?=$id_Tour ?>"><?=$nameTour?></option>
                    <?php } } ?>
            </select></div>
            <div class="mb10">Day 1<br>
            <textarea cols="8" style="resize:none" name="day1" ><?=$day1?></textarea></div>
            <div class="mb10">Day 2<br>
            <textarea cols="8" style="resize:none" name="day2" ><?=$day2?></textarea></div>
            <div class="mb10">Day 3<br>
            <textarea cols="8" style="resize:none" name="day3"><?=$day3?></textarea></div>
            <div class="mb10">Day 4<br>
            <textarea cols="8" style="resize:none" name="day4" ><?=$day4?></textarea></div>
            <div class="mb10">Day 5<br>
            <textarea cols="8" style="resize:none" name="day5" ><?=$day5?></textarea></div>
            <div class="mb10">Day 6<br>
            <textarea cols="8" style="resize:none" name="day6" ><?=$day6?></textarea></div>
            <div class="mb10">Day 7<br>
            <textarea cols="8" style="resize:none" name="day7" ><?=$day7?></textarea></div>
            <div class="mb10">
            <input type="hidden" name="id_Day" value="<?=$id_Day?>">
            <input type="submit" name="capnhat" value="Cập nhật">
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