<div class="table-main">
    <h2>Thêm Title Day</h2>
    <div class="form-insert">
        <form action="index.php?action=addtitleday" method="post">
            <div class="mb10">Mã title<br>
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
            <div class="mb10">Mục 1<br>
            <textarea cols="20" style="resize:none" name="muc1"></textarea></div>
            <div class="mb10">Mục 2<br>
            <textarea cols="20" style="resize:none" name="muc2"></textarea></div>
            <div class="mb10">Mục 3<br>
            <textarea cols="20" style="resize:none" name="muc3"></textarea></div>
            <div class="mb10">Mục 4<br>
            <textarea cols="20" style="resize:none" name="muc4"></textarea></div>
            <div class="mb10">Mục 5<br>
            <textarea cols="20" style="resize:none" name="muc5"></textarea></div>
            <div class="mb10">Mục 6<br>
            <textarea cols="20" style="resize:none" name="muc6"></textarea></div>
            <div class="mb10">Mục 7<br>
            <textarea cols="20" style="resize:none" name="muc7"></textarea></div>
            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtitleday"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
    }
</script>