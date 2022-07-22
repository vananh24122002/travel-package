<div class="table-main">
    <h2>Thêm danh mục tin tức</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" id="form-add" method="post" enctype="multipart/form-data">
            <div class="mb10">Tên danh mục <span style="color:red">*</span><br>
            <input type="text" id="nameDMTT" name="nameDMTT"><br>
            <small id="error-nameDMTT" class="form-error"></small>
            </div>

            <div class="mb10">Banner1 <span style="color:red">*</span><br>
            <input type="file" id="banner1" name="banner1"><br>
            <small id="error-banner1" class="form-error" ></small>
            </div>
            <div class="mb10">Banner2 <span style="color:red">*</span><br>
            <input type="file" id="banner2" name="banner2"><br>
            <small id="error-banner2" class="form-error"></small>
            </div>

            <div class="mb10">Giới thiệu <br>
            <textarea rows=10 id="gioiThieu" name="gioiThieu" style="resize:none"></textarea> 
            </div>

            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtintucdm"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="nameDMTT"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameDMTT").text("");
        });
        $('[name*="banner1"]').focus(function() {
        $("#error-banner1").text("");
        });
        $('[name*="banner2"]').focus(function() {
        $("#error-banner2").text("");
        });
                    $('#form-add').submit(function(e) {
                            e.preventDefault();
                            var nameDMTT = $('[name*="nameDMTT"]').val();
                            var banner1 = $('[name*="banner1"]').val();
                            var banner2 = $('[name*="banner2"]').val();
                            if (nameDMTT == "" || banner1 == "" || banner2 == "") {
                                // hiển thị lỗi trống
                                if ($('[name*="nameDMTT"]').val() == "") {
                                    $('[name*="nameDMTT"]').css("border", "1px solid red");
                                    $("#error-nameDMTT").text("Bạn chưa nhập tên danh mục !");
                                }
                                if ($('[name*="banner1"]').val() == "") {
                                    $("#error-banner1").text("Bạn chưa chọn banner 1 !");
                                }
                                if ($('[name*="banner2"]').val() == "") {
                                    $("#error-banner2").text("Bạn chưa chọn banner 1 !");
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
                                            alert('Thêm danh mục thành công!!');
                                            location.href='index.php?action=listtintucdm';
                                        }else if(data==2){
                                            $('[name*="nameDMTT"]').css("border", "1px solid red");
                                            $("#error-nameDMTT").text("Tên danh mục này đã tồn tại !");
                                        }else{
                                            alert('Thêm thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>