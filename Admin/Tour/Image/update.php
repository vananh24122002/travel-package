<?php
if(is_array($suaimg)){
    extract($suaimg);
}
?>
<div class="table-main">
    <h2>Cập nhật Image</h2>
    <div class="form-insert">
        <form action="index.php?action=capnhatimage" method="post">
            <div class="mb10">Mã Image<br>
            <input type="number" name="id_image" disabled><br></div>
            <div class="mb10">Tên Tour<br>
            <select name="id_Tour">
                <?php
                    foreach ($tour as $tourlist) {
                       extract($tourlist);
                       if($tourlist['id_Tour']==($suaimg['id_Tour'])){?>
                           <option value="<?=$id_Tour ?>" selected><?=$nameTour?></option>
                <?php }else{ ?>
                            <option value="<?=$id_Tour ?>"><?=$nameTour?></option>
                    <?php } } ?>
            </select></div>
            <div class="mb10">Image 1<br>
            <input type="text" name="image1" value="<?=$image1?>"><br></div>
            <div class="mb10">Image 2<br>
            <input type="text" name="image2" value="<?=$image2?>"><br></div>
            <div class="mb10">Image 3<br>
            <input type="text" name="image3" value="<?=$image3?>"><br></div>
            <div class="mb10">Image 4<br>
            <input type="text" name="image4" value="<?=$image4?>"><br></div>
            <div class="mb10">Image 5<br>
            <input type="text" name="image5" value="<?=$image5?>"><br></div>
            <div class="mb10">Image 6<br>
            <input type="text" name="image6" value="<?=$image6?>"><br></div>
            <div class="mb10">Image 7<br>
            <input type="text" name="image7" value="<?=$image7?>"><br></div>
            <div class="mb10">
            <input type="hidden" name="id_image" value="<?=$id_image?>">
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