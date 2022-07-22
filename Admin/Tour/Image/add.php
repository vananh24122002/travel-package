<div class="table-main">
    <h2>Thêm Image</h2>
    <div class="form-insert">
        <form action="index.php?action=addimage" method="post">
            <div class="mb10">Mã title<br>
            <input type="number" name="id_image" disabled><br></div>
            <div class="mb10">Tên Tour<br>
            <select name="id_Tour">
                <?php
                    foreach ($tour as $dm) {
                        extract($dm);
                        echo'<option value="'.$id_Tour.'">'.$nameTour.'</option>';
                    }
                ?>
            </select></div>
            <div class="mb10">Image 1<br>
            <input type="text" name="image1"><br></div>
            <div class="mb10">Image 2<br>
            <input type="text" name="image2"><br></div>
            <div class="mb10">Image 3<br>
            <input type="text" name="image3"><br></div>
            <div class="mb10">Image 4<br>
            <input type="text" name="image4"><br></div>
            <div class="mb10">Image 5<br>
            <input type="text" name="image5"><br></div>
            <div class="mb10">Image 6<br>
            <input type="text" name="image6"><br></div>
            <div class="mb10">Image 7<br>
            <input type="text" name="image7"><br></div>
            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listimage"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
    }
</script>