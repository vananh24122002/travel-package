<div class="table-main">
                <h2>Danh mục tin tức</h2>
            <table class="table table-striped">
            <a href="index.php?action=addtintucdm"><input type="button" value="Thêm mới" class="button-right"></div></a>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã danh mục</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Banner1</th>
                    <th scope="col">Banner2</th>
                    <th scope="col">Giới thiệu</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="load-dm">
                 
                </tbody>
                 </table>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả"></div>
            </div>

             <!-- phân trang -->
            <?php 
            $count = $count_dmtintuc['count_array'];
            $pages = ceil($count / 5);
            ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination1">
                <?php for($i = 1 ; $i<=$pages ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="index.php?action=listtintucdm&pages=<?=$i?>"><?php echo $i ?></a></li>
                <?php } ?>
              </ul>
          </nav>

           </div>   
<script type="text/javascript">
  $(document).ready(function(){
  //danh mục tin tức
  function load_dm_tt(){
          $.ajax({
            type: "POST",
            url: "TinTuc/DanhMuc/load_dm.php",
            cache: false,
            success: function(data){
                    $('#load-dm').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_dm_tt()
          }, 500);
   // xóa danh mục tin tức
   $(document).on('click','.btn-secondary-one',function(e){
              e.preventDefault();
            var id_xoa = $(this).data("id_xoa");
            $(document).on('click','.btn-secondary-two',function(e){
              // alert(id_tour_dm);
                $.ajax({
                  type: "POST",
                  url: "TinTuc/DanhMuc/action.php",
                  data:{id_xoa:id_xoa},
                  cache: false,
                  success: function(data){
                  if(data==1){
                      alert('Xóa danh mục thành công !'),
                        $("#modal-del").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");
                      setTimeout(function () {
                         // remove modal
                         load_dm_tt();
                        }, 500);   
                  }else{
                    alert('Xóa danh mục thất bại')
                  }
                  }
                });
              });
            // end xoa
   });
 });
</script>