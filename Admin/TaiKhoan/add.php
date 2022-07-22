<div class="table-main">
    <h2>Thêm tài khoản</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="" name="form-add" id="form-add" method="post" enctype="multipart/form-data">
            <div class="mb10">Username <span style="color:red">*</span><br>
            <input type="text" id="username" name="username"><br>
            <small id="error-username" class="form-error"></small>
            </div>

            <div class="mb10">Tên đầy đủ <span style="color:red">*</span><br>
            <input type="text" id="fullname" name="fullname"><br>
            <small id="error-fullname" class="form-error"></small>
            </div>

            <div class="mb10">Hình ảnh <span style="color:red">*</span><br>
            <input type="file" id="hinhAnh" name="hinhAnh"><br>
            <small id="error-hinhAnh" class="form-error"></small>
            </div>

            <div class="mb10">Email <span style="color:red">*</span><br>
            <input type="email" id="email" name="email"><br>
            <small id="error-email" class="form-error"></small>
            </div>

            <div class="mb10">Password <span style="color:red">*</span><br>
            <input type="password" name="password" id="password" ><br>
            <small id="error-password" class="form-error"></small>
            </div>

            <div class="mb10">
            <input type="submit" name="themmoi" id="them_moi_tk" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtk"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
        // click vào loại bỏ lỗi
        $('[name*="username"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-username").text("");
         });
        $('[name*="fullname"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-fullname").text("");
        });
        $('[name*="email"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-email").text("");
        });
        $('[name*="password"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-password").text("");
        });
        // 
        $('#them_moi_tk').click(function(){
            $('#form-add').submit(function(e){
                e.preventDefault();
                var username = $('[name*="username"]').val();
                var fullname = $('[name*="fullname"]').val();
                var email = $('[name*="email"]').val();
                var password = $('[name*="password"]').val();
                if (username == "" || fullname == "" || email == "" || password == ""){
                        // hiển thị lỗi trống
                        if ($('[name*="username"]').val() == "") {
                        $('[name*="username"]').css("border", "1px solid red");
                        $("#error-username").text("Bạn chưa nhập tên đăng nhập !");
                         }
                         if ($('[name*="fullname"]').val() == "") {
                        $('[name*="fullname"]').css("border", "1px solid red");
                        $("#error-fullname").text("Bạn chưa nhập tên đầy đủ !");
                         }
                         if ($('[name*="email"]').val() == "") {
                        $('[name*="email"]').css("border", "1px solid red");
                        $("#error-email").text("Bạn chưa nhập email !");
                         }
                         if ($('[name*="password"]').val() == "") {
                        $('[name*="password"]').css("border", "1px solid red");
                        $("#error-password").text("Bạn chưa nhập mật khẩu !");
                         }
                }else{
                    $.ajax({
                    type: "POST",
                    url: "TaiKhoan/action_tk.php",
                    data : new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        // console.log(data);
                    if(data==1){
                        alert('Thêm tài khoản thành công!!');
                        location.href='index.php?action=listtk';
                    }else if(data==2){
                        $('[name*="username"]').css("border", "1px solid red");
                        $("#error-username").text("Tên đăng nhập quá ngắn !");
                        
                    }else if(data==3){
                        $('[name*="username"]').css("border", "1px solid red");
                        $("#error-username").text("Tên đăng nhập này đã tồn tại !");
                    }else if(data==4){
                        $('[name*="fullname"]').css("border", "1px solid red");
                        $("#error-fullname").text("Tên đầy đủ quá ngắn !");
                    }else if(data==5){
                        $('[name*="email"]').css("border", "1px solid red");
                        $("#error-email").text("Email đã tồn tại !");
                    }else if(data==6){
                        $('[name*="password"]').css("border", "1px solid red");
                        $("#error-password").text("Mật khẩu quá ngắn !");
                    }else{
                        alert('Thêm thất bại !!');
                    }
                },
            });
                }



            });
        });
        // end function
    });
</script>