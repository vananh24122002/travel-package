<?php
if(is_array($dm)){
    extract($dm);
}
$hinhpath1 = "../upload/".$banner1;
if(is_file($hinhpath1)){
    $hinh1 = "<img src='".$hinhpath1."' width='80' height='80'>";
}else{
    $hinh1 = "no photo";
}
$hinhpath2 = "../upload/".$banner2;
    if(is_file($hinhpath2)){
        $hinh2 = "<img src='".$hinhpath2."' width='80' height='80'>";
    }else{
        $hinh2 = "no photo";
}
?>
<div class="table-main">
    <h2>Cập nhật danh mục tin tức</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" id="form-update"  method="post" enctype="multipart/form-data">
            <div class="mb10">Tên danh mục <span style="color:red">*</span><br>
            <input type="text" id="name_DMTT_edit" name="name_DMTT_edit" value="<?php if(isset($nameDMTT) && ($nameDMTT !="")) echo $nameDMTT; ?>"><br>
            <small id="error-nameDMTT" class="form-error"></small>
            </div>

            <div class="mb10">Banner1 <span style="color:red">*</span><br>
            <input type="file" id="banner1" name="banner1"><?=$hinh1?><br>
            <small id="error-banner1" class="form-error" ></small>
            </div>

            <div class="mb10">Banner2 <span style="color:red">*</span><br>
            <input type="file" id="banner2" name="banner2"><?=$hinh2?><br>
            <small id="error-banner2" class="form-error"></small>
            </div>
            <div class="mb10">Giới thiệu<br>
            <textarea rows=10 id="gioiThieu" name="gioiThieu" style="resize:none"><?=$gioiThieu?></textarea> </div>
            <div class="mb10">
            <input type="hidden" id="id_DMTT" name="id_DMTT" value="<?php if(isset($id_DMTT) && ($id_DMTT !="")) echo $id_DMTT; ?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtintucdm"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="name_DMTT_edit"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameDMTT").text("");
        });
                    $('#form-update').submit(function(e) {
                            e.preventDefault();
                            var name_DMTT_edit = $('[name*="name_DMTT_edit"]').val();
                            var banner1 = $('[name*="banner1"]').val();
                            var banner2 = $('[name*="banner2"]').val();
                            if (name_DMTT_edit == "") {
                                // hiển thị lỗi trống
                                if ($('[name*="name_DMTT_edit"]').val() == "") {
                                    $('[name*="name_DMTT_edit"]').css("border", "1px solid red");
                                    $("#error-name_DMTT_edit").text("Bạn chưa nhập tên danh mục !");
                                }
                                } else { 
                                        //    ajax
                                        // console.log('ok');
                                        $.ajax({
                                        type: "POST",
                                        url: "TinTuc/DanhMuc/action.php",
                                        data : new FormData(this),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data){
                                            console.log(data);
                                        if(data==1){
                                            alert('Cập nhật danh mục thành công!!');
                                            location.href='index.php?action=listtintucdm';
                                        }else{
                                            alert('Cập nhật thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
    
</script>
