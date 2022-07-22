<div class="table-main">
    <h2>Thêm danh mục Tour</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" id="form-add" method="post">
            <div class="mb10">Tên danh mục<span style="color:red">*</span><br>
            <input type="text" id="nameDMTour" name="nameDMTour"><br>
            <small id="error-nameDMTour" class="form-error"></small>
            </div>
            <div class="mb10">Giới thiệu<br>
            <textarea cols="8" style="resize:none" id="gioiThieu" name="gioiThieu"></textarea></div>
            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtourdm"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="nameDMTour"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameDMTour").text("");
        });
        
        
                    $('#form-add').submit(function(e) {
                            e.preventDefault();
                            var nameDMTour = $('[name*="nameDMTour"]').val();
                            
                            if (nameDMTour == "" ) {
                                
                                // hiển thị lỗi trống
                                if ($('[name*="nameDMTour"]').val() == "") {
                                    $('[name*="nameDMTour"]').css("border", "1px solid red");
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
                                            console.log(data);
                                        if(data==1){
                                            alert('Thêm danh mục thành công!!');
                                            location.href='index.php?action=listtourdm';
                                        }else if(data==2){
                                            $('[name*="nameDMTour"]').css("border", "1px solid red");
                                            $("#error-nameDMTour").text("Tên danh mục này đã tồn tại !");

                                        }else{
                                            alert('Thêm thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>