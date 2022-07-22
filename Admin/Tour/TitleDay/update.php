<?php
if(is_array($suatitleday)){
    extract($suatitleday);
}
?>
<div class="table-main">
    <h2>Cập nhật Title Day</h2>
    <div class="form-insert">
        <form action="index.php?action=capnhattitleday" method="post">
            <div class="mb10">Mã Title Day<br>
            <input type="number" name="id_titleday" disabled><br></div>
            <div class="mb10">Tên Tour<br>
            <select name="id_Tour">
                <?php
                    foreach ($tour as $tourlist) {
                       extract($tourlist);
                       if($tourlist['id_Tour']==($suatitleday['id_Tour'])){?>
                           <option value="<?=$id_Tour ?>" selected><?=$nameTour?></option>
                <?php }else{ ?>
                            <option value="<?=$id_Tour ?>"><?=$nameTour?></option>
                    <?php } } ?>
            </select></div>
            <div class="mb10">Mục 1<br>
            <textarea cols="20" style="resize:none" name="muc1" ><?=$muc1?></textarea></div>
            <div class="mb10">Mục 2<br>
            <textarea cols="20" style="resize:none" name="muc2" ><?=$muc2?></textarea></div>
            <div class="mb10">Mục 3<br>
            <textarea cols="20" style="resize:none" name="muc3"><?=$muc3?></textarea></div>
            <div class="mb10">Mục 4<br>
            <textarea cols="20" style="resize:none" name="muc4" ><?=$muc4?></textarea></div>
            <div class="mb10">Mục 5<br>
            <textarea cols="20" style="resize:none" name="muc5" ><?=$muc5?></textarea></div>
            <div class="mb10">Mục 6<br>
            <textarea cols="20" style="resize:none" name="muc6" ><?=$muc6?></textarea></div>
            <div class="mb10">Mục 7<br>
            <textarea cols="20" style="resize:none" name="muc7" ><?=$muc7?></textarea></div>
            <div class="mb10">
            <input type="hidden" name="id_titleday" value="<?=$id_titleday?>">
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