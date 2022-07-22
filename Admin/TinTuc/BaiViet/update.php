<?php
if(is_array($suatintuc)){
    extract($suatintuc);
}
$hinhpath = "../upload/".$hinhAnh;
    if(is_file($hinhpath)){
        $hinh = "<img src='".$hinhpath."' height='80'>";
    }else{
        $hinh = "no photo";
    }
?>
<div class="table-main">
    <h2>Cập nhật bài viết</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="index.php?action=capnhattintuctt" id="form-update" method="post" enctype="multipart/form-data">
            <div class="mb10">Tên bài viết <span style="color:red">*</span><br>
            <input type="text" id="tieuDe_update" name="tieuDe_update" value="<?=$tieuDe?>"><br>
            <small id="error-tieuDe" class="form-error"></small>
            </div>

            <div class="mb10">Hình minh họa <span style="color:red">*</span><br>
            <input type="file" id ="hinhAnh" name="hinhAnh"><?=$hinh?><br></div>

            <div class="mb10">Chú thích<br>
            <input type="text" id="chuThich" name="chuThich" value="<?=$chuThich?>"><br></div>

            <div class="mb10">Giới thiệu ngắn gọn <span style="color:red">*</span> <i>( Tóm tắt đầu của bài viết )</i><br>
            <textarea rows=10 id="tomTat" name="tomTat" style="resize:none"><?=$tomTat?></textarea>
            <small id="error-tomTat" class="form-error"></small>
            </div>
            <div class="mb10">Nội dung chi tiết <span style="color:red">*</span><br>
            <textarea rows=100 id="noiDung" name="noiDung" style="resize:none" ><?=$noiDung?></textarea>
            <small id="error-noiDung" class="form-error"></small>
            </div>
            <div class="mb10">Danh mục <span style="color:red">*</span><br>
            <select id="id_DMTT" name="id_DMTT">
                <?php
                    foreach ($listdmtintuc as $listdm) {
                       extract($listdm);
                       if($listdm['id_DMTT']==($suatintuc['id_DMTT'])){?>
                           <option value="<?=$id_DMTT ?>" selected><?=$nameDMTT?></option>
                <?php }else{ ?>
                            <option value="<?=$id_DMTT ?>"><?=$nameDMTT?></option>
                    <?php } } ?>
            </select>
            <small id="error-id_DMTT" class="form-error"></small>
            </div>
            <div class="mb10"> Nhập keyword cho bài viết <i>( Tags )</i> <br>
            <input type="text" id="keyWord" name="keyWord" value="<?=$keyWord?>"><br></div>
            <div class="mb10">Tác giả<br>
            <input type="text" id="tacGia" name="tacGia" value="<?=$tacGia?>"><br></div>
            <div class="mb10">Tình trạng<br>
            <select id="tinhTrang" name="tinhTrang">
                <?php if($tinhTrang==1){ ?>
                    <option value="<?=$tinhTrang?>" selected>Đang hoạt động</option>;
                    <option value="0">Ẩn</option>
                <?php }else{ ?>  
                    <option value="<?=$tinhTrang?>" selected>Ẩn</option>;
                    <option value="1">Kích hoạt</option>
                    <?php } ?>
            </select></div>
            <div class="mb10">
                <input type="hidden" id="id_bai" name="id_bai" value="<?=$id_bai ?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtintucbv"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="tieuDe_update"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-tieuDe_update").text("");
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
        
                    $('#form-update').submit(function(e) {
                            e.preventDefault();
                            var tieuDe_update = $('[name*="tieuDe_update"]').val();                  
                            var tomTat = $('[name*="tomTat"]').val();
                            var noiDung = $('[name*="noiDung"]').val();
                            var id_DMTT = $('[name*="id_DMTT"]').val();
                            if (tieuDe_update == ""  || tomTat == "" || noiDung == "" || id_DMTT == 0) {
                                console.log('er');
                                // hiển thị lỗi trống
                                if ($('[name*="tieuDe_update"]').val() == "") {
                                    $('[name*="tieuDe_update"]').css("border", "1px solid red");
                                    $("#error-tieuDe_update").text("Bạn chưa nhập tên bài viết !");
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
                                        // console.log('ok');
                                        $.ajax({
                                        type: "POST",
                                        url: "TinTuc/BaiViet/action.php",
                                        data : new FormData(this),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data){
                                            console.log(data);
                                        if(data==1){
                                            alert('Cập nhật bài viết thành công!!');
                                            location.href='index.php?action=listtintucbv';                              
                                        }else if(data==2){
                                            $('[name*="noiDung"]').css("border", "1px solid red");
                                            $("#error-noiDung").text("Nội dung quá ngắn !");

                                        }else{
                                            alert('Cập nhật thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>