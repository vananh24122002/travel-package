<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<div class="table-main">
                <h2>Danh sách bình luận bài viết</h2>
            <table class="table table-striped" id="load-cmt">
            <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Mã bài viết</th>
                    <th scope="col">Tên bài viết</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số bình luận</th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody id="load_sum_binhluan">
                  <!-- load  -->
                </tbody>
                 </table>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả">
            </div>

           </div>   
    
           <script type="text/javascript">
  $(document).ready(function(){
  //load tổng bình luận
  function load_sum_binhluan(){
          $.ajax({
            type: "POST",
            url: "BinhLuannews/load_list_bl.php",
            cache: false,
            success: function(data){
                    $('#load_sum_binhluan').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_sum_binhluan();
          }, 500);

   // xóa tổng hợp bình luận
   $(document).on('click','.btn-secondary-one',function(e){
      e.preventDefault();
              var id_del = $(this).data("id_del");
              $(document).on('click','.btn-secondary-two',function(e){
               
              $.ajax({
                type: "POST",
                url: "BinhLuannews/action.php",
                data:{id_del:id_del},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa toàn tổng bình luận thành công !'),
                    // remove modal
                        $("#modal-del").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");

                    setTimeout(function () {
                      load_sum_binhluan();
                      }, 500);   
                }else{
                  alert('Xóa tổng bình luận thất bại !');
                }

                }
              });

            });
            // end xoa
          });
  });
</script>