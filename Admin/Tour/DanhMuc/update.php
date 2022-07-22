<?php
if(is_array($sua_tourdm)){
    extract($sua_tourdm);
}
?>
<div class="table-main">
    <h2>Thêm danh mục Tour</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" id="form-update" method="post">
            <div class="mb10">Tên danh mục <span style="color:red">*</span><br>
            <input type="text" id="nameDMTour_update" name="nameDMTour_update" value="<?=$nameDMTour?>"><br>
            <small id="error-nameDMTour" class="form-error"></small>
            </div>
            <div class="mb10">Giới thiệu<br>
            <textarea cols="8" style="resize:none" id="gioiThieu" name="gioiThieu"><?=$gioiThieu?></textarea></div>
            <div class="mb10">
            <input type="hidden" name="id_DMTour" value="<?=$id_DMTour?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtourdm"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="nameDMTour_update"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameDMTour_update").text("");
        });
        
        
                    $('#form-update').submit(function(e) {
                            e.preventDefault();
                            var nameDMTour_update = $('[name*="nameDMTour_update"]').val();
                            
                            if (nameDMTour_update == "" ) {
                                
                                // hiển thị lỗi trống
                                if ($('[name*="nameDMTour_update"]').val() == "") {
                                    $('[name*="nameDMTour_update"]').css("border", "1px solid red");
                                    $("#error-nameDMTour").text("Bạn chưa nhập tên danh mục !");
                                }
                                } else { 
                                        //    ajax
                                        
                                        $.ajax({
                                        type: "POST",
                                        url: "Tour/DanhMuc/action.php",
                                        data : new FormData(this),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data){
                                            // console.log(data);
                                        if(data==1){
                                            alert('Cập nhật danh mục thành công!!');
                                            location.href='index.php?action=listtourdm';
                                        
                                        }else{
                                            alert('Cập nhật thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>
