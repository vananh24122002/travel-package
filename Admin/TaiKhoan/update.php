<div class="table-main">
    <h2>Cập nhật tài khoản</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
            <?php  extract($Query_one_tk); ?>      
            <input type="hidden" name="maTK" id="maTK" class="maTK" value="<?=$Query_one_tk['maTK']?>">
            <form action="" id="form-update" method="post" enctype="multipart/form-data">
           <?php 
                $Query_one_tttk = Query_one_tttk($maTK);
                $hinhpath = "../upload/".$Query_one_tttk['hinhAnh'];
                    if($Query_one_tttk['hinhAnh']!=""){
                        $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                        $hinh = "no photo";
                    }
            ?>        
            <input type="hidden" name="up_maTK" id="up_maTK" value="<?=$Query_one_tttk['maTK']?>">
            <div class="mb10">Username <span style="color:red">*</span><br>
            <input type="text" id="upusername" name="upusername" value="<?=$Query_one_tttk['username']?>"><br>
            <small id="error-upusername" class="form-error"></small>
            </div>

            <div class="mb10">Tên đầy đủ <span style="color:red">*</span><br>
            <input type="text" id="fullname" name="fullname" value="<?=$Query_one_tttk['fullname']?>"><br>
            <small id="error-fullname" class="form-error"></small>
            </div>

            <div class="mb10">Hình ảnh<br>
            <input type="file" id="hinhAnh" name="hinhAnh"><?=$hinh?><br>
            </div>

            <div class="mb10">Email <span style="color:red">*</span><br>
            <input type="email" id="email" name="email" value="<?=$Query_one_tttk['email']?>"><br>
            <small id="error-email" class="form-error"></small>
            </div>

            <div class="mb10">Password <span style="color:red">*</span><br>
            <input type="text" name="password" id="password" value="<?=$Query_one_tttk['password']?>" ><br>
            <small id="error-password" class="form-error"></small>
            </div>
            

            <div class="mb10">
            <input style="color:black" type="submit"  id="cap_nhat_tk" value="Cập nhật">
            <input style="color:black" type="reset" value="Nhập lại">
            <a style="color:black" href="index.php?action=listtk"><input type="button" value="Danh sách"></div></a>
            </div>
            </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
  //load thông tin tk
  function load_tttk(){
          var id_update = $('[name*="maTK"]').val();
          $.ajax({
            type: "POST",
            url: "TaiKhoan/action_tk.php",
            data : {id_update:id_update},
            cache: false,
            success: function(data){
                    $('#load-form').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_tttk();
          }, 500);
// update tt tài khoản
        $('[name*="upusername"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-upusername").text("");
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
            $('#form-update').submit(function(e){
                e.preventDefault();
                var upusername = $('[name*="upusername"]').val();
                var fullname = $('[name*="fullname"]').val();
                var email = $('[name*="email"]').val();
                var password = $('[name*="password"]').val();
                if (upusername == "" || fullname == "" || email == "" || password == ""){
                        // hiển thị lỗi trống
                        if ($('[name*="upusername"]').val() == "") {
                        $('[name*="upusername"]').css("border", "1px solid red");
                        $("#error-upusername").text("Bạn chưa nhập tên đăng nhập !");
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
                        alert('Cập nhật tài khoản thành công!!');
                        location.href='index.php?action=listtk';
                    }else if(data==4){
                        $('[name*="upusername"]').css("border", "1px solid red");
                        $("#error-upusername").text("Tên đầy đủ quá ngắn !");
                    }else if(data==6){
                        $('[name*="password"]').css("border", "1px solid red");
                        $("#error-password").text("Mật khẩu quá ngắn !");
                    }else{
                        alert('Cập nhật thất bại !!');
                    }
                },
            });
                }



            });
        });
</script>