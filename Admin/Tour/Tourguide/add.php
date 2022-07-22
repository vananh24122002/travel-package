<div class="table-main">
    <h2>Thêm TourGuide</h2>
    <h4><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Note: Những mục chứa dấu <span style="color:red">*</span> là những mục bắt buộc </h4>
    <div class="form-insert">
        <form action="index.php?action=addtour" id="form-add" method="post" enctype="multipart/form-data">
            <div class="mb10">Tên Tour <span style="color:red">*</span><br>
            <input type="text" id="nameTour" name="nameTour"><br>
            <small id="error-nameTour" class="form-error"></small>
            </div>

            <div class="mb10">Banner <span style="color:red">*</span><i>( Ảnh minh họa )</i><br>
            <input type="file" id="banner" name="banner"><br>
            <small id="error-banner" class="form-error"></small>
            </div>

            <div class="mb10">Days <span style="color:red">*</span><br>
            <input type="number" id="days" name="days"><br>
            <small id="error-days" class="form-error"></small>
            </div>

            <div class="mb10">Danh mục <span style="color:red">*</span><br>
            <select name="id_DMTour" id="id_DMTour">
            <option value="0">---Chọn danh mục---</option>
                <?php
                    foreach ($tourdm as $dm) {
                       extract($dm);
                       echo'<option value="'.$id_DMTour.'">'.$nameDMTour.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_DMTour" class="form-error"></small>
            </div>

            <div class="mb10">Mức độ hoạt động <span style="color:red">*</span> <i>(Activity Level)</i><br>
            <select name="id_mucdo" id="id_mucdo">
            <option value="0">---Chọn mức độ---</option>
                <?php
                    foreach ($tourdmhd as $dmhd) {
                       extract($dmhd);
                       echo'<option value="'.$id_mucdo.'">'.$namemucdo.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_mucdo" class="form-error"></small>
            </div>

            <div class="mb10">Chuyến đi <span style="color:red">*</span> <i>( Tour chuyến đi )</i><br>
            <select name="id_chuyendi" id="id_chuyendi">
            <option value="0">---Chọn chuyến đi---</option>
                <?php
                    foreach ($tourdmcd as $dmcd) {
                       extract($dmcd);
                       echo'<option value="'.$id_chuyendi.'">'.$namechuyendi.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_chuyendi" class="form-error"></small>
             </div>

            <div class="mb10">Chiều dài chuyến đi <span style="color:red">*</span> <i>( Số ngày đi )</i><br>
            <select name="id_chieudai" id="id_chieudai">
            <option value="0">---Chọn số ngày---</option>
                <?php
                    foreach ($tourdmcdcd as $dmcdcd) {
                       extract($dmcdcd);
                       echo'<option value="'.$id_chieudai.'">'.$namechieudai.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_chieudai" class="form-error"></small>
             </div>

            <div class="mb10">Giá <span style="color:red">*</span> <i>( Phân loại đơn giá )</i><br>
            <select name="id_gia" id="id_gia">
            <option value="0">---Chọn loại giá---</option>
                <?php
                    foreach ($tourdmg as $dmg) {
                       extract($dmg);
                       echo'<option value="'.$id_gia.'">'.$namegia.'</option>';
                    }
                ?>
            </select>
            <small id="error-id_gia" class="form-error"></small>
             </div>

            <div class="mb10"> Tổng quan <span style="color:red">*</span><br>
            <textarea rows=5 name="tongQuan" id="tongQuan" style="resize:none"></textarea>
            <small id="error-tongQuan" class="form-error"></small>
            </div>

            <div class="mb10">Hành trình <span style="color:red">*</span><br>
            <textarea rows=5 name="hanhTrinh" id="hanhTrinh" style="resize:none"></textarea>
            <small id="error-hanhTrinh" class="form-error"></small>
            </div>

            <div class="mb10">Bản đồ <span style="color:red">*</span> <i>( Link bản đồ )</i><br>
            <input type="text" name="banDo" id="banDo"><br>
            <small id="error-banDo" class="form-error"></small>
            </div>

            <div class="mb10">Mong đợi <span style="color:red">*</span><br>
            <textarea rows=5 name="mongDoi" id="mongDoi" style="resize:none"></textarea>
            <small id="error-mongDoi" class="form-error"></small>
            </div>

            <div class="mb10">Giá gốc <span style="color:red">*</span><br>
            <input type="number"  id="donGia" name="donGia"><br>
            <small id="error-donGia" class="form-error"></small>
            </div>

            <div class="mb10">Thời gian khởi hành <span style="color:red">*</span><br>
            <input type="date" name="time" id="time"><br>
            <small id="error-time" class="form-error"></small>
            </div>

            <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm bài viết">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listtour"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[name*="nameTour"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameTour").text("");
        });
        $('[name*="banner"]').focus(function() {
        $("#error-banner").text("");
        });
        $('[name*="days"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-days").text("");
        });
        $('[name*="id_DMTour"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_DMTour").text("");
        });
        $('[name*="id_mucdo"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_mucdo").text("");
        });
        $('[name*="id_chuyendi"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_chuyendi").text("");
        });
        $('[name*="id_chieudai"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_chieudai").text("");
        });
        $('[name*="id_gia"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-id_gia").text("");
        });
        $('[name*="tongQuan"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-tongQuan").text("");
        });
        $('[name*="hanhTrinh"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-hanhTrinh").text("");
        });
        $('[name*="banDo"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-banDo").text("");
        });
        $('[name*="mongDoi"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-nameDMTour").text("");
        });
        $('[name*="donGia"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-donGia").text("");
        });
        $('[name*="time"]').focus(function() {
        $(this).css("border", "1px solid black");
        $("#error-time").text("");
        });
        
        
                    $('#form-add').submit(function(e) {
                            e.preventDefault();
                            var nameTour = $('[name*="nameTour"]').val();
                            var banner = $('[name*="banner"]').val();
                            var days = $('[name*="days"]').val();
                            var id_DMTour = $('[name*="id_DMTour"]').val();
                            var id_mucdo = $('[name*="id_mucdo"]').val();
                            var id_chuyendi = $('[name*="id_chuyendi"]').val();
                            var id_chieudai = $('[name*="id_chieudai"]').val();
                            var id_gia = $('[name*="id_gia"]').val();
                            var tongQuan = $('[name*="tongQuan"]').val();
                            var hanhTrinh = $('[name*="hanhTrinh"]').val();
                            var banDo = $('[name*="banDo"]').val();
                            var mongDoi = $('[name*="mongDoi"]').val();
                            var donGia = $('[name*="donGia"]').val();
                            var time = $('[name*="time"]').val();
                        
                            if (nameTour == "" || banner == "" || days == "" || id_DMTour == "" || id_mucdo == "" || id_chuyendi == "" ||
                            id_chieudai == "" || id_gia == "" || tongQuan == "" || hanhTrinh == "" || banDo == "" || mongDoi == "" ||
                            donGia == "" || time == 0  ) {
                               
                                // hiển thị lỗi trống
                                if ($('[name*="nameTour"]').val() == "") {
                                    $('[name*="nameTour"]').css("border", "1px solid red");
                                    $("#error-nameTour").text("Bạn chưa nhập tên tour !");
                                }
                                if ($('[name*="banner"]').val() == "") {
                                
                                    $("#error-banner").text("Bạn chưa chọn hình ảnh !");
                                }
                                if ($('[name*="days"]').val() == "") {
                                    $('[name*="days"]').css("border", "1px solid red");
                                    $("#error-days").text("Bạn chưa nhập số ngày !");
                                }
                                if ($('[name*="id_DMTour"]').val() == "") {
                                    $('[name*="id_DMTour"]').css("border", "1px solid red");
                                    $("#error-id_DMTour").text("Bạn chưa chọn danh mục !");
                                }
                                if ($('[name*="id_mucdo"]').val() == "") {
                                    $('[name*="id_mucdo"]').css("border", "1px solid red");
                                    $("#error-id_mucdo").text("Bạn chưa chọn danh mục !");
                                }
                                if ($('[name*="id_chuyendi"]').val() == "") {
                                    $('[name*="id_chuyendi"]').css("border", "1px solid red");
                                    $("#error-id_chuyendi").text("Bạn chưa chọn danh mục !");
                                }
                                if ($('[name*="id_chieudai"]').val() == "") {
                                    $('[name*="id_chieudai"]').css("border", "1px solid red");
                                    $("#error-id_chieudai").text("Bạn chưa chọn danh mục !");
                                }
                                if ($('[name*="id_gia"]').val() == "") {
                                    $('[name*="id_gia"]').css("border", "1px solid red");
                                    $("#error-id_gia").text("Bạn chưa chọn danh mục !");
                                }
                                if ($('[name*="tongQuan"]').val() == "") {
                                    $('[name*="tongQuan"]').css("border", "1px solid red");
                                    $("#error-tongQuan").text("Bạn chưa nhập tổng quan chuyến đi !");
                                }
                                if ($('[name*="hanhTrinh"]').val() == "") {
                                    $('[name*="hanhTrinh"]').css("border", "1px solid red");
                                    $("#error-hanhTrinh").text("Bạn chưa nhập hành trình chuyến đi !");
                                }
                                if ($('[name*="banDo"]').val() == "") {
                                    $('[name*="banDo"]').css("border", "1px solid red");
                                    $("#error-banDo").text("Bạn chưa nhập link bản đồ !");
                                }
                                if ($('[name*="mongDoi"]').val() == "") {
                                    $('[name*="mongDoi"]').css("border", "1px solid red");
                                    $("#error-mongDoi").text("Bạn chưa nhập mong đợi !");
                                }
                                if ($('[name*="donGia"]').val() == "") {
                                    $('[name*="donGia"]').css("border", "1px solid red");
                                    $("#error-donGia").text("Bạn chưa nhập đơn giá !");
                                }
                                if ($('[name*="time"]').val() == 0) {
                                    $('[name*="time"]').css("border", "1px solid red");
                                    $("#error-time").text("Bạn chưa nhập thời gian khởi hành !");
                                }
                                } else { 
                                        //    ajax
                                        $.ajax({
                                        type: "POST",
                                        url: "Tour/Tourguide/action.php",
                                        data : new FormData(this),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data){
                                            console.log(data);
                                        if(data==1){
                                            alert('Thêm tour thành công!!');
                                            location.href='index.php?action=listtour';
                                        }else if(data==3){
                                            $('[name*="nameTour"]').css("border", "1px solid red");
                                            $("#error-nameTour").text("Tên tour quá ngắn !");
                                        }else if(data==4){
                                            $('[name*="days"]').css("border", "1px solid red");
                                            $("#error-days").text("Ngày phải là chữ số !");
                                        }else if(data==5){
                                            $('[name*="tongQuan"]').css("border", "1px solid red");
                                            $("#error-tongQuan").text("Tổng quan chuyến đi quá ngắn !");   
                                        }else if(data==6){
                                            $('[name*="hanhTrinh"]').css("border", "1px solid red");
                                            $("#error-hanhTrinh").text("Hành trình quá ngắn !");   
                                        }else if(data==7){
                                            $('[name*="mongDoi"]').css("border", "1px solid red");
                                            $("#error-tongQuan").text("Mong đợi quá ngắn quá ngắn !");   
                                        }else{
                                            alert('Thêm tour thất bại !')
                                        }
                                    },
                                });


                                }

                            });
    });
</script>