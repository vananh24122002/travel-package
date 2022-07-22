<div class="table-main">
    <h2>Thêm bài viết</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" id="form-add"  method="post"  enctype="multipart/form-data">
            <div class="mb10 invalid">Tên bài viết <span style="color:red">*</span><br>
            <input type="text" id="tieuDe" name="tieuDe"><br>
            <small id="error-tieuDe" class="form-error"></small>
            </div>

            <div class="mb10">Hình minh họa <span style="color:red">*</span><br>
            <input type="file" id="hinhAnh" name="hinhAnh"><br>
            <small id="error-hinhAnh" class="form-error"></small>
            </div>
            <div class="mb10">Chú thích<br>
            <input type="text" id="chuThich" name="chuThich"><br>
            </div>

            <div class="mb10">Giới thiệu ngắn gọn <span style="color:red">*</span> <i>( Tóm tắt đầu của bài viết )</i><br>
            <textarea rows=10 id="tomTat" name="tomTat" style="resize:none"></textarea>
            <small id="error-tomTat" class="form-error"></small>
            </div>

            <div class="mb10">Nội dung chi tiết <span style="color:red">*</span><br>
            <textarea rows=100 id="noiDung" name="noiDung" style="resize:none"></textarea>
            <small id="error-noiDung" class="form-error"></small>
            </div>
            <div class="mb10">Danh mục <span style="color:red">*</span><br>
            <select id="id_DMTT" name="id_DMTT">
            <option value="0">---Chọn danh mục ---</option>
                <?php
                    foreach ($listdmtintuc as $listdm) {
                       extract($listdm);
                       echo'<option value="'.$id_DMTT.'">'.$nameDMTT.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_DMTT" class="form-error"></small>
            </div>
            <div class="mb10"> Nhập keyword cho bài viết <i>( Tags )</i> <br>
            <input type="text" id="keyWord" name="keyWord"><br></div>
            <div class="mb10">Tác giả<br>
            <input type="text" name="tacGia" value="<?=$_SESSION['username']['username']?>"><br></div>
            <div class="mb10">Tình trạng<br>
            <select name="tinhTrang" id="tinhTrang">
                    <option value= 1>Kích hoạt</option>
                    <option value= 0>Ẩn</option>
            </select></div>
            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm bài viết">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtintucbv"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="tieuDe"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-tieuDe").text("");
        });
        $('[name*="hinhAnh"]').focus(function() {
        $("#error-hinhAnh").text("");
        });
        $('[name*="tomTat"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-tomTat").text("");
        });
        $('[name*="noiDung"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-noiDung").text("");
        });
        $('[name*="id_DMTT"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_DMTT").text("");
        });
        
                    $('#form-add').submit(function(e) {
                            e.preventDefault();
                            var tieuDe = $('[name*="tieuDe"]').val();
                            var hinhAnh = $('[name*="hinhAnh"]').val();
                            var tomTat = $('[name*="tomTat"]').val();
                            var noiDung = $('[name*="noiDung"]').val();
                            var id_DMTT = $('[name*="id_DMTT"]').val();
                            if (tieuDe == "" || hinhAnh == "" || tomTat == "" || noiDung == "" || id_DMTT == 0) {
                                // hiển thị lỗi trống
                                if ($('[name*="tieuDe"]').val() == "") {
                                    $('[name*="tieuDe"]').css("border", "1px solid red");
                                    $("#error-tieuDe").text("Bạn chưa nhập tên bài viết !");
                                }
                                if ($('[name*="hinhAnh"]').val() == "") {
                                    $("#error-hinhAnh").text("Bạn chưa chọn hình ảnh !");
                                }
                                if ($('[name*="tomTat"]').val() == "") {
                                    $('[name*="tomTat"]').css("border", "1px solid red");
                                    $("#error-tomTat").text("Bạn chưa nhập giới thiệu bài viết !");
                                }
                                if ($('[name*="noiDung"]').val() == "") {
                                    $('[name*="noiDung"]').css("border", "1px solid red");
                                    $("#error-noiDung").text("Bạn chưa nhập nội dung bài viết !");
                                }
                                if ($('[name*="id_DMTT"]').val() == "") {
                                    $('[name*="id_DMTT"]').css("border", "1px solid red");
                                    $("#error-id_DMTT").text("Bạn chưa chọn danh mục !");
                                }
                                } else { 
                                        //    ajax
                                       
                                        $.ajax({
                                        type: "POST",
                                        url: "TinTuc/BaiViet/action.php",
                                        data : new FormData(this),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data){
                                            // console.log(data);
                                        if(data==1){
                                            alert('Thêm bài viết thành công!!');
                                            location.href='index.php?action=listtintucbv';
                                        }else if(data==2){
                                            $('[name*="tieuDe"]').css("border", "1px solid red");
                                            $("#error-tieuDe").text("Tên bài viết này đã tồn tại !");
                                        }else if(data==3){
                                            $('[name*="noiDung"]').css("border", "1px solid red");
                                            $("#error-noiDung").text("Nội dung quá ngắn !");

                                        }else{
                                            alert('Thêm thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>