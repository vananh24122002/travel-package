<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<div class="table-main">
                <h2>Danh sách bình luận tour</h2>
            <table class="table table-striped" id="load-cmt">
            <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Mã tour</th>
                    <th scope="col">Tour</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số bình luận</th>
                    <th scope="col">TB sao</th>
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

             <!-- phân trang -->
             <?php 
            $count = $count_binh_luan_tour['count_array'];
            $pages = ceil($count / 10);
            ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <?php for($i = 1 ; $i<=$pages ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="index.php?action=listbltour&pages=<?=$i?>"><?php echo $i ?></a></li>
                <?php } ?>
              </ul>
          </nav>

           </div>    
<script>
  $(document).ready(function(){
    //load tổng bình luận tour
  function load_sum_binhluan(){
          $.ajax({
            type: "POST",
            url: "BinhLuantour/load_list_bl.php",
            cache: false,
            success: function(data){
                    $('#load_sum_binhluan').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_sum_binhluan();
          }, 500);

    // xóa cmt theo id_tour
    $(document).on('click','.btn-secondary-one',function(e){
              e.preventDefault();
            var id_tour_dm = $(this).data("id_tour_dm");
            $(document).on('click','.btn-secondary-two',function(e){
              // alert(id_tour_dm);
                $.ajax({
                  type: "POST",
                  url: "BinhLuantour/action.php",
                  data:{id_tour_dm:id_tour_dm},
                  cache: false,
                  success: function(data){
                  if(data==1){
                      alert('Xóa bình luận thành công !'),
                        $("#modal-del").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");
                      setTimeout(function () {
                         // remove modal
                         load_sum_binhluan();
                        }, 500);   
                  }else{
                    alert('Xóa thất bại')
                  }
                  }
                });
              });
            // end xoa
          });
  });
</script>
    