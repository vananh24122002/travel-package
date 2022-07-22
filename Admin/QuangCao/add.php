<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="table-main">
    <h2>Thêm quảng cáo</h2>
    <div class="form-insert">
        <form action="#" id="form-add"  method="post" enctype="multipart/form-data">
            <div class="mb10">Mã quảng cáo<br>
            <input type="number" id="id_qc" name="id_qc" disabled><br></div>
            <div class="mb10">Tên quảng cáo<br>
            <input type="text" id="nameqc" name="nameqc" ><br></div>
            <div class="mb10">Hình quảng cáo *<br>
            <input type="file" id="banner" name="banner"><br>
            </div>

        <div class="mb10">Khu vực hiển thị*<br>
            <select id="layout" name="layout">
            <option value="0">---Chọn danh mục ---</option>
            <option value="1">Home</option>
            <option value="2">Bài viết chi tiết</option>
            </select>
        </div>
        
            <div class="mb10">Link khi click vào quảng cáo<br>
            <input type="text" id="link" name="link"><br></div>
            <div class="mb10">Trạng thái<br>
            <select id="trangthai" name="trangthai">
                    <option value= 1>Kích hoạt</option>
                    <option value= 0>Ẩn</option>
            </select></div><br>
            <div class="mb10">
            <input type="submit"  id="them_moi_qc" value="Thêm quảng cáo">
            <input type="reset" value="Nhập lại">
            <a href="index.php?action=listqc"><input type="button" value="Danh sách"></div></a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
        // click vào loại bỏ lỗi
        $('[name*="banner"]').focus(function() {
        $(this).css("border", "1px solid black");
         });
        $('[name*="layout"]').focus(function() {
        $(this).css("border", "1px solid black");
        });
       
        // 
        $('#them_moi_qc').click(function(){
            $('#form-add').submit(function(e){
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
                    alert('Thêm quảng cáo thành công!!');
                    location.href='index.php?action=listqc';
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