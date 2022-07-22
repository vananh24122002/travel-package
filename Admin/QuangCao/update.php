<div class="table-main">
    <h2>Cập nhật quảng cáo</h2>
    <div class="form-update">
            <form action="" id="form-update" method="post" enctype="multipart/form-data">
           <?php 
                $hinhpath = "../upload/".$load_one_qc['banner'];
                    if($load_one_qc['banner']!=""){
                        $hinh = "<img src='".$hinhpath."' height='80' width='80'>";
                    }else{
                        $hinh = "no photo";
                    }
            ?>        
            <div class="mb10">Mã quảng cáo<br>
            <input type="number" id="id_qc" name="id_qc" disabled><br></div>
            <input type="hidden" id="id_update" name="id_update" value="<?=$load_one_qc['id_qc']?>">
            <div class="mb10">Tên quảng cáo<br>
            <input type="text" id="nameqc" name="nameqc" value="<?=$load_one_qc['nameqc']?>" ><br></div>
            <div class="mb10">Hình quảng cáo *<br>
            <input type="file" id="banner" name="banner"><?=$hinh?><br>
            </div>

        <div class="mb10">Khu vực hiển thị*<br>
            <select id="layout_update" name="layout_update">
                <?php if($load_one_qc['layout']==1){ ?>
                    <option value="<?=$load_one_qc['layout']?>" selected>Home</option>;
                    <option value="2">Bài viết chi tiết</option>
                <?php }else{ ?>  
                    <option value="<?=$load_one_qc['layout']?>" selected>Bài viết chi tiết</option>;
                    <option value="1">Home</option>
                    <?php } ?>
            </select></div>
        
            <div class="mb10">Link khi click vào quảng cáo<br>
            <input type="text" id="link" name="link" value="<?=$load_one_qc['link']?>"><br></div>
            <div class="mb10">Trạng thái<br>
            <select name="trangthai" id="trangthai">
                <?php if($load_one_qc['trangthai']==1){ ?>
                    <option value="<?=$load_one_qc['trangthai']?>" selected>Đang hoạt động</option>;
                    <option value="0">Ẩn</option>
                <?php }else{ ?>  
                    <option value="<?=$load_one_qc['trangthai']?>" selected>Ẩn</option>;
                    <option value="1">Kích hoạt</option>
                    <?php } ?>
            </select></div><br>
            
            <div class="mb10">
            <input style="color:black" type="submit"  id="cap_nhat_qc" value="Cập nhật">
            <input style="color:black" type="reset" value="Nhập lại">
            <a style="color:black" href="index.php?action=listqc"><input type="button" value="Danh sách"></div></a>
            </div>
            </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
// update quảng cáo

                // click vào loại bỏ lỗi
        $('[name*="banner"]').focus(function() {
        $(this).css("border", "1px solid black");
         });
       
        // 
        $('#cap_nhat_qc').click(function(){
            $('#form-update').submit(function(e){
                e.preventDefault();

                     if ($('[name*="banner"]') &&
                        $('[name*="layout"]').val() == 0){
                        // hiển thị lỗi trống
                        if ($('[name*="banner"]').val() == "") {
                        $('[name*="banner"]').css("border", "1px solid red");
                        alert("Vui lòng chọn ảnh quảng cáo!");
                         }
                         if ($('[name*="layout"]').val() == 0) {
                        $('[name*="layout"]').css("border", "1px solid red");
                        alert("Vui lòng chọn nơi hiển thị quảng cáo!");
                         }
                }else{
                    $.ajax({
                    type: "POST",
                    url: "QuangCao/action.php",
                    data : new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                    if(data==1){
                    alert('Cập nhật quảng cáo thành công!!');
                    location.href='index.php?action=listqc';
                    }else{
                        alert('Cập nhật thất bại !!');
                    }
                },
            });
                }


            });
        });
        // end function
    
    });
</script>